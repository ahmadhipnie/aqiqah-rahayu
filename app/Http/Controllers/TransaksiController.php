<?php

namespace App\Http\Controllers;

use App\Exports\TransaksiExport;
use App\Models\Produks;
use App\Models\Transaksis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Midtrans\Snap;
use Midtrans\Config;
use Illuminate\Support\Str;

use App\Mail\InvoiceTransaksiMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;


class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');

        $query = Transaksis::query();

        if ($from && $to) {
            $query->whereBetween('created_at', [$from, $to]);
        }

        $transaksis = $query->orderBy('created_at', 'desc')->get();

        return view('admin.transaksi.transaksi_admin', compact('transaksis', 'from', 'to'));
    }

    public function export(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');

        return Excel::download(new TransaksiExport($from, $to), 'transaksi.xlsx');
    }


    public function edit($id)
    {
        $transaksi = Transaksis::findOrFail($id);
        $produks = Produks::all();
        return view('admin.transaksi.transaksi_edit', compact('transaksi', 'produks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'jumlah_produk' => 'required|integer|min:1',
            'total_harga' => 'required|integer|min:0',
            'nama_pembeli' => 'required',
            'no_telepon_pembeli' => 'required',
            'no_wa_aktif' => 'required',
            'alamat_pembeli' => 'required',
            'email_pembeli' => 'required|email',
            'tanggal_pengantaran' => 'required|date|after:today',
            'status_transaksi' => 'required',
        ]);

        $transaksi = Transaksis::findOrFail($id);
        $transaksi->update($request->all());

        return redirect()->route('admin.transaksi')->with('success', 'Transaksi berhasil diupdate');
    }


    public function pergiKeTransaksiPelanggan()
    {
        $produks = Produks::all();
        return view('transaksi', compact('produks'));
    }




    public function getSnapToken(Request $request)
    {
        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        // Ambil data dari request (produk, jumlah, total, dan data diri)
        $produk_ids = $request->input('produk_id', []);
        $jumlahs = $request->input('jumlah_produk', []);
        $total_harga = $request->input('total_harga');
        $nama = $request->input('nama_pembeli');
        $telepon = $request->input('no_telepon_pembeli');
        $wa = $request->input('no_wa_aktif');
        $alamat = $request->input('alamat_pembeli');
        $email = $request->input('email_pembeli');
        $tanggal_pengantaran = $request->input('tanggal_pengantaran');
        if (!$tanggal_pengantaran || Carbon::parse($tanggal_pengantaran)->lte(Carbon::today())) {
            return response()->json([
                'error' => 'Tanggal pengantaran minimal H+1 dari hari ini.'
            ], 422);
        }


        // Siapkan item_details
        $items = [];
        foreach ($produk_ids as $id) {
            $produk = \App\Models\Produks::find($id);
            if ($produk) {
                $qty = isset($jumlahs[$id]) ? (int)$jumlahs[$id] : 1;
                $items[] = [
                    'id' => $produk->id,
                    'price' => $produk->harga_produk,
                    'quantity' => $qty,
                    'name' => $produk->nama_produk,
                ];
            }
        }

        // Siapkan parameter Snap
        $order_id = 'AQIQAH-' . strtoupper(Str::random(8));
        $params = [
            'transaction_details' => [
                'order_id' => $order_id,
                'gross_amount' => $total_harga,
            ],
            'item_details' => $items,
            'customer_details' => [
                'first_name' => $nama,
                'email' => $email,
                'phone' => $telepon,
                'billing_address' => [
                    'address' => $alamat,
                ],
                'shipping_address' => [
                    'address' => $alamat,
                ],
            ],
            'callbacks' => [
                'finish' => route('transaksi.snap_finish'),
            ],
            // Optional: custom field untuk data diri
            'custom_field1' => json_encode([
                'produk_id' => $produk_ids,
                'jumlah_produk' => $jumlahs,
                'nama_pembeli' => $nama,
                'no_telepon_pembeli' => $telepon,
                'no_wa_aktif' => $wa,
                'alamat_pembeli' => $alamat,
                'email_pembeli' => $email,
            ]),
        ];

        $snapToken = Snap::getSnapToken($params);

        return response()->json(['snap_token' => $snapToken]);
    }

    public function snapFinish(Request $request)
    {
        $result = $request->input('result_data'); // array dari Midtrans
        $form = $request->input('form_data');     // array dari form

        // Pastikan produk_id adalah array
        $produk_ids = $form['produk_id'] ?? [];
        if (!is_array($produk_ids)) {
            $produk_ids = [$produk_ids];
        }

        Log::info($form);
        Log::info($produk_ids);

        foreach ($produk_ids as $produk_id) {

            $produk = \App\Models\Produks::find($produk_id);
            $jumlah = $form['jumlah_produk'][$produk_id] ?? 1;
            $produkList[] = [
                'nama_produk' => $produk->nama_produk,
                'jumlah' => $jumlah,
                'harga' => $produk->harga_produk,
                'subtotal' => $produk->harga_produk * $jumlah,
            ];


            \App\Models\Transaksis::create([
                'produk_id' => $produk_id,
                'jumlah_produk' => $form['jumlah_produk'][$produk_id] ?? 1,
                'total_harga' => $result['gross_amount'],
                'nama_pembeli' => $form['nama_pembeli'],
                'no_telepon_pembeli' => $form['no_telepon_pembeli'],
                'no_wa_aktif' => $form['no_wa_aktif'],
                'alamat_pembeli' => $form['alamat_pembeli'],
                'email_pembeli' => $form['email_pembeli'],
                'tanggal_pengantaran' => $form['tanggal_pengantaran'],
                'status_transaksi' => 'diproses',
            ]);
        }

        // Data invoice
        $invoiceData = [
            'nama_pembeli' => $form['nama_pembeli'],
            'email_pembeli' => $form['email_pembeli'],
            'no_telepon_pembeli' => $form['no_telepon_pembeli'],
            'alamat_pembeli' => $form['alamat_pembeli'],
            'total_harga' => $result['gross_amount'],
            'tanggal_pengantaran' => $form['tanggal_pengantaran'], // pastikan ini ada
        ];

        // Kirim email invoice
        Mail::to($form['email_pembeli'])->send(new InvoiceTransaksiMail($invoiceData, $produkList));


        return response()->json(['success' => true]);
    }
}
