<?php

namespace App\Exports;

use App\Models\Transaksis;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransaksiExport implements FromCollection, WithHeadings
{
    protected $from;
    protected $to;

    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function collection()
    {
        $query = Transaksis::query();

        if ($this->from && $this->to) {
            $query->whereBetween('created_at', [$this->from, $this->to]);
        }

        return $query->get([
            'id',
            'produk_id',
            'jumlah_produk',
            'total_harga',
            'nama_pembeli',
            'no_telepon_pembeli',
            'no_wa_aktif',
            'alamat_pembeli',
            'status_transaksi',
            'created_at'
        ]);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Produk ID',
            'Jumlah Produk',
            'Total Harga',
            'Nama Pembeli',
            'No Telepon',
            'No WA Aktif',
            'Alamat Pembeli',
            'Status Transaksi',
            'Tanggal Transaksi'
        ];
    }
}
