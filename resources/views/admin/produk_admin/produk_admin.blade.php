@extends('layout.sidebar')
@section('title', 'produk')
@section('content')

<div class="container-fluid py-4">
    <a href="{{ route('admin.produk.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($produks as $produk)
        @if($loop->iteration % 3 == 1)
            <div class="row">
        @endif
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                @if($produk->gambar_produk)
                    <img src="{{ asset('storage/gambar_produk/'.$produk->gambar_produk) }}" class="card-img-top" style="height:200px;object-fit:cover;">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                    <p class="card-text">{!! Str::limit($produk->deskripsi_produk, 10) !!}</p>
                    <div class="mb-2"><span class="badge bg-info">Rp{{ number_format($produk->harga_produk,0,',','.') }}</span></div>
                    <div class="mb-2"><small class="text-muted">Kategori: {{ $produk->kategori_produk }}</small></div>
                    <div class="mb-2"><small class="text-muted">Porsi: {{ $produk->jumlah_porsi }}</small></div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('admin.produk.edit', $produk->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.produk.destroy', $produk->id) }}" method="POST" onsubmit="return confirm('Yakin hapus produk ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
         @if($loop->iteration % 3 == 0 || $loop->last)
            </div>
        @endif
        @endforeach
    </div>
</div>
@endsection
