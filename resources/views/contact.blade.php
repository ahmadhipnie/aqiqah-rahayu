@extends('layout.app')
@section('content_landing')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4">Contact Us</h1>
            <h2 class="display-2 text-white mb-4">بِسْــــــــــــــــمِ اﷲِالرَّحْمَنِ اارَّحِيم</h2>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white" aria-current="page">Contact Us</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="p-5 bg-light rounded">
                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                    <h4
                        class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">
                        Contact Us</h4>
                    <h1 class="display-3">Contact For Any Query</h1>
                    <p class="mb-5">The contact form is currently inactive. Get a functional and working contact form with
                        Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a
                            href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
                </div>
                <div class="row g-5 mb-5">
                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="d-flex w-100 border border-primary p-4 rounded bg-white">
                            <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                            <div class="">
                                <h4>Alamat</h4>
                                <p class="mb-2">Dinas Komplek Peternakan Sei Temiang, Sekupang, Batam, Kepulauan Riau,
                                    INDONESIA</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                        <div class="d-flex w-100 border border-primary p-4 rounded bg-white">
                            <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                            <div class="">
                                <h4>Telephone</h4>
                                <p class="mb-2">(+62) 853 6662 0008</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                        <div class="d-flex w-100 border border-primary p-4 rounded bg-white">
                            <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                            <div class="">
                                <h4>Telephone</h4>
                                <p class="mb-2">(+62) 853 6662 0009</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
