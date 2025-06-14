@extends('layout.sidebar')
@section('title', 'Tambah Produk')
@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Tambah Produk</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" name="nama_produk" id="nama_produk" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="harga_produk" class="form-label">Harga Produk</label>
                                <input type="number" name="harga_produk" id="harga_produk" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="kategori_produk" class="form-label">Kategori Produk</label>
                                <input type="text" name="kategori_produk" id="kategori_produk" class="form-control"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="jumlah_porsi" class="form-label">Jumlah Porsi</label>
                                <input type="number" name="jumlah_porsi" id="jumlah_porsi" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi_produk" class="form-label">Deskripsi Produk</label>
                                <textarea name="deskripsi_produk" id="summernote" class="form-control" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="gambar_produk" class="form-label">Gambar Produk</label>
                                <input type="file" name="gambar_produk" id="gambar_produk" class="form-control" required>
                            </div>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{ route('admin.produk') }}" class="btn btn-secondary">Kembali</a>
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
