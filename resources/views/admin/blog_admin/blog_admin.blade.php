@extends('layout.sidebar')
@section('title', 'blog')
@section('content')

<div class="container-fluid py-4">
    <a href="{{ route('admin.blog.create') }}" class="btn btn-primary mb-3">Tambah Blog</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @foreach($blogs as $blog)
        @if($loop->iteration % 3 == 1)
            <div class="row">
        @endif
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                @if($blog->gambar_blog)
                    <img src="{{ asset('storage/gambar_blog/'.$blog->gambar_blog) }}" class="card-img-top" style="height:200px;object-fit:cover;">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $blog->judul_blog }}</h5>
                    <p class="card-text">{!! Str::limit($blog->deskripsi_blog, 30) !!}</p>
                    <span class="badge bg-info">{{ $blog->kategori_blog }}</span>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('admin.blog.edit', $blog->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.blog.destroy', $blog->id) }}" method="POST" onsubmit="return confirm('Yakin hapus blog ini?')">
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
@endsection
