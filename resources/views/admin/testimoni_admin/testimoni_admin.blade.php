@extends('layout.sidebar')
@section('title', 'Testimoni')
@section('content')

<div class="container-fluid py-4">
    <a href="{{ route('admin.testimoni.create') }}" class="btn btn-primary mb-3">Tambah Testimoni</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header">Daftar Testimoni</div>
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemberi</th>
                        <th>Isi Testimoni</th>
                        <th>Bintang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($testimonis as $no => $testimoni)
                    <tr>
                        <td>{{ $no+1 }}</td>
                        <td>{{ $testimoni->nama_pemberi_testimoni }}</td>
                        <td>{{ $testimoni->isi_testimoni }}</td>
                        <td>
                            @for($i=0; $i<$testimoni->jumlah_bintang; $i++)
                                <span class="text-warning">&#9733;</span>
                            @endfor
                        </td>
                        <td>
                            <a href="{{ route('admin.testimoni.edit', $testimoni->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.testimoni.destroy', $testimoni->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus testimoni ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @if($testimonis->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center">Belum ada testimoni.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
