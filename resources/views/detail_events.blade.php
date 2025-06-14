@extends('layout.app')
@section('content_landing')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4">Events</h1>
            <h2 class="display-2 text-white mb-4">بِسْــــــــــــــــمِ اﷲِالرَّحْمَنِ اارَّحِيم</h2>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white" aria-current="page">Events</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Events Start -->
    <div class="container-fluid events py-5 bg-light">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">
                    Event kami</h4>
                <h1 class="mb-5 display-3">Acara kami yang sedang berjalan</h1>
            </div>
            <div class="row g-5 justify-content-center">

                <div class="container py-4" data-wow-delay="0.1s">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card shadow border-0">
                                @if ($event->gambar_events)
                                    <img src="{{ asset('storage/gambar_events/' . $event->gambar_events) }}"
                                        class="card-img-top" style="height:300px;object-fit:cover;"
                                        alt="{{ $event->judul_events }}">
                                @endif
                                <div class="card-body bg-light">
                                    <span class="badge bg-info mb-2">{{ $event->tanggal_events }}</span>
                                    <h2 class="card-title mb-3">{{ $event->judul_events }}</h2>
                                    <div class="mb-2"><strong>Alamat:</strong> {{ $event->alamat_events }}</div>
                                    <div class="mb-4">{!! $event->deskripsi_events !!}</div>
                                    <a href="{{ route('events') }}" class="btn btn-secondary">Kembali ke Daftar Event</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Events End-->
@endsection
