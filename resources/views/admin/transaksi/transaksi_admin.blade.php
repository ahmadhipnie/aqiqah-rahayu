@extends('layout.sidebar')
@section('title', 'Transaksi')
@section('content')

    <div class="container-fluid py-4">
        <form method="GET" action="{{ route('admin.transaksi') }}" class="row g-3 mb-3">
            <div class="col-md-3">
                <input type="date" name="from" class="form-control" value="{{ $from }}">
            </div>
            <div class="col-md-3">
                <input type="date" name="to" class="form-control" value="{{ $to }}">
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary" type="submit">Filter</button>
            </div>
        </form>

        <form method="GET" action="{{ route('admin.transaksi.export') }}" class="row g-3 mb-3">
            <div class="col-md-3">
                <input type="date" name="from" class="form-control" value="{{ $from }}">
            </div>
            <div class="col-md-3">
                <input type="date" name="to" class="form-control" value="{{ $to }}">
            </div>
            <div class="col-md-3">
                <button class="btn btn-success" type="submit">Export Excel</button>
            </div>
        </form>

        <div class="card">
            <div class="card-header">Daftar Transaksi</div>
            <div class="card-body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Produk ID</th>
                            <th>Jumlah Produk</th>
                            <th>Total Harga</th>
                            <th>Nama Pembeli</th>
                            <th>No Telepon</th>
                            <th>No WA Aktif</th>
                            <th>Alamat Pembeli</th>
                            <th>Status Transaksi</th>
                            <th>Tanggal Transaksi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksis as $trx)
                            <tr>
                                <td>{{ $trx->id }}</td>
                                <td>{{ $trx->produk_id }}</td>
                                <td>{{ $trx->jumlah_produk }}</td>
                                <td>Rp{{ number_format($trx->total_harga, 0, ',', '.') }}</td>
                                <td>{{ $trx->nama_pembeli }}</td>
                                <td>{{ $trx->no_telepon_pembeli }}</td>
                                <td>{{ $trx->no_wa_aktif }}</td>
                                <td>{{ $trx->alamat_pembeli }}</td>
                                <td>{{ $trx->status_transaksi }}</td>
                                <td>{{ $trx->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.transaksi.edit', $trx->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
