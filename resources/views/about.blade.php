@extends('layout.app')
@section('content_landing')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4">Tentang Kami</h1>
            <h2 class="display-2 text-white mb-4">بِسْــــــــــــــــمِ اﷲِالرَّحْمَنِ اارَّحِيم</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white" aria-current="page">About Us</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- About Start -->
    <div class="container-fluid py-5 about bg-light">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="video border">
                    </div>
                </div>
                <div class="col-lg-7 wow fadeIn" data-wow-delay="0.3s">
                    <h4
                        class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">
                        Tentang Kami</h4>
                    <h1 class="text-dark mb-4 display-5">AQIQAH BATAM RAHAYU</h1>
                    <p class="text-dark mb-4">Assalamualaikum Warahmatullahi Wabarakatuh,..</p>
                    <p class="text-dark mb-4">Mengingat besarnya semangat Kaum Muslimin di Pulau Batam dan sekitarnya, yang
                        hendak melaksanakan salah satu syari'at Islam , yaitu Aqiqah</p>
                    <p class="text-dark mb-4">Oleh karena itu kami Aqiqah Batam Rahayu menyediakan kambing-kambing yang
                        sesuai Syariat, yaitu umur yang sesuai, tidak cacat, gemuk, dan sehat.</p>
                    <p class="text-dark mb-4">Kami dari Aqiqah Batam Rahayu, selain memiliki beberapa paket Aqiqah dan kami
                        juga menjual sapi dan kambing ternak serta Qurban yang dapat dilihat di sapibatam.com</p>
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <h6 class="mb-3"><i class="fas fa-check-circle me-2"></i>bersertifikat Halal MUI</h6>
                            <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-primary"></i>GRATIS antar se BATAM
                            </h6>
                            <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-secondary"></i>GRATIS boneka</h6>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="mb-3"><i class="fas fa-check-circle me-2"></i>GRATIS SATE AYAM</h6>
                            <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-primary"></i>GRATIS SERTIFIKAT</h6>
                            <h6><i class="fas fa-check-circle me-2 text-secondary"></i>GRATIS dipinjami alat makan</h6>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="mb-3"><i class="fas fa-check-circle me-2"></i>GRATIS tester</h6>
                            <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-primary"></i>GRATIS konsultasi</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Video -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen
                            allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
@endsection
