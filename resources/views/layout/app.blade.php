<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SAPIBATAM</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fredoka:wght@600;700&family=Montserrat:wght@200;400;600&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">



</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
    <div class="container-fluid border-bottom bg-light wow fadeIn" data-wow-delay="0.1s">
        <div class="container topbar bg-primary d-none d-lg-block py-2" style="border-radius: 0 40px">
            <div class="d-flex justify-content-between">
                <div class="top-info ps-2">
                    <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#"
                            class="text-white">Dinas Komplek Peternakan Sei Temiang, Sekupang, Batam, Kepulauan Riau,
                            INDONESIA</a></small>
                </div>
                <div class="top-link pe-2">
                    <a href="https://www.facebook.com/sapibatamdotcom"
                        class="btn btn-light btn-sm-square rounded-circle"><i
                            class="fab fa-facebook-f text-secondary"></i></a>
                    <a href="https://www.instagram.com/sapibatam/" class="btn btn-light btn-sm-square rounded-circle"><i
                            class="fab fa-instagram text-secondary"></i></a>
                </div>
            </div>
        </div>
        <div class="container px-0">
            <nav class="navbar navbar-light navbar-expand-xl py-3">
                <a href="" class="navbar-brand"><img src="{{ asset('img/logo_sapibatam.png') }}"
                        alt="logo_sapibatam"></a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <a href="{{ route('index') }}"
                            class="nav-item nav-link {{ request()->routeIs('index') ? 'active' : '' }}">Home</a>
                        <a href="{{ route('about') }}"
                            class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a>
                        <a href="{{ route('harga') }}"
                            class="nav-item nav-link {{ request()->routeIs('harga') ? 'active' : '' }}">Harga</a>
                        <a href="{{ route('events') }}"
                            class="nav-item nav-link {{ request()->routeIs('events') ? 'active' : '' }}">Events</a>
                        <a href="{{ route('blog') }}"
                            class="nav-item nav-link {{ request()->routeIs('blog') ? 'active' : '' }}">Blog</a>
                        <a href="{{ route('contact') }}"
                            class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                    </div>
                    <div class="d-flex me-4">
                        <div id="phone-tada" class="d-flex align-items-center justify-content-center">
                            <a href="" class="position-relative wow tada" data-wow-delay=".9s">
                                <i class="fa fa-phone-alt text-primary fa-2x me-4"></i>
                                <div class="position-absolute" style="top: -7px; left: 20px;">
                                    <span><i class="fa fa-comment-dots text-secondary"></i></span>
                                </div>
                            </a>
                        </div>
                        <div class="d-flex flex-column pe-3 border-end border-primary">
                            <span class="text-primary">Ingin bertanya lebih lanjut?</span>
                            <a href="tel:+62853 6662 0008"><span class="text-secondary">Telepon: +62853 6662
                                    0008</span></a>
                        </div>
                    </div>
                    {{-- <button class="btn-search btn btn-primary btn-md-square rounded">Pesan Sekarang</button> --}}

                    <a href="{{ route('transaksi.pelanggan') }}"
                        class="btn btn-primary btn-lg rounded-pill d-flex align-items-center gap-2 shadow-sm">
                        Pesan Sekarang
                    </a>

                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->



    @yield('content_landing')

    <!-- Footer Start -->
    <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="footer-item">
                        <a href="" class="navbar-brand"><img src="{{ asset('img/logo_sapibatam.png') }}"
                                alt="logo_sapibatam"></a>
                        <p class="mb-4">Tempat aqiqah, qurban dan catering terbaik di Batam</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="footer-item">
                        <div class="d-flex flex-column p-4 ps-5 text-dark border border-primary"
                            style="border-radius: 50% 20% / 10% 40%;">
                            <a href="https://www.google.co.id/maps/dir//KANDANG+RAHAYU,+Jl.KH.Ahmad+Dahlan,+Tj.+Riau,+Kec.+Sekupang,+Kota+Batam,+Kepulauan+Riau+29425/@1.0789332,103.9522441,18.25z/data=!4m8!4m7!1m0!1m5!1m1!1s0x31d98dafbb808919:0xf580ec501be37437!2m2!1d103.952512!2d1.0792574"
                                class="text-body mb-4"><i class="fa fa-map-marker-alt text-primary me-2"></i> Maps</a>
                            <a href="https://api.whatsapp.com/send?phone=6285366620008&text=Halo%20Aqiqah%20Batam,%20Saya%20mau%20pesan%20"
                                class="text-body mb-4"><i class="fa fa-map-marker-alt text-primary me-2"></i> Wa
                                Minyu</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="footer-item">
                        <h4
                            class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">
                            LOKASI</h4>
                        <div class="d-flex flex-column align-items-start">
                            <a href="" class="text-body mb-4"><i
                                    class="fa fa-map-marker-alt text-primary me-2"></i> Dinas Komplek Peternakan Sei
                                Temiang, Sekupang, Batam, Kepulauan Riau, INDONESIA</a>
                            <a href="{{ route('hubungiWhatsappNomor1') }}"
                                class="text-start rounded-0 text-body mb-4"><i
                                    class="fa fa-phone-alt text-primary me-2"></i> (+62) 853 6662 0008</a>
                            <a href="{{ route('hubungiWhatsappNomor2') }}"
                                class="text-start rounded-0 text-body mb-4"><i
                                    class="fa fa-phone-alt text-primary me-2"></i> (+62) 853 6662 0009</a>
                            {{-- <a href="" class="text-start rounded-0 text-body mb-4"><i
                                    class="fas fa-envelope text-primary me-2"></i> exampleemail@gmail.com</a> --}}
                            <a href="" class="text-start rounded-0 text-body mb-4"><i
                                    class="fa fa-clock text-primary me-2"></i> 24/7 Hours Service</a>
                            <div class="footer-icon d-flex">
                                <a class="btn btn-primary btn-sm-square me-3 rounded-circle text-white"
                                    href="https://www.facebook.com/sapibatamdotcom"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a href="https://www.instagram.com/sapibatam/"
                                    class="btn btn-primary btn-sm-square me-3 rounded-circle text-white"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="footer-item">
                        <h4
                            class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">
                            HUBUNGI KAMI</h4>
                        <div class="d-flex flex-column align-items-center justify-content-center"
                            style="height: 100%;">
                            <a href="https://wa.me/6285366620008" target="_blank"
                                class="btn btn-success btn-lg rounded-pill px-4 py-2 mb-2">
                                <i class="fab fa-whatsapp me-2"></i>Hubungi Kami Lewat WhatsApp
                            </a>
                            <small class="text-muted">Respon cepat setiap hari</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-dark py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <span class="text-light"><a href="#"><i
                                class="fas fa-copyright text-light me-2"></i>HF-Tech</a>, All right reserved.</span>
                </div>
                <div class="col-md-6 my-auto text-center text-md-end text-white">
                    <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                    <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                    <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                    Designed By <a class="border-bottom" href="">HF-Tech</a> Distributed By <a
                        clas="border-bottom" href="">HF-Tech</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>
