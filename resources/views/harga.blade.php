@extends('layout.app')
@section('content_landing')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4">Programs</h1>
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


                {{-- @foreach ($allProduks as $produk)
                    <div class="col-md-6 col-lg-6 col-xl-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="program-item rounded">
                            <div class="program-img position-relative">
                                <div class="overflow-hidden img-border-radius">
                                    <img src="{{ asset('storage/gambar_produk/' . $produk->gambar_produk) }}"
                                        class="img-fluid w-100" alt="Image">
                                </div>
                            </div>
                            <div class="program-text bg-white px-4 pb-3">
                                <div class="program-text-inner">
                                    <a href="#" class="h4">{{ $produk->nama_produk }}</a>
                                    <p class="mt-3 mb-0">{!! Str::limit($produk->deskripsi_produk, 30) !!}</p>
                                </div>
                            </div>
                            <div
                                class="program-teacher d-flex align-items-center border-top border-primary bg-white px-4 py-3">
                                <div class="ms-3">
                                    <h6 class="mb-0 text-primary">Rp{{ number_format($produk->harga_produk, 0, ',', '.') }}
                                    </h6>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between px-4 py-2 bg-primary rounded-bottom">
                                <small class="text-white"><i class="fas fa-wheelchair me-1"></i>{{ $produk->jumlah_porsi }}
                                    porsi</small>
                            </div>
                        </div>
                    </div>
                @endforeach --}}




                @foreach ($allProduks as $produk)
                    <div class="col-md-6 col-lg-6 col-xl-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="program-item rounded h-100 d-flex flex-column">
                            <div class="program-img position-relative">
                                <div class="overflow-hidden img-border-radius">
                                    <img src="{{ asset('storage/gambar_produk/' . $produk->gambar_produk) }}"
                                        class="img-fluid w-100" alt="Image" style="height:200px; object-fit:cover;">
                                </div>
                            </div>
                            <div class="program-text bg-white px-4 pb-3 flex-grow-1">
                                <div class="program-text-inner">
                                    <a href="{{ route('produk.detail', $produk->id) }}" class="h4">{{ $produk->nama_produk }}</a>
                                    <p class="mt-3 mb-0">{!! Str::limit($produk->deskripsi_produk, 100) !!}</p>
                                </div>
                            </div>
                            <div
                                class="program-teacher d-flex align-items-center border-top border-primary bg-white px-4 py-3">
                                <div class="ms-3">
                                    <h6 class="mb-0 text-primary">Rp{{ number_format($produk->harga_produk, 0, ',', '.') }}
                                    </h6>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between px-4 py-2 bg-primary rounded-bottom mt-auto">
                                <small class="text-white">{{ $produk->jumlah_porsi }}
                                    porsi</small>
                            </div>
                        </div>
                    </div>
                @endforeach






            </div>
        </div>
    </div>
    <!-- Program End -->
@endsection
