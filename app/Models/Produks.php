<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produks extends Model
{
    use HasFactory;

    protected $table = 'produks';

    protected $fillable = [
        'nama_produk',
        'harga_produk',
        'kategori_produk',
        'gambar_produk',
        'jumlah_porsi',
        'deskripsi_produk',
    ];
}
