@extends('layout.app')
@section('content_landing')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4">Blog Kami</h1>
            <h2 class="display-2 text-white mb-4">بِسْــــــــــــــــمِ اﷲِالرَّحْمَنِ اارَّحِيم</h2>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white" aria-current="page">Our Blog</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->



    <div class="container py-4" data-wow-delay="0.1s">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow border-0">
                    @if ($blog->gambar_blog)
                        <img src="{{ asset('storage/gambar_blog/' . $blog->gambar_blog) }}" class="card-img-top"
                            style="height:300px;object-fit:cover;" alt="{{ $blog->judul_blog }}">
                    @endif
                    <div class="card-body bg-light">
                        <span class="badge bg-info mb-2">{{ $blog->kategori_blog }}</span>
                        <h2 class="card-title mb-3">{{ $blog->judul_blog }}</h2>
                        <div class="mb-4">
                            {!! $blog->deskripsi_blog !!}
                        </div>
                        <a href="{{ route('blog') }}" class="btn btn-secondary">Kembali ke Blog</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
