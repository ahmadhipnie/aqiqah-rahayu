<?php

namespace App\Http\Controllers;

use App\Models\Produks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produks::latest()->get();
        return view('admin.produk_admin.produk_admin', compact('produks'));
    }

    public function create()
    {
        return view('admin.produk_admin.produk_create');
    }

    public function edit($id)
    {
        $produk = Produks::findOrFail($id);
        return view('admin.produk_admin.produk_edit', compact('produk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga_produk' => 'required|integer',
            'kategori_produk' => 'required',
            'gambar_produk' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'jumlah_porsi' => 'required|integer',
            'deskripsi_produk' => 'required',
        ]);

        $file = $request->file('gambar_produk');
        $filename = 'produk_' . time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/gambar_produk', $filename);

        Produks::create([
            'nama_produk' => $request->nama_produk,
            'harga_produk' => $request->harga_produk,
            'kategori_produk' => $request->kategori_produk,
            'gambar_produk' => $filename,
            'jumlah_porsi' => $request->jumlah_porsi,
            'deskripsi_produk' => $request->deskripsi_produk,
        ]);

        Alert::success('Success', 'Produk berhasil ditambahkan');
        return redirect()->route('admin.produk')->with('success', 'Produk berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $produk = Produks::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required',
            'harga_produk' => 'required|integer',
            'kategori_produk' => 'required',
            'gambar_produk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'jumlah_porsi' => 'required|integer',
            'deskripsi_produk' => 'required',
        ]);

        $data = $request->only(['nama_produk', 'harga_produk', 'kategori_produk', 'jumlah_porsi', 'deskripsi_produk']);

        if ($request->hasFile('gambar_produk')) {
            if ($produk->gambar_produk && Storage::exists('public/gambar_produk/' . $produk->gambar_produk)) {
                Storage::delete('public/gambar_produk/' . $produk->gambar_produk);
            }
            $file = $request->file('gambar_produk');
            $filename = 'produk_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/gambar_produk', $filename);
            $data['gambar_produk'] = $filename;
        }

        $produk->update($data);

        Alert::success('Success', 'Produk berhasil diubah');
        return redirect()->route('admin.produk')->with('success', 'Produk berhasil diubah');
    }

    public function destroy($id)
    {
        $produk = Produks::findOrFail($id);
        if ($produk->gambar_produk && Storage::exists('public/gambar_produk/' . $produk->gambar_produk)) {
            Storage::delete('public/gambar_produk/' . $produk->gambar_produk);
        }
        $produk->delete();

        Alert::success('Success', 'Produk berhasil dihapus');
        return redirect()->route('admin.produk')->with('success', 'Produk berhasil dihapus');
    }
}
