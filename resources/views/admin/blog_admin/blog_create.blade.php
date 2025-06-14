{{-- filepath: resources/views/admin/blog_admin/create.blade.php --}}
@extends('layout.sidebar')
@section('title', 'Tambah Blog')
@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Tambah Blog</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="judul_blog" class="form-label">Judul Blog</label>
                                <input type="text" name="judul_blog" id="judul_blog" class="form-control"
                                    placeholder="Judul Blog" required>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi_blog" class="form-label">Deskripsi Blog</label>
                                <textarea name="deskripsi_blog" id="summernote" class="form-control" placeholder="Deskripsi Blog" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="kategori_blog" class="form-label">Kategori Blog</label>
                                <input type="text" name="kategori_blog" id="kategori_blog" class="form-control"
                                    placeholder="Kategori Blog" required>
                            </div>
                            <div class="mb-3">
                                <label for="gambar_blog" class="form-label">Gambar Blog</label>
                                <input type="file" name="gambar_blog" id="gambar_blog" class="form-control" required>
                            </div>
                            <button class="btn btn-primary" type="submit">Simpan</button>
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
