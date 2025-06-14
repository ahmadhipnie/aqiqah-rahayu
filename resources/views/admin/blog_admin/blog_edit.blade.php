{{-- filepath: resources/views/admin/blog_admin/edit.blade.php --}}
@extends('layout.sidebar')
@section('title', 'Edit Blog')
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0">Edit Blog</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="judul_blog" class="form-label">Judul Blog</label>
                            <input type="text" name="judul_blog" id="judul_blog" class="form-control" value="{{ $blog->judul_blog }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi_blog" class="form-label">Deskripsi Blog</label>
                            <textarea name="deskripsi_blog" id="summernote" class="form-control" required>{{ $blog->deskripsi_blog }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="kategori_blog" class="form-label">Kategori Blog</label>
                            <input type="text" name="kategori_blog" id="kategori_blog" class="form-control" value="{{ $blog->kategori_blog }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="gambar_blog" class="form-label">Gambar Blog</label>
                            <input type="file" name="gambar_blog" id="gambar_blog" class="form-control">
                            <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                            @if($blog->gambar_blog)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/gambar_blog/'.$blog->gambar_blog) }}" width="120">
                                </div>
                            @endif
                        </div>
                        <button class="btn btn-primary" type="submit">Update</button>
                        <a href="{{ route('admin.blog') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
        $('#summernote').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
@endsection
