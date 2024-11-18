<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <title>ECS - Export Center Surabaya</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- csrf -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- base_url -->
    <meta name="base_url" content="{{ url('') }}" />
    <!-- Favicon -->
    <link href="{{ asset('assets/images/favicon_io/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets_users/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets_users/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets_users/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets_users/css/style.css')}}" rel="stylesheet">

    <!-- Datatables -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css" rel="stylesheet">

    {{-- splide js --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">


    <style>
        .text-justify {
            text-align: justify;
        }
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Main Content -->
    @section('content')
    @show
    <!-- Main Content -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 wow fadeIn" data-wow-delay="0.1s"
        style="margin-top: 6rem;">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-7">
                    <h4 class="text-light mb-4">Address</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jl. Kedung Doro No.80-90, Sawahan, Kec. Sawahan, Surabaya, Jawa Timur 60251</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>(+62)857 5587 9497</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>exportcenter.surabaya@kemendag.go.id</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Services</h4>
                    <a class="btn btn-link" href="{{ url('our-konsultasi') }}">{{ session('locale') == 'id' ? 'Konsultasi Ekspor' : 'Export Consultation' }}</a>
                    <a class="btn btn-link" href="{{ url('our-inquiries') }}">{{ session('locale') == 'id' ? 'Penyebaran Inquiry' : 'Inquiry Dissemination' }}</a>
                    <a class="btn btn-link" href="{{ url('our-bm') }}">{{ session('locale') == 'id' ? 'Bussiness Matching' : 'Business Matching' }}</a>
                    <a class="btn btn-link" href="{{ url('our-panduan') }}">{{ session('locale') == 'id' ? 'Pendampingan InaExport' : 'InaExport Mentoring' }}</a>
                    <a class="btn btn-link" href="{{ url('other-service') }}">{{ session('locale') == 'id' ? 'Layanan Lainnya' : 'Other Services' }}</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="{{ url('about') }}">About Us</a>
                    <a class="btn btn-link" href="{{ url('contact') }}">Contact Us</a>
                    <a class="btn btn-link" href="{{ url('services') }}">Our Services</a>
                    <a class="btn btn-link" href="{{ url('terms') }}">Terms & Condition</a>
                    <a class="btn btn-link" href="{{ url('support') }}">Support</a>
                </div>
                <div class="col-lg-2 col-md-">
                    <h4 class="text-light mb-4">Newsletter</h4>
                    <p></p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button"
                            class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="https://exportcenter.id/">ExportCenter.id</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="https://www.instagram.com/aaaaarrriip/">aaaaarrriip</a>
                        </br>Supported By <a class="border-bottom" href="https://smartone.co.id/"
                            target="_blank">SmartOne</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- Datatables -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets_users/lib/wow/wow.min.js')}}"></script>
    <script src="{{ asset('assets_users/lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('assets_users/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{ asset('assets_users/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{ asset('assets_users/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets_users/js/main.js')}}"></script>

    {{-- splide js --}}
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script>
        var base_url = document.querySelector('meta[name="base_url"]').getAttribute('content') + '/';
    </script>
    @yield('js')
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
