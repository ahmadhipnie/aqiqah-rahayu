@extends('layout.app')
@section('content_landing')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4">Produks</h1>
            <h2 class="display-2 text-white mb-4">بِسْــــــــــــــــمِ اﷲِالرَّحْمَنِ اارَّحِيم</h2>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white" aria-current="page">Programs</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Programs Start -->
    <div class="container-fluid program  py-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">
                    Produk Kami</h4>
                <h1 class="mb-5 display-3">Kami menawarkan banyak produk yang bisa anda beli</h1>
            </div>
            <div class="row g-5 justify-content-center">




                <div class="container py-4" data-wow-delay="0.1s">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card shadow border-0">
                                @if ($produk->gambar_produk)
                                    <img src="{{ asset('storage/gambar_produk/' . $produk->gambar_produk) }}"
                                        class="card-img-top" style="height:300px;object-fit:cover;"
                                        alt="{{ $produk->nama_produk }}">
                                @endif
                                <div class="card-body bg-light">
                                    <span class="badge bg-info mb-2">{{ $produk->kategori_produk }}</span>
                                    <h2 class="card-title mb-3">{{ $produk->nama_produk }}</h2>
                                    <h5 class="text-primary mb-3">Rp{{ number_format($produk->harga_produk, 0, ',', '.') }}
                                    </h5>
                                    <div class="mb-2"><strong>Porsi:</strong> {{ $produk->jumlah_porsi }}</div>
                                    <div class="mb-4">{!! $produk->deskripsi_produk !!}</div>
                                    <a href="{{ route('harga') }}" class="btn btn-secondary">Kembali ke Daftar Produk</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- Program End -->
@endsection
