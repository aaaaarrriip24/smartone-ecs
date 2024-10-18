@extends('layouts.users')
@section('content')
<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow border-top border-5 border-primary sticky-top p-0">
    <a href="{{ url('/') }}" class="navbar-brand bg-white d-flex align-items-center px-4 px-lg-5">
        <img src="{{ asset('assets/images/kemendag.png')}}" class=""
            style="background: white;width: 180px; display: inline-block;" alt="">
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    @include('layouts.navbar')
</nav>
<!-- Navbar End -->


<!-- Carousel Start -->
<div class="container-fluid p-0 pb-5">
    <div class="owl-carousel header-carousel position-relative mb-5">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{ asset('assets/images/ecs/slide_welcome/1.jpg')}}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                style="background: rgba(6, 3, 21, .0);">
            </div>
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{ asset('assets/images/ecs/slide_welcome/2.jpg')}}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                style="background: rgba(6, 3, 21, .0);">
            </div>
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{ asset('assets/images/ecs/slide_welcome/3.jpg')}}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                style="background: rgba(6, 3, 21, .0);">
            </div>
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{ asset('assets/images/ecs/slide_welcome/4.jpg')}}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                style="background: rgba(6, 3, 21, .0);">
            </div>
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{ asset('assets/images/ecs/slide_welcome/5.jpg')}}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                style="background: rgba(6, 3, 21, .0);">
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->

<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container py-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-secondary text-uppercase">Our Services</h6>
            <h1 class="mb-5">Explore Our Services</h1>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4">
                    <div class="overflow-hidden text-center mb-4">
                        <img class="img-fluid w-75"
                            src="{{ asset('assets/images/ecs/icon_layanan/Business Matching.png')}}" alt="">
                    </div>
                    <h4 class="mb-3">{{ session('locale') == 'id' ? 'Bussiness Matching' : 'Business Matching' }}</h4>
                    <p class="text-justify">Business Matching menghubungkan pelaku bisnis dengan mitra dagang potensial melalui analisis
                        kebutuhan dan acara networking, menciptakan peluang kerjasama yang saling menguntungkan.</p>
                    <a class="btn-slide mt-2" href="{{ url('our-bm') }}"><i class="fa fa-arrow-right"></i><span>Read More</span></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item p-4">
                    <div class="overflow-hidden text-center mb-4">
                        <img class="img-fluid w-75" src="{{ asset('assets/images/ecs/icon_layanan/Konsultasi.png')}}"
                            alt="">
                    </div>
                    <h4 class="mb-3">{{ session('locale') == 'id' ? 'Konsultasi Ekspor' : 'Export Consultation' }}</h4>
                    <p class="text-justify">Konsultasi Ekspor memberikan panduan lengkap tentang proses ekspor, termasuk persyaratan hukum
                        dan strategi pemasaran global, untuk membantu perusahaan memasuki pasar internasional.</p>
                    <a class="btn-slide mt-2" href="{{ url('our-konsultasi') }}"><i class="fa fa-arrow-right"></i><span>Read More</span></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item p-4">
                    <div class="overflow-hidden text-center mb-4">
                        <img class="img-fluid w-75"
                            src="{{ asset('assets/images/ecs/icon_layanan/Mediasi Kasus Dagang.png')}}" alt="">
                    </div>
                    <h4 class="mb-3">{{ session('locale') == 'id' ? 'Mediasi Kasus Dagang' : 'Trade Case Mediation' }}</h4>
                    <p class="text-justify">Mediasi Kasus Dagang menawarkan penyelesaian sengketa bisnis dengan mediator profesional,
                        membantu pihak-pihak mencapai kesepakatan tanpa jalur hukum yang panjang.</p>
                    <a class="btn-slide mt-2" href="{{ url('our-mediasi') }}"><i class="fa fa-arrow-right"></i><span>Read More</span></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4">
                    <div class="overflow-hidden text-center mb-4">
                        <img class="img-fluid w-75"
                            src="{{ asset('assets/images/ecs/icon_layanan/Pendampingan InaExport.png')}}" alt="">
                    </div>
                    <h4 class="mb-3">{{ session('locale') == 'id' ? 'Pendampingan InaExport' : 'InaExport Mentoring' }}</h4>
                    <p class="text-justify">Pendampingan InaExport mendukung perusahaan dalam memanfaatkan platform InaExport, memberikan
                        pelatihan dan strategi untuk meningkatkan visibilitas produk di pasar internasional.</p>
                    <a class="btn-slide mt-2" href="{{ url('our-panduan') }}"><i class="fa fa-arrow-right"></i><span>Read More</span></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item p-4">
                    <div class="overflow-hidden text-center mb-4">
                        <img class="img-fluid w-75"
                            src="{{ asset('assets/images/ecs/icon_layanan/Penyebaran Inquiry.png')}}" alt="">
                    </div>
                    <h4 class="mb-3">{{ session('locale') == 'id' ? 'Penyebaran Inquiry' : 'Inquiry Dissemination' }}</h4>
                    <p class="text-justify">Penyebaran Inquiry mempromosikan produk Anda kepada calon pembeli di pasar global dengan
                        mengelola dan menyebarkan permintaan informasi dari buyer kepada pelaku usaha yang relevan.</p>
                    <a class="btn-slide mt-2" href="{{ url('our-inquiries') }}"><i class="fa fa-arrow-right"></i><span>Read More</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->

<!-- Dashboard -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <div class="row">
                        <!-- Template -->
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col" style="background-color: rgb(255, 99, 132);">
                                            Perusahaan&nbsp;Terdaftar</th>
                                        <th class="text-center" scope="col" style="background-color: rgb(75, 192, 192);">
                                            Business&nbsp;Matching</th>
                                        <th class="text-center" scope="col" width="250px" style="background-color: rgb(189,156,255);">
                                            Inquiry</th>
                                        <th class="text-center" scope="col" style="background-color: rgb(255, 205, 86);">
                                            Realisasi&nbsp;Export&nbsp;(USD)</th>
                                        <th class="text-center" scope="col" style="background-color: rgb(255, 159, 64);">
                                            Jumlah&nbsp;Konsultasi</th>
                                        <th class="text-center" scope="col" style="background-color: rgb(124,194,242);">InaExport</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-end">{{ number_format($perusahaan) }}</td>
                                        <td class="text-end">
                                            {{ number_format($bm) }}/{{ number_format( $ptbm2->jumlah_perusahaan )}}</td>
                                        <td class="text-end">
                                            {{ number_format($iq) }}/{{ number_format( $ptiq2->jumlah_perusahaan )}}</td>
                                        <td class="text-end">{{ number_format($export->total) }}</td>
                                        <td class="text-end">{{ number_format($layanan) }}</td>
                                        <td class="text-end">{{ number_format( $ptina->count_perusahaan )}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <canvas id="chart_layanan_konsultasi" style="width: 900px; height: 500px"></canvas>
                        </div>
                        <!-- <div class="col-md-6">
                            <canvas id="chart_topik" style="width: 900px; height: 500px"></canvas>
                        </div> -->
                        <div class="col-md-6">
                            <table id="dt_topik" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" style="background-color: rgb(255, 99, 132);">No.
                                        </th>
                                        <th scope="col" style="background-color: rgb(255, 205, 86);">Topik Konsultasi
                                        </th>
                                        <th scope="col" style="background-color: rgb(75, 192, 192);">Data Konsultasi
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Dashboard -->

<!-- News Start -->
<div class="container-xxl py-5">
    <div class="container py-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-secondary text-uppercase">ECS News</h6>
            <h1 class="mb-5">Explore Our News</h1>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4">
                    <div class="overflow-hidden text-center mb-4">
                        <img class="img-fluid w-75"
                            src="{{ asset('assets/images/ecs/icon_layanan/Business Matching.png')}}" alt="">
                    </div>
                    <h4 class="mb-3">{{ session('locale') == 'id' ? 'Bussiness Matching' : 'Business Matching' }}</h4>
                    <p class="text-justify">Business Matching menghubungkan pelaku bisnis dengan mitra dagang potensial melalui analisis
                        kebutuhan dan acara networking, menciptakan peluang kerjasama yang saling menguntungkan.</p>
                    <a class="btn-slide mt-2" href="{{ url('our-bm') }}"><i class="fa fa-arrow-right"></i><span>Read More</span></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item p-4">
                    <div class="overflow-hidden text-center mb-4">
                        <img class="img-fluid w-75" src="{{ asset('assets/images/ecs/icon_layanan/Konsultasi.png')}}"
                            alt="">
                    </div>
                    <h4 class="mb-3">{{ session('locale') == 'id' ? 'Konsultasi Ekspor' : 'Export Consultation' }}</h4>
                    <p class="text-justify">Konsultasi Ekspor memberikan panduan lengkap tentang proses ekspor, termasuk persyaratan hukum
                        dan strategi pemasaran global, untuk membantu perusahaan memasuki pasar internasional.</p>
                    <a class="btn-slide mt-2" href="{{ url('our-konsultasi') }}"><i class="fa fa-arrow-right"></i><span>Read More</span></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item p-4">
                    <div class="overflow-hidden text-center mb-4">
                        <img class="img-fluid w-75"
                            src="{{ asset('assets/images/ecs/icon_layanan/Mediasi Kasus Dagang.png')}}" alt="">
                    </div>
                    <h4 class="mb-3">{{ session('locale') == 'id' ? 'Mediasi Kasus Dagang' : 'Trade Case Mediation' }}</h4>
                    <p class="text-justify">Mediasi Kasus Dagang menawarkan penyelesaian sengketa bisnis dengan mediator profesional,
                        membantu pihak-pihak mencapai kesepakatan tanpa jalur hukum yang panjang.</p>
                    <a class="btn-slide mt-2" href="{{ url('our-mediasi') }}"><i class="fa fa-arrow-right"></i><span>Read More</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- News End -->

<!-- About Start -->
<!-- <div class="container-fluid overflow-hidden py-5 px-lg-0">
        <div class="container about py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100"
                            src="{{ asset('assets_users/img/about.jpg')}}" style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="text-secondary text-uppercase mb-3">About Us</h6>
                    <h1 class="mb-5">Quick Transport and Logistics Solutions</h1>
                    <p class="mb-5">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et
                        eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet
                    </p>
                    <div class="row g-4 mb-5">
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                            <i class="fa fa-globe fa-3x text-primary mb-3"></i>
                            <h5>Global Coverage</h5>
                            <p class="m-0">Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem diam justo.
                            </p>
                        </div>
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.7s">
                            <i class="fa fa-shipping-fast fa-3x text-primary mb-3"></i>
                            <h5>On Time Delivery</h5>
                            <p class="m-0">Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem diam justo.
                            </p>
                        </div>
                    </div>
                    <a href="" class="btn btn-primary py-3 px-5">Explore More</a>
                </div>
            </div>
        </div>
    </div> -->
<!-- About End -->


<!-- Fact Start -->
<!-- <div class="container-xxl py-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-secondary text-uppercase mb-3">Some Facts</h6>
                <h1 class="mb-5">#1 Place To Manage All Of Your Shipments</h1>
                <p class="mb-5">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et
                    eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet
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
</div> -->
<!-- Fact End -->

<!-- Feature Start -->
<!-- <div class="container-fluid overflow-hidden py-5 px-lg-0">
    <div class="container feature py-5 px-lg-0">
        <div class="row g-5 mx-lg-0">
            <div class="col-lg-6 feature-text wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-secondary text-uppercase mb-3">Our Features</h6>
                <h1 class="mb-5">We Are Trusted Logistics Company Since 1990</h1>
                <div class="d-flex mb-5 wow fadeInUp" data-wow-delay="0.3s">
                    <i class="fa fa-globe text-primary fa-3x flex-shrink-0"></i>
                    <div class="ms-4">
                        <h5>Worldwide Service</h5>
                        <p class="mb-0">Diam dolor ipsum sit amet eos erat ipsum lorem sed stet lorem sit clita duo
                            justo magna erat amet</p>
                    </div>
                </div>
                <div class="d-flex mb-5 wow fadeIn" data-wow-delay="0.5s">
                    <i class="fa fa-shipping-fast text-primary fa-3x flex-shrink-0"></i>
                    <div class="ms-4">
                        <h5>On Time Delivery</h5>
                        <p class="mb-0">Diam dolor ipsum sit amet eos erat ipsum lorem sed stet lorem sit clita duo
                            justo magna erat amet</p>
                    </div>
                </div>
                <div class="d-flex mb-0 wow fadeInUp" data-wow-delay="0.7s">
                    <i class="fa fa-headphones text-primary fa-3x flex-shrink-0"></i>
                    <div class="ms-4">
                        <h5>24/7 Telephone Support</h5>
                        <p class="mb-0">Diam dolor ipsum sit amet eos erat ipsum lorem sed stet lorem sit clita duo
                            justo magna erat amet</p>
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
</div> -->
<!-- Feature End -->


<!-- Pricing Start -->
<!-- <div class="container-xxl py-5">
        <div class="container py-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-secondary text-uppercase">Pricing Plan</h6>
                <h1 class="mb-5">Perfect Pricing Plan</h1>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="price-item">
                        <div class="border-bottom p-4 mb-4">
                            <h5 class="text-primary mb-1">Basic Plan</h5>
                            <h1 class="display-5 mb-0">
                                <small class="align-top"
                                    style="font-size: 22px; line-height: 45px;">$</small>49.00<small
                                    class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Month</small>
                            </h1>
                        </div>
                        <div class="p-4 pt-0">
                            <p><i class="fa fa-check text-success me-3"></i>HTML5 & CSS3</p>
                            <p><i class="fa fa-check text-success me-3"></i>Bootstrap v5</p>
                            <p><i class="fa fa-check text-success me-3"></i>FontAwesome Icons</p>
                            <p><i class="fa fa-check text-success me-3"></i>Responsive Layout</p>
                            <p><i class="fa fa-check text-success me-3"></i>Cross-browser Support</p>
                            <a class="btn-slide mt-2" href=""><i class="fa fa-arrow-right"></i><span>Order
                                    Now</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="price-item">
                        <div class="border-bottom p-4 mb-4">
                            <h5 class="text-primary mb-1">Standard Plan</h5>
                            <h1 class="display-5 mb-0">
                                <small class="align-top"
                                    style="font-size: 22px; line-height: 45px;">$</small>99.00<small
                                    class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Month</small>
                            </h1>
                        </div>
                        <div class="p-4 pt-0">
                            <p><i class="fa fa-check text-success me-3"></i>HTML5 & CSS3</p>
                            <p><i class="fa fa-check text-success me-3"></i>Bootstrap v5</p>
                            <p><i class="fa fa-check text-success me-3"></i>FontAwesome Icons</p>
                            <p><i class="fa fa-check text-success me-3"></i>Responsive Layout</p>
                            <p><i class="fa fa-check text-success me-3"></i>Cross-browser Support</p>
                            <a class="btn-slide mt-2" href=""><i class="fa fa-arrow-right"></i><span>Order
                                    Now</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="price-item">
                        <div class="border-bottom p-4 mb-4">
                            <h5 class="text-primary mb-1">Advanced Plan</h5>
                            <h1 class="display-5 mb-0">
                                <small class="align-top"
                                    style="font-size: 22px; line-height: 45px;">$</small>149.00<small
                                    class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Month</small>
                            </h1>
                        </div>
                        <div class="p-4 pt-0">
                            <p><i class="fa fa-check text-success me-3"></i>HTML5 & CSS3</p>
                            <p><i class="fa fa-check text-success me-3"></i>Bootstrap v5</p>
                            <p><i class="fa fa-check text-success me-3"></i>FontAwesome Icons</p>
                            <p><i class="fa fa-check text-success me-3"></i>Responsive Layout</p>
                            <p><i class="fa fa-check text-success me-3"></i>Cross-browser Support</p>
                            <a class="btn-slide mt-2" href=""><i class="fa fa-arrow-right"></i><span>Order
                                    Now</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
<!-- Pricing End -->


<!-- Quote Start -->
<!-- <div class="container-xxl py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-secondary text-uppercase mb-3">Get A Quote</h6>
                <h1 class="mb-5">Request A Free Qoute!</h1>
                <p class="mb-5">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et
                    eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo erat amet</p>
                <div class="d-flex align-items-center">
                    <i class="fa fa-headphones fa-2x flex-shrink-0 bg-primary p-3 text-white"></i>
                    <div class="ps-4">
                        <h6>Call for any query!</h6>
                        <h3 class="text-primary m-0">+012 345 6789</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="bg-light text-center p-5 wow fadeIn" data-wow-delay="0.5s">
                    <form>
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control border-0" placeholder="Your Name"
                                    style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" class="form-control border-0" placeholder="Your Email"
                                    style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control border-0" placeholder="Your Mobile"
                                    style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <select class="form-select border-0" style="height: 55px;">
                                    <option selected>Select A Freight</option>
                                    <option value="1">Freight 1</option>
                                    <option value="2">Freight 2</option>
                                    <option value="3">Freight 3</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control border-0" placeholder="Special Note"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Quote End -->


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
                        <img class="img" style="width:250px; height:250px;" src="{{ asset('assets/images/ecs/tim/Toto-Dirgantoro.png')}}" alt="">
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


<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="text-center">
            <h1 class="mb-0">Our Partner</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="p-4 my-5">
                <div class="d-flex align-items-center mt-5">
                    <img class="img-fluid rounded mx-auto d-block" src="{{ asset('assets_users/partner/kemendag.svg')}}"
                        style="width: 250px; height: auto;">
                </div>
            </div>
            <div class="p-4 my-5">
                <div class="d-flex align-items-center">
                    <img class="img-fluid rounded mx-auto d-block"
                        src="{{ asset('assets_users/partner/disperindag.png')}}" style="width: 150px; height: auto;">
                </div>
            </div>
            <div class="p-4 my-5">
                <div class="d-flex align-items-center mt-5">
                    <img class="img-fluid rounded mx-auto d-block"
                        src="{{ asset('assets_users/partner/inaexport.png')}}" style="width: 250px; height: auto;">
                </div>
            </div>
            <div class="p-4 my-5">
                <div class="d-flex align-items-center">
                    <img class="img-fluid rounded mx-auto d-block" src="{{ asset('assets_users/partner/gpei.png')}}"
                        style="width: 250px; height: auto;">
                </div>
            </div>
            <div class="p-4 my-5">
                <div class="d-flex align-items-center">
                    <img class="img-fluid rounded mx-auto d-block" src="{{ asset('assets_users/partner/LPEI.jpg')}}"
                        style="width: 250px; height: auto;">
                </div>
            </div>
            <div class="p-4 my-5">
                <div class="d-flex align-items-center">
                    <img class="img-fluid  rounded mx-auto d-block" src="{{ asset('assets_users/partner/BPOM.png')}}"
                        style="width: 150px; height: auto;">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->
@endsection
@section('js')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
    var barLayanan = document.getElementById("chart_layanan_konsultasi").getContext('2d');
    $.get(base_url + "section2", function (result, status) {
        const labels = result.label
        const data = {
            labels: labels,
            datasets: [{
                label: 'Data Layanan Konsultasi ECS',
                data: result.data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };
        console.log(data);

        var myChart = new Chart(barLayanan, {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },

        });
    });

</script>
<script type="text/javascript">
    var barTopik = document.getElementById("chart_topik").getContext('2d');
    $.get(base_url + "section3", function (result, status) {
        const labels = result.label
        const data = {
            labels: labels,
            datasets: [{
                label: 'Data Topik Layanan',
                data: result.data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };
        console.log(data);

        var myChart = new Chart(barTopik, {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },

        });
    });

</script>
<script>
    let table;
    $(document).ready(function () {
        table = $('#dt_topik').DataTable({
            autoWidth: false,
            responsive: false,
            scrollCollapse: true,
            processing: true,
            serverSide: true,
            displayLength: 5,
            paginate: true,
            lengthChange: true,
            filter: true,
            sort: true,
            info: true,
            searching: false,
            ajax: base_url + "data_topik",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    className: 'text-center',
                    width: '5%'
                },
                {
                    data: 'nama_topik',
                    name: 'nama_topik',
                    orderable: true,
                },
                {
                    data: 'total',
                    name: 'total',
                    className: 'text-end',
                    orderable: false,
                    searchable: false,
                    width: '25%'
                },
            ]
        });

        $(".dt-length").addClass("d-none");
    });

</script>
@endsection
