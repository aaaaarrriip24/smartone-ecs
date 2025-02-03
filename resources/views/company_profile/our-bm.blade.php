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
        <h1 class="display-3 text-white mb-3 animated slideInDown">{{ __("Bussiness Matching") }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">{{ __("Beranda") }}</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="javascript:void(0)">{{ __("Halaman") }}</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">{{ __("Bussiness Matching") }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Content -->
    <!-- Business Matching Start -->
    <div class="container-fluid overflow-hidden px-lg-0">
        <div class="container about py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('assets_users/img/bm2.jpg')}}"
                            style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="text-secondary text-uppercase mb-2">{{ __("Layanan Kami") }}</h6>
                    <h1 class="mb-4">{{ __("Business Matching'") }}</h1>
                    <p class="mb-4 text-justify">
                        {{ __("Layanan Business Matching merupakan proses penting yang membantu membangun hubungan bisnis yang saling menguntungkan antara eksportir dan calon buyer. Melalui layanan ini, Export Center Surabaya memfasilitasi pertemuan langsung atau virtual antara pelaku usaha dengan pembeli potensial dari luar negeri, serta perwakilan perdagangan Indonesia di berbagai negara. Dengan pendekatan ini, pelaku usaha dapat menemukan mitra bisnis yang tepat, memperluas jaringan pasar, dan meningkatkan peluang terjadinya transaksi ekspor. Business Matching menjadi langkah strategis untuk mempercepat proses negosiasi dan mencapai kesepakatan dagang yang menguntungkan kedua belah pihak.") }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Business Matching End -->

    <!-- Feature Start -->
    <div id="services" class="container-fluid overflow-hidden px-lg-0">
        <div class="container feature py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 feature-text wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase mb-3">{{ __("Business Matching'") }}</h6>
                    <h1 class="mb-5">{{ __("Aspek yang Mencakup Business Matching") }}</h1>

                    <div class="d-flex mb-4 wow fadeInUp" data-wow-delay="0.7s">
                        <i class="fa fa-solid fa-handshake text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>{{ __("Fasilitasi Pertemuan") }}</h5>
                            <p class="mb-0 text-justify">
                                {{ __("ECS mengorganisir pertemuan antara eksportir dan buyer untuk mendiskusikan produk dan kebutuhan mereka secara langsung. Pertemuan ini bisa dilakukan secara fisik maupun virtual, tergantung pada situasi dan lokasi pihak-pihak yang terlibat.") }}
                            </p>
                        </div>
                    </div>

                    <div class="d-flex gap-1 mb-4 wow fadeIn" data-wow-delay="0.5s">
                        <i class="fa fa-solid fa-comments text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>{{ __("Negosiasi") }}</h5>
                            <p class="mb-0 text-justify">
                                {{ __("Dalam pertemuan BM, pihak-pihak yang terlibat dapat membahas rincian transaksi, termasuk harga, kuantitas, waktu pengiriman, dan syarat pembayaran. ECS berperan sebagai fasilitator untuk membantu kedua belah pihak mencapai kesepakatan yang saling menguntungkan.") }}
                            </p>
                        </div>
                    </div>

                    <div class="d-flex gap-2 mb-4 wow fadeInUp" data-wow-delay="0.3s">
                        <i class="fa fa-solid fa-shield-alt text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>{{ __("Membangun Kepercayaan") }}</h5>
                            <p class="mb-0 text-justify">
                                {{ __("Proses BM juga bertujuan untuk membangun hubungan yang kuat antara eksportir dan buyer. Kepercayaan adalah kunci dalam transaksi internasional, dan ECS membantu menciptakan lingkungan yang mendukung dialog terbuka dan kolaborasi.") }}
                            </p>
                        </div>
                    </div>

                    <div class="d-flex gap-1 mb-4 wow fadeInUp" data-wow-delay="0.3s">
                        <i class="fa fa-solid fa-file-signature text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>{{ __("Kesepakatan Formal") }}</h5>
                            <p class="mb-0 text-justify">
                                {{ __("Jika semua pihak setuju, kesepakatan formal atau kontrak dapat ditandatangani. ECS dapat membantu dalam menyusun dokumen kontrak dan memastikan bahwa semua persyaratan telah dipahami oleh kedua belah pihak.") }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 pe-lg-0 wow fadeInRight" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100"
                            src="{{ asset('assets_users/img/bm1.jpg')}}" style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->

    <!-- Fact Start -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12 fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-secondary text-uppercase mb-3">{{ __("Beberapa Fakta") }}</h6>
                <h1 class="mb-3">{{ __("Temukan Mitra Tepat, Tingkatkan Penjualan") }}</h1>
                <div class="page-ekspor p-5">
                    <p class="text-justify p-3 text-white">
                        {{ __("Dapatkan akses ke buyer internasional dengan layanan Business Matching dari kami. Kami memfasilitasi pertemuan langsung antara eksportir dan pembeli potensial di luar negeri, membantu Anda menemukan mitra dagang yang tepat. Proses ini membantu menciptakan hubungan yang saling menguntungkan, membangun kepercayaan, dan membuka jalan menuju kontrak penjualan yang solid. Bersama kami, perluas jangkauan bisnis Anda ke pasar global.") }}
                    </p>
                    <a href="{{ url('contact') }}" class="btn btn-primary py-3 px-5 ms-3 mb-4">{{ __("Hubungi Kami") }}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact End -->

<!-- Content -->


@endsection
