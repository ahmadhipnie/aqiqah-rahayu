@extends('layout.sidebar')
@section('title', 'Tambah Testimoni')
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Tambah Testimoni</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.testimoni.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_pemberi_testimoni" class="form-label">Nama Pemberi</label>
                            <input type="text" name="nama_pemberi_testimoni" id="nama_pemberi_testimoni" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="isi_testimoni" class="form-label">Isi Testimoni</label>
                            <textarea name="isi_testimoni" id="isi_testimoni" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_bintang" class="form-label">Jumlah Bintang</label>
                            <input type="number" name="jumlah_bintang" id="jumlah_bintang" class="form-control" min="1" max="5" required>
                        </div>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="{{ route('admin.testimoni') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
