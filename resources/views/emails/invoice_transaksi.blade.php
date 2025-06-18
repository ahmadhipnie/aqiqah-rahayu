<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Invoice Pembayaran</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f7f7f7; }
        .invoice-box { background: #fff; padding: 30px; border-radius: 8px; max-width: 600px; margin: auto; box-shadow: 0 0 10px #ccc; }
        .logo { width: 120px; }
        .lunas { color: #fff; background: #28a745; padding: 8px 24px; border-radius: 20px; font-weight: bold; float: right; }
        .table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .table th, .table td { border: 1px solid #eee; padding: 8px; text-align: left; }
        .table th { background: #f0f0f0; }
        .total { font-weight: bold; }
        .footer { margin-top: 30px; font-size: 13px; color: #888; text-align: center; }
    </style>
</head>
<body>
    <div class="invoice-box">
        <div style="display: flex; align-items: center; justify-content: space-between;">
            <img src="{{ asset('img/logo_sapibatam.png') }}" class="logo" alt="Logo">
            <span class="lunas">LUNAS</span>
        </div>
        <h2 style="margin-top: 20px;">Invoice Pembayaran</h2>
        <p>
            <strong>Nama:</strong> {{ $transaksi['nama_pembeli'] }}<br>
            <strong>Email:</strong> {{ $transaksi['email_pembeli'] }}<br>
            <strong>No. Telepon:</strong> {{ $transaksi['no_telepon_pembeli'] }}<br>
            <strong>Tanggal Pengantaran:</strong> {{ $transaksi['tanggal_pengantaran'] }}<br>
            <strong>Alamat:</strong> {{ $transaksi['alamat_pembeli'] }}
        </p>
        <table class="table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produkList as $produk)
                <tr>
                    <td>{{ $produk['nama_produk'] }}</td>
                    <td>{{ $produk['jumlah'] }}</td>
                    <td>Rp{{ number_format($produk['harga'],0,',','.') }}</td>
                    <td>Rp{{ number_format($produk['subtotal'],0,',','.') }}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="total">Total</td>
                    <td class="total">Rp{{ number_format($transaksi['total_harga'],0,',','.') }}</td>
                </tr>
            </tbody>
        </table>
        <div class="footer">
            Terima kasih telah melakukan pemesanan di <strong>Aqiqah Rahayu</strong>.<br>
            Invoice ini sah tanpa tanda tangan.
        </div>
    </div>
</body>
</html>
