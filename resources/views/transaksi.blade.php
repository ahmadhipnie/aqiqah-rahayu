@extends('layout.app')
@section('content_landing')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4">Transaksi</h1>
            <h2 class="display-2 text-white mb-4">بِسْــــــــــــــــمِ اﷲِالرَّحْمَنِ اارَّحِيم</h2>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white" aria-current="page">Transaksi</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <div class="container py-4">
        <h2 class="mb-4">Pilih Produk</h2>
        <form id="formTransaksi" action="" method="POST">
            @csrf
            <div class="row">
                @foreach ($produks as $produk)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="{{ asset('storage/gambar_produk/' . $produk->gambar_produk) }}" class="card-img-top"
                                style="height:180px;object-fit:cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                                <p class="card-text">{{ Str::limit($produk->deskripsi_produk, 50) }}</p>
                                <div class="mb-2"><span
                                        class="badge bg-info">Rp{{ number_format($produk->harga_produk, 0, ',', '.') }}</span>
                                </div>
                                <div>
                                    <input type="checkbox" class="produk-checkbox" name="produk_id[]"
                                        value="{{ $produk->id }}" data-harga="{{ $produk->harga_produk }}">
                                    <label>Pilih Produk Ini</label>
                                    <input type="number" min="1" value="1"
                                        class="form-control form-control-sm mt-2 jumlah-produk"
                                        name="jumlah_produk[{{ $produk->id }}]" style="width:80px;display:inline-block;"
                                        disabled>
                                    <small class="text-muted ms-2">Jumlah</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <hr>
            <h4 class="mb-3">Data Diri Pemesan</h4>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Nama Pembeli</label>
                    <input type="text" name="nama_pembeli" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>No Telepon</label>
                    <input type="text" name="no_telepon_pembeli" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>No WA Aktif</label>
                    <input type="text" name="no_wa_aktif" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Alamat</label>
                    <input type="text" name="alamat_pembeli" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Email Pembeli</label>
                    <input type="email" name="email_pembeli" class="form-control" required>
                </div>
            </div>
            <input type="hidden" name="total_harga" id="total_harga_input">
            <div class="mb-3">
                <h4>Total Harga: <span id="total_harga" class="text-primary">Rp0</span></h4>
            </div>
            <button type="button" id="btn-bayar" class="btn btn-success btn-lg">Bayar Sekarang</button>
        </form>
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function updateTotal() {
                let total = 0;
                document.querySelectorAll('.produk-checkbox').forEach(function(checkbox) {
                    if (checkbox.checked) {
                        let harga = parseInt(checkbox.getAttribute('data-harga'));
                        let jumlahInput = checkbox.closest('.card-body').querySelector('.jumlah-produk');
                        let jumlah = parseInt(jumlahInput.value) || 1;
                        total += harga * jumlah;
                    }
                });
                document.getElementById('total_harga').innerText = 'Rp' + total.toLocaleString('id-ID');
                document.getElementById('total_harga_input').value = total;
            }

            document.querySelectorAll('.produk-checkbox').forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    let jumlahInput = this.closest('.card-body').querySelector('.jumlah-produk');
                    jumlahInput.disabled = !this.checked;
                    updateTotal();
                });
            });

            document.querySelectorAll('.jumlah-produk').forEach(function(input) {
                input.addEventListener('input', function() {
                    updateTotal();
                });
            });
        });
    </script>



    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}">
    </script>
    <script>
        document.getElementById('btn-bayar').onclick = function(e) {
            e.preventDefault();
            let form = document.getElementById('formTransaksi');
            let formData = new FormData(form);

            fetch("{{ route('transaksi.snap_token') }}", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    window.snap.pay(data.snap_token, {
                        onSuccess: function(result) {
                            // Ambil semua data form
                            let formObj = {};
                            formData.forEach((value, key) => {
                                // Normalisasi key produk_id[]
                                if (key === 'produk_id[]') key = 'produk_id';
                                if (formObj[key]) {
                                    if (!Array.isArray(formObj[key])) formObj[key] = [formObj[
                                        key]];
                                    formObj[key].push(value);
                                } else {
                                    formObj[key] = value;
                                }
                            });
                            // Kirim data form + result Midtrans ke backend
                            fetch("{{ route('transaksi.snap_finish') }}", {
                                method: "POST",
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    result_data: result,
                                    form_data: formObj
                                })
                            }).then(() => {
                                window.location.href = "{{ route('index') }}";
                            });
                        },
                        onPending: function(result) {
                            alert("Transaksi belum selesai, silakan selesaikan pembayaran.");
                        },
                        onError: function(result) {
                            alert("Pembayaran gagal!");
                        },
                        onClose: function() {
                            alert('Kamu belum menyelesaikan pembayaran!');
                        }
                    });
                });
        };
    </script>
@endsection
