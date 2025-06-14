<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'judul_events',
        'tanggal_events',
        'alamat_events',
        'deskripsi_events',
        'gambar_events',
    ];
}
