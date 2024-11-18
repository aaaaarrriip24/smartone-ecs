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
        <h1 class="display-3 text-white mb-3 animated slideInDown">{{ GoogleTranslate::trans("Pasar", app()->getLocale()) }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">{{ GoogleTranslate::trans("Beranda", app()->getLocale()) }}</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="javascript:void(0)">{{ GoogleTranslate::trans("Halaman", app()->getLocale()) }}</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">{{ GoogleTranslate::trans("Pasar", app()->getLocale()) }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Content -->
    <!-- Our Market Start -->
    <div class="container-fluid overflow-hidden px-lg-0">
        <div class="container about px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('assets_users/img/market1.jpg') }}"
                            style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="text-secondary text-uppercase mb-2">{{ GoogleTranslate::trans("Mitra", app()->getLocale()) }}</h6>
                    <h1 class="mb-4">{{ GoogleTranslate::trans("Pasar Kami", app()->getLocale()) }}</h1>
                    <p class="mb-4 text-justify">
                        {{ GoogleTranslate::trans("ECS berperan sebagai jembatan yang menghubungkan pelaku usaha dengan pasar internasional, memberikan dukungan yang komprehensif dalam memahami dinamika pasar, persyaratan ekspor, serta strategi untuk memasuki pasar yang paling sesuai dengan produk mereka.", app()->getLocale()) }}
                    </p>
                    <a href="#market" class="btn btn-primary py-3 px-5">{{ GoogleTranslate::trans("Jelajahi Selengkapnya", app()->getLocale()) }}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Market End -->


    <!-- Feature Start -->
    <div id="market" class="container-fluid overflow-hidden px-lg-0">
        <div class="container feature py-5 mt-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 feature-text wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="mb-5">{{ GoogleTranslate::trans("Pasar Kami", app()->getLocale()) }}</h1>
                    <p class="text-justify mb-5">
                        {{ GoogleTranslate::trans("Export Center Surabaya (ECS) dapat menawarkan berbagai peluang pasar yang menarik kepada calon klien, antara lain:", app()->getLocale()) }}
                    </p>

                    <div class="d-flex gap-2 mb-4 wow fadeInUp" data-wow-delay="0.3s">
                        <i class="fa fa-solid fa-globe-asia text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>{{ GoogleTranslate::trans("Pasar Negara Berkembang", app()->getLocale()) }}</h5>
                            <p class="mb-0 text-justify">
                                {{ GoogleTranslate::trans("ECS bisa membantu calon klien dalam mengakses pasar di negara-negara berkembang seperti Asia Tenggara, Afrika, dan Amerika Latin. Pasar-pasar ini sedang mengalami pertumbuhan permintaan yang pesat untuk produk-produk berkualitas dari Indonesia.", app()->getLocale()) }}
                            </p>
                        </div>
                    </div>
                    <div class="d-flex gap-4 mb-4 wow fadeIn" data-wow-delay="0.5s">
                        <i class="fa fa-solid fa-euro-sign text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>{{ GoogleTranslate::trans("Pasar Eropa dan Amerika Utara", app()->getLocale()) }}</h5>
                            <p class="mb-0 text-justify">
                                {{ GoogleTranslate::trans("ECS dapat membuka akses ke pasar premium di Eropa dan Amerika Utara, di mana produk dengan nilai tambah tinggi seperti makanan organik, kerajinan tangan, dan tekstil khas Indonesia memiliki potensi besar. Layanan ECS membantu dalam memenuhi standar sertifikasi dan regulasi yang ketat.", app()->getLocale()) }}
                            </p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 mb-4 wow fadeInUp" data-wow-delay="0.7s">
                        <i class="fa fa-solid fa-leaf text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>{{ GoogleTranslate::trans("Pasar Produk yang Spesifik", app()->getLocale()) }}</h5>
                            <p class="mb-0 text-justify">
                                {{ GoogleTranslate::trans("Bagi pelaku usaha dengan produk-produk spesifik, seperti produk ramah lingkungan atau fashion berbahan dasar alami, ECS dapat membantu menemukan buyer yang fokus pada produk-produk unik dan inovatif di pasar internasional.", app()->getLocale()) }}
                            </p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 mb-4 wow fadeInUp" data-wow-delay="0.9s">
                        <i class="fa fa-solid fa-mosque text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>{{ GoogleTranslate::trans("Pasar Timur Tengah", app()->getLocale()) }}</h5>
                            <p class="mb-0 text-justify">
                                {{ GoogleTranslate::trans("Dengan koneksi ke Perwakilan Perdagangan Indonesia di Timur Tengah, ECS dapat memfasilitasi ekspor produk-produk seperti makanan halal, rempah-rempah, dan produk agrikultur yang sangat diminati di kawasan ini.", app()->getLocale()) }}
                            </p>
                        </div>
                    </div>
                    <div class="d-flex mb-4 wow fadeInUp" data-wow-delay="0.11s">
                        <i class="fa fa-solid fa-laptop text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>{{ GoogleTranslate::trans("Pasar Digital Global' : 'Global Digital Markets' }}</h5>
                            <p class="mb-0 text-justify">
                                {{ GoogleTranslate::trans("Dengan semakin berkembangnya e-commerce lintas negara, ECS dapat membantu klien memasuki pasar digital internasional melalui platform perdagangan online, seperti Tokopedia atau Alibaba, sehingga produk mereka dapat diakses oleh pembeli di seluruh dunia.", app()->getLocale()) }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0 wow fadeInRight" data-wow-delay="0.13s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100"
                            src="{{ asset('assets_users/img/inquiry.jpg') }}" style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->


    <!-- Fact Start -->
    <div class="container py-5 ">
        <div class="row">
            <div class="col-lg-12 fadeInUp" data-wow-delay="0.15s">
                <h6 class="text-secondary text-uppercase mb-3">{{ GoogleTranslate::trans("Beberapa Fakta", app()->getLocale()) }}</h6>
                <h3 class="mb-3">
                    {{ GoogleTranslate::trans("Bawa Produk Lokal ke Pasar Global: Eropa, Timur Tengah, dan Pasar Digital, Kami Siap Membuka Peluang Baru.", app()->getLocale()) }}
                </h3>
                <div class="page-ekspor p-5">
                    <p class="text-justify p-3 text-white">
                        {{ GoogleTranslate::trans("Export Center Surabaya memiliki peran penting dalam membantu pelaku usaha Indonesia, terutama dari Jawa Timur dan sekitarnya, untuk memasuki pasar internasional. Oleh karena itu, pasar yang cocok untuk Export Center Surabaya mencakup beberapa segmen spesifik yang bisa mendapatkan manfaat besar dari layanan dan panduan ekspor yang ditawarkan.", app()->getLocale()) }}
                    </p>
                    <a href="{{ url('contact') }}" class="btn btn-primary py-3 px-5 ms-3 mb-4">{{ GoogleTranslate::trans("Hubungi Kami", app()->getLocale()) }}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact End -->


<!-- Content -->


@endsection
