<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <title>Argon Dashboard 3 by Creative Tim</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/argon-dashboard.css?v=2.1.0') }}" rel="stylesheet" />


</head>

<body>
    @include('sweetalert::alert')

    <main class="main-content mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Login</h4>
                                    <p class="mb-0">masukkan email dan password untuk login</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" action="{{ route('login.post') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="text" class="form-control form-control-lg"
                                                placeholder="email" name="email">
                                        </div>
                                        <div class="mb-3">
                                            <div class="input-group">
                                                <input type="password" id="password"
                                                    class="form-control form-control-lg" placeholder="Password"
                                                    name="password">
                                                <div class="input-group-append"
                                                    style="transform: translateY(20%); margin-left: 10px;">
                                                    <span class="input-group-text" onclick="togglePassword()">
                                                        <i id="eye-icon" class="fa fa-eye"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                style="background-image: url('{{ asset('img/logo_sapibatam.png') }}'); background-size: contain; background-repeat: no-repeat; background-position: center;">
                                {{-- <span class="mask bg-gradient-primary opacity-6"></span> --}}
                                {{-- <h4 class="mt-5 text-white font-weight-bolder position-relative">"Selamat Datang"</h4> --}}
                                {{-- <p class="text-white position-relative">selamat datang di help center Yamaha Indonesia</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

     <script src="{{ asset('js/argon-dashboard.min.js?v=2.1.0') }}"></script>

    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            var eyeIcon = document.getElementById("eye-icon");

            console.log(eyeIcon); // Cek apakah elemen ditemukan

            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }
    </script>

</body>

</html>
