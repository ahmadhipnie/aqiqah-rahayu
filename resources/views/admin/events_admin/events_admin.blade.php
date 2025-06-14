@extends('layout.sidebar')
@section('title', 'events')
@section('content')

<div class="container-fluid py-4">
    <a href="{{ route('admin.events.create') }}" class="btn btn-primary mb-3">Tambah Event</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @foreach($events as $event)
        @if($loop->iteration % 3 == 1)
            <div class="row">
        @endif
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                @if($event->gambar_events)
                    <img src="{{ asset('storage/gambar_events/'.$event->gambar_events) }}" class="card-img-top" style="height:200px;object-fit:cover;">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $event->judul_events }}</h5>
                    <p class="card-text">{!! Str::limit($event->deskripsi_events, 10) !!}</p>
                    <div class="mb-2"><span class="badge bg-info">{{ $event->tanggal_events }}</span></div>
                    <div class="mb-2"><small class="text-muted">{{ $event->alamat_events }}</small></div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Yakin hapus event ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
        @if($loop->iteration % 3 == 0 || $loop->last)
            </div>
        @endif
    @endforeach
</div>
@endsection
