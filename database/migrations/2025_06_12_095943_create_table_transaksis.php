<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produk_id');
            $table->string('jumlah_produk');
            $table->integer('total_harga');
            $table->string('nama_pembeli');
            $table->string('email_pembeli');
            $table->string('no_telepon_pembeli');
            $table->string('no_wa_aktif');
            $table->text('alamat_pembeli');
            $table->date('tanggal_pengantaran');
            $table->string('status_transaksi')->default('diproses'); // diproses, dikirim, selesai, dibatalkan


            $table->foreign('produk_id')->references('id')->on('produks')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
