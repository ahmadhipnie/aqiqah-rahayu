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

                @foreach ($allEvents as $event)
                    <div class="col-md-6 col-lg-6 col-xl-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="events-item bg-primary rounded h-100 d-flex flex-column">
                            <div class="events-inner position-relative">
                                <div class="events-img overflow-hidden rounded-circle position-relative mx-auto"
                                    style="width:200px; height:200px;">
                                    <img src="{{ asset('storage/gambar_events/' . $event->gambar_events) }}"
                                        class="img-fluid w-100 h-100 rounded-circle" alt="Image"
                                        style="object-fit:cover; width:200px; height:200px;">
                                    <div class="event-overlay">
                                        <a href="{{ asset('storage/gambar_events/' . $event->gambar_events) }}"
                                            data-lightbox="event-1">
                                            <i class="fas fa-search-plus text-white fa-2x"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="px-4 py-2 bg-secondary text-white text-center events-rate">
                                    {{ $event->tanggal_events }}</div>
                                <div class="d-flex justify-content-between px-4 py-2 bg-secondary">
                                    <small class="text-white">
                                        <i class="fas fa-map-marker-alt me-1 text-primary"></i>{{ $event->alamat_events }}
                                    </small>
                                </div>
                            </div>
                            <div
                                class="events-text p-4 border border-primary bg-white border-top-0 rounded-bottom flex-grow-1 mt-auto">
                                <a href="#" class="h4">{{ $event->judul_events }}</a>
                                <p class="mb-0 mt-3">{!! Str::limit($event->deskripsi_events, 20) !!}</p>

                                <div class="text-center mt-auto">
                                    <a href="{{ route('events.detail', $event->id) }}"
                                        class="btn btn-primary text-white px-4 py-2 mb-3 btn-border-radius">View Details</a>
                                </div>
                            </div>


                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Events End-->
@endsection
