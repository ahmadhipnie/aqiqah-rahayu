@extends('layout.sidebar')
@section('title', 'Tambah Event')
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Tambah Event</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="judul_events" class="form-label">Judul Event</label>
                            <input type="text" name="judul_events" id="judul_events" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_events" class="form-label">Tanggal Event</label>
                            <input type="date" name="tanggal_events" id="tanggal_events" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat_events" class="form-label">Alamat Event</label>
                            <input type="text" name="alamat_events" id="alamat_events" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi_events" class="form-label">Deskripsi Event</label>
                            <textarea name="deskripsi_events" id="summernote" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="gambar_events" class="form-label">Gambar Event</label>
                            <input type="file" name="gambar_events" id="gambar_events" class="form-control" required>
                        </div>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="{{ route('admin.events') }}" class="btn btn-secondary">Kembali</a>
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
