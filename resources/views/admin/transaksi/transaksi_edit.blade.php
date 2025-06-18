@extends('layout.sidebar')
@section('title', 'Edit Transaksi')
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0">Edit Transaksi</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.transaksi.update', $transaksi->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="produk_id" class="form-label">Produk</label>
                            <select name="produk_id" id="produk_id" class="form-control" required>
                                @foreach($produks as $produk)
                                    <option value="{{ $produk->id }}" {{ $transaksi->produk_id == $produk->id ? 'selected' : '' }}>
                                        {{ $produk->nama_produk }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_produk" class="form-label">Jumlah Produk</label>
                            <input type="number" name="jumlah_produk" id="jumlah_produk" class="form-control" min="1" value="{{ $transaksi->jumlah_produk }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="total_harga" class="form-label">Total Harga</label>
                            <input type="number" name="total_harga" id="total_harga" class="form-control" min="0" value="{{ $transaksi->total_harga }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_pembeli" class="form-label">Nama Pembeli</label>
                            <input type="text" name="nama_pembeli" id="nama_pembeli" class="form-control" value="{{ $transaksi->nama_pembeli }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="no_telepon_pembeli" class="form-label">No Telepon</label>
                            <input type="text" name="no_telepon_pembeli" id="no_telepon_pembeli" class="form-control" value="{{ $transaksi->no_telepon_pembeli }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="no_wa_aktif" class="form-label">No WA Aktif</label>
                            <input type="text" name="no_wa_aktif" id="no_wa_aktif" class="form-control" value="{{ $transaksi->no_wa_aktif }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat_pembeli" class="form-label">Alamat</label>
                            <input type="text" name="alamat_pembeli" id="alamat_pembeli" class="form-control" value="{{ $transaksi->alamat_pembeli }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email_pembeli" class="form-label">Email Pembeli</label>
                            <input type="email" name="email_pembeli" id="email_pembeli" class="form-control" value="{{ $transaksi->email_pembeli }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_pengantaran" class="form-label">Tanggal Pengantaran</label>
                            <input type="date" name="tanggal_pengantaran" id="tanggal_pengantaran" class="form-control" value="{{ $transaksi->tanggal_pengantaran }}" min="{{ \Carbon\Carbon::tomorrow()->format('Y-m-d') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="status_transaksi" class="form-label">Status Transaksi</label>
                            <select name="status_transaksi" id="status_transaksi" class="form-control" required>
                                <option value="diproses" {{ $transaksi->status_transaksi == 'diproses' ? 'selected' : '' }}>diproses</option>
                                <option value="dikirim" {{ $transaksi->status_transaksi == 'dikirim' ? 'selected' : '' }}>dikirim</option>
                                <option value="selesai" {{ $transaksi->status_transaksi == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                <option value="batal" {{ $transaksi->status_transaksi == 'batal' ? 'selected' : '' }}>batal</option>
                            </select>
                        </div>
                        <button class="btn btn-primary" type="submit">Update</button>
                        <a href="{{ route('admin.transaksi') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
