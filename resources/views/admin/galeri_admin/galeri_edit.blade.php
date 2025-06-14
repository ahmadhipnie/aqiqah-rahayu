@extends('layout.sidebar')
@section('title', 'Edit Galeri')
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0">Edit Galeri</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="judul_galeri" class="form-label">Judul Galeri</label>
                            <input type="text" name="judul_galeri" id="judul_galeri" class="form-control" value="{{ $galeri->judul_galeri }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="gambar_galeri" class="form-label">Gambar Galeri</label>
                            <input type="file" name="gambar_galeri" id="gambar_galeri" class="form-control">
                            <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                            @if($galeri->gambar_galeri)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/gambar_galeri/'.$galeri->gambar_galeri) }}" width="120">
                                </div>
                            @endif
                        </div>
                        <button class="btn btn-primary" type="submit">Update</button>
                        <a href="{{ route('admin.galeri') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
