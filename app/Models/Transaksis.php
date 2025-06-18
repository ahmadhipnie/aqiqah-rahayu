<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksis extends Model
{
    use HasFactory;

    protected $table = 'transaksis';

    protected $fillable = [
        'produk_id',
        'jumlah_produk',
        'total_harga',
        'nama_pembeli',
        'no_telepon_pembeli',
        'no_wa_aktif',
        'alamat_pembeli',
        'email_pembeli',
        'tanggal_pengantaran',
        'status_transaksi',
    ];

    public function produk()
    {
        return $this->belongsTo(Produks::class, 'produk_id');
    }
}
