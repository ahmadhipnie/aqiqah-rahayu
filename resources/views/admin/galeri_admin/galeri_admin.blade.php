@extends('layout.sidebar')
@section('title', 'galeri')
@section('content')

<div class="container-fluid py-4">
    <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary mb-3">Tambah Galeri</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($galeris as $galeri)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                @if($galeri->gambar_galeri)
                    <img src="{{ asset('storage/gambar_galeri/'.$galeri->gambar_galeri) }}" class="card-img-top" style="height:200px;object-fit:cover;">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $galeri->judul_galeri }}</h5>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('admin.galeri.edit', $galeri->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.galeri.destroy', $galeri->id) }}" method="POST" onsubmit="return confirm('Yakin hapus galeri ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
