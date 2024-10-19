@extends('layouts.users')
@section('content')

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow border-top border-5 border-primary sticky-top p-0">
    <a href="{{ url('/') }}" class="navbar-brand bg-white d-flex align-items-center px-4 px-lg-5">
        <img src="{{ asset('assets/images/kemendag.png')}}" class="" style="background: white;width: 180px; display: inline-block;" alt="">
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    @include('layouts.navbar')
</nav>
<!-- Navbar End -->


<!-- Page Header Start -->
<div class="container-fluid page-header py-5" style="margin-bottom: 6rem;">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">About</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- About Start -->
<div class="container-fluid overflow-hidden py-5 px-lg-0">
    <div class="container about py-5 px-lg-0">
        <div class="row g-5 mx-lg-0">
            <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('assets_users/img/about.jpg')}}"
                        style="object-fit: cover;" alt="">
                </div>
            </div>
            <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="text-secondary text-uppercase mb-3">About Us</h6>
                <h1 class="mb-5">Welcome to Export Center Surabaya</h1>
                <p class="mb-5">Kami hadir untuk mendukung dan memudahkan Anda dalam menjelajahi dunia ekspor. Dengan berbagai layanan komprehensif seperti konsultasi ekspor, penyebaran inquiry, business matching, hingga bantuan dalam aplikasi InaExport, kami siap menjadi mitra terpercaya dalam perjalanan Anda menuju pasar internasional. Mari bersama-sama wujudkan potensi ekspor Anda dan raih kesuksesan di kancah global</p>
                <div class="row g-4 mb-5">
                    <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                        <i class="fa fa-globe fa-3x text-primary mb-3"></i>
                        <h5>Global Coverage</h5>
                        <p class="m-0">Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem diam justo.</p>
                    </div>
                    <div class="col-sm-6 wow fadeIn" data-wow-delay="0.7s">
                        <i class="fa fa-shipping-fast fa-3x text-primary mb-3"></i>
                        <h5>On Time Delivery</h5>
                        <p class="m-0">Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem diam justo.</p>
                    </div>
                </div>
                <a href="" class="btn btn-primary py-3 px-5">Explore More</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Fact Start -->
<div class="container-xxl py-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <!-- <h6 class="text-secondary text-uppercase mb-3">Some Facts</h6> -->
                <h1 class="mb-5">Menuju Pasar Global, Bersama Wujudkan Sukses Ekspor</h1>
                <p>ECS menyediakan berbagai layanan untuk mendukung pelaku usaha dalam proses ekspor, mulai dari konsultasi terkait prosedur dan legalitas, penyebaran inquiry dari calon pembeli internasional, hingga business matching untuk memfasilitasi pertemuan dan negosiasi antara eksportir dan buyer. Melalui aplikasi InaExport, ECS juga membantu perusahaan terhubung dengan perwakilan perdagangan di luar negeri. Selain itu, ECS memfasilitasi penyelesaian sengketa antara eksportir dan buyer guna memastikan kelancaran transaksi ekspor.
                </p>

                <p class="mb-5">
                    Dengan antarmuka yang intuitif dan dukungan pelanggan yang siap membantu, kami adalah solusi terbaik untuk memastikan pengiriman Anda berjalan lancar. Bergabunglah dengan kami dan rasakan kemudahan dalam mengelola semua pengiriman Anda di satu tempat!
                </p>
                <div class="d-flex align-items-center">
                    <i class="fa fa-headphones fa-2x flex-shrink-0 bg-primary p-3 text-white"></i>
                    <div class="ps-4">
                        <h6>Call for any query!</h6>
                        <h3 class="text-primary m-0">+012 345 6789</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row g-4 align-items-center">
                    <div class="col-sm-6">
                        <div class="bg-primary p-4 mb-4 wow fadeIn" data-wow-delay="0.3s">
                            <i class="fa fa-users fa-2x text-white mb-3"></i>
                            <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                            <p class="text-white mb-0">Happy Clients</p>
                        </div>
                        <div class="bg-secondary p-4 wow fadeIn" data-wow-delay="0.5s">
                            <i class="fa fa-ship fa-2x text-white mb-3"></i>
                            <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                            <p class="text-white mb-0">Complete Shipments</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="bg-success p-4 wow fadeIn" data-wow-delay="0.7s">
                            <i class="fa fa-star fa-2x text-white mb-3"></i>
                            <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                            <p class="text-white mb-0">Customer Reviews</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fact End -->


<!-- Feature Start -->
<div class="container-fluid overflow-hidden py-5 px-lg-0">
    <div class="container feature py-5 px-lg-0">
        <div class="row g-5 mx-lg-0">
            <div class="col-lg-6 feature-text wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-secondary text-uppercase mb-3">Our Features</h6>
                <h1 class="mb-5">Layanan Komprehensif ECS untuk Mendukung Kesuksesan Ekspor Bisnis Anda.</h1>
                <div class="d-flex mb-4 wow fadeInUp" data-wow-delay="0.3s">
                    <i class="fa fa-globe text-primary fa-3x flex-shrink-0"></i>
                    <div class="ms-4">
                        <h5>Bussiness Matching</h5>
                        <p class="mb-0">Dengan business matching yang efektif, perusahaan dapat memaksimalkan potensi mereka dan menciptakan hubungan yang saling menguntungkan di dunia bisnis.</p>
                    </div>
                </div>
                <div class="d-flex mb-4 wow fadeIn" data-wow-delay="0.5s">
                    <i class="fa fa-shipping-fast text-primary fa-3x flex-shrink-0 fs-5"></i>
                    <div class="ms-4">
                        <h5>Penyebaran Inquiry</h5>
                        <p class="mb-0">Dengan proses penyebaran inquiry yang efektif, perusahaan dapat meningkatkan kepuasan pelanggan dan mengoptimalkan produk atau layanan yang ditawarkan.</p>
                    </div>
                </div>
                <div class="d-flex mb-4 wow fadeInUp" data-wow-delay="0.7s">
                    <i class="fa fa-headphones text-primary fa-3x flex-shrink-0"></i>
                    <div class="ms-4">
                        <h5>Konsultasi Ekspor</h5>
                        <p class="mb-0">Dengan dukungan dari para ahli, konsultasi ekspor membantu Anda mengurangi risiko dan meningkatkan peluang sukses di pasar global.</p>
                    </div>
                </div>
                <div class="d-flex mb-4 wow fadeInUp" data-wow-delay="0.7s">
                    <i class="fa fa-headphones text-primary fa-3x flex-shrink-0"></i>
                    <div class="ms-4">
                        <h5>Panduan Aplikasi Inaexport</h5>
                        <p class="mb-0">Dengan dukungan dari para ahli, konsultasi ekspor membantu Anda mengurangi risiko dan meningkatkan peluang sukses di pasar global.</p>
                    </div>
                </div>
                <div class="d-flex mb-4 wow fadeInUp" data-wow-delay="0.7s">
                    <i class="fa fa-headphones text-primary fa-3x flex-shrink-0"></i>
                    <div class="ms-4">
                        <h5>layanan Lainnya</h5>
                        <p class="mb-0">Dengan dukungan dari para ahli, konsultasi ekspor membantu Anda mengurangi risiko dan meningkatkan peluang sukses di pasar global.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 pe-lg-0 wow fadeInRight" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100"
                        src="{{ asset('assets_users/img/feature.jpg')}}" style="object-fit: cover;" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature End -->


<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container py-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-secondary text-uppercase">Our Team</h6>
            <h1 class="mb-5">Expert Team Members</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item p-4">
                    <div class="overflow-hidden mb-4">
                        <img class="img" style="width:250px; height:250px;" src="{{ asset('assets/images/ecs/tim/Dirgantoro.png')}}" alt="">
                    </div>
                    <h5 class="mb-0">Toto Dirgantoro</h5>
                    <p>{{ Str::limit('Kepala Pengelola Export Center Surabaya', 150, $end='...') }}</p>
                    <div class="btn-slide mt-1">
                        <i class="fa fa-share"></i>
                        <span>
                            <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item p-4">
                    <div class="overflow-hidden mb-4">
                        <img class="img" style="width:250px; height:250px;" src="{{ asset('assets/images/ecs/tim/Adistiar-Prayoga.png')}}" alt="">
                    </div>
                    <h5 class="mb-0">Adistiar Prayoga</h5>
                    <p>{{ Str::limit('Staff Senior Bidang Keuangan', 150, $end='...') }}</p>
                    <div class="btn-slide mt-1">
                        <i class="fa fa-share"></i>
                        <span>
                            <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item p-4">
                    <div class="overflow-hidden mb-4">
                        <img class="img" style="width:250px; height:250px;" src="{{ asset('assets/images/ecs/tim/Bu Rima.jpg')}}" alt="">
                    </div>
                    <h5 class="mb-0">Lies Rimayani</h5>
                    <p>{{ Str::limit('Staff Junior Keuangan', 150, $end='...') }}</p>
                    <div class="btn-slide mt-1">
                        <i class="fa fa-share"></i>
                        <span>
                            <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item p-4">
                    <div class="overflow-hidden mb-4">
                        <img class="img" style="width:250px; height:250px;" src="{{ asset('assets/images/ecs/tim/Jalian Setiarsa.png')}}" alt="">
                    </div>
                    <h5 class="mb-0">Jalian Setiarsa</h5>
                    <p>{{ Str::limit('Koordinator Tenaga Teknis', 150, $end='...') }}</p>
                    <div class="btn-slide mt-1">
                        <i class="fa fa-share"></i>
                        <span>
                            <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item p-4">
                    <div class="overflow-hidden mb-4">
                        <img class="img" style="width:250px; height:250px;" src="{{ asset('assets/images/ecs/tim/Arie Indarwanto.png')}}" alt="">
                    </div>
                    <h5 class="mb-0">Arie Indarwanto</h5>
                    <p>{{ Str::limit('Tenaga Teknis Bidang Prosedur Ekspor, Logistik dan Kepabeanan ', 150, $end='...') }}</p>
                    <div class="btn-slide mt-1">
                        <i class="fa fa-share"></i>
                        <span>
                            <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item p-4">
                    <div class="overflow-hidden mb-4">
                        <img class="img" style="width:250px; height:250px;" src="{{ asset('assets/images/ecs/tim/Aksamil Khair.png')}}" alt="">
                    </div>
                    <h5 class="mb-0">Aksamil Khair</h5>
                    <p>{{ Str::limit('Tenaga Teknis Bidang Implementasi Hasil Perjanjian Perdagangan Internasional, Inaexport dan Hubungan Antar Lembaga ', 150, $end='...') }}</p>
                    <div class="btn-slide mt-1">
                        <i class="fa fa-share"></i>
                        <span>
                            <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item p-4">
                    <div class="overflow-hidden mb-4">
                        <img class="img" style="width:250px; height:250px;" src="{{ asset('assets/images/ecs/tim/Permadani Anggi Palupi.png')}}" alt="">
                    </div>
                    <h5 class="mb-0">Permadani Anggi Palupi</h5>
                    <p>{{ Str::limit('Koordinator Tenaga Pendukung Bidang Keuangan ', 150, $end='...') }}</p>
                    <div class="btn-slide mt-1">
                        <i class="fa fa-share"></i>
                        <span>
                            <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item p-4">
                    <div class="overflow-hidden mb-4">
                        <img class="img" style="width:250px; height:250px;" src="{{ asset('assets/images/ecs/tim/Faya Valentia.png')}}" alt="">
                    </div>
                    <h5 class="mb-0">Faya Valentia Ivany</h5>
                    <p>{{ Str::limit('Tenaga Pendukung Bidang Sekretariat ', 150, $end='...') }}</p>
                    <div class="btn-slide mt-1">
                        <i class="fa fa-share"></i>
                        <span>
                            <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item p-4">
                    <div class="overflow-hidden mb-4">
                        <img class="img" style="width:250px; height:250px;" src="{{ asset('assets/images/ecs/tim/Maulidina Fahria.png')}}" alt="">
                    </div>
                    <h5 class="mb-0">Maulidina Fahria W</h5>
                    <p>{{ Str::limit('Tenaga Pendukung Bidang Kegiatan ', 150, $end='...') }}</p>
                    <div class="btn-slide mt-1">
                        <i class="fa fa-share"></i>
                        <span>
                            <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item p-4">
                    <div class="overflow-hidden mb-4">
                        <img class="img" style="width:250px; height:250px;" src="{{ asset('assets/images/ecs/tim/Layla Novia Rahmah.png')}}" alt="">
                    </div>
                    <h5 class="mb-0">Layla Novia Rahmah</h5>
                    <p>{{ Str::limit('Tenaga Pendukung Bidang Konsultasi ', 150, $end='...') }}</p>
                    <div class="btn-slide mt-1">
                        <i class="fa fa-share"></i>
                        <span>
                            <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->

@endsection
