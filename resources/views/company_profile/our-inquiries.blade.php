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
        <h1 class="display-3 text-white mb-3 animated slideInDown">{{ GoogleTranslate::trans("Penyebaran Inquiry", app()->getLocale()) }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">{{ GoogleTranslate::trans("Beranda", app()->getLocale()) }}</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="javascript:void(0)">{{ GoogleTranslate::trans("Halaman", app()->getLocale()) }}</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">{{ GoogleTranslate::trans("Penyebaran Inquiry", app()->getLocale()) }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Content -->
    <!-- Inquiry Distribution Start -->
    <div class="container-fluid overflow-hidden px-lg-0">
        <div class="container about py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('assets_users/img/inquiry2.jpg') }}"
                            style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="text-secondary text-uppercase mb-2">{{ GoogleTranslate::trans("Layanan Kami", app()->getLocale()) }}</h6>
                    <h1 class="mb-4">{{ GoogleTranslate::trans("Penyebaran Inquiry", app()->getLocale()) }}</h1>
                    <p class="mb-4 text-justify">
                        {{ GoogleTranslate::trans("Penyebaran inquiry merupakan proses penting yang berfungsi untuk menjembatani komunikasi antara eksportir dan buyer internasional. Melalui penyebaran ini, eksportir dapat menerima informasi terkait permintaan produk dari buyer di luar negeri, yang pada gilirannya membuka peluang untuk menjalin kerjasama dan transaksi perdagangan. Proses ini tidak hanya meningkatkan keterhubungan antara kedua belah pihak, tetapi juga memastikan bahwa eksporter mendapatkan akses ke potensi pasar yang lebih luas, sehingga dapat memperluas jaringan bisnis dan meningkatkan kesempatan untuk sukses di pasar global.", app()->getLocale()) }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Inquiry Distribution End -->

    <!-- Feature Start -->
    <div id="services" class="container-fluid overflow-hidden px-lg-0">
        <div class="container feature py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 feature-text wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase mb-3">{{ GoogleTranslate::trans("Penyebaran Inquiry", app()->getLocale()) }}</h6>
                    <h1 class="mb-5">{{ GoogleTranslate::trans("Aspek yang Mencakup Penyebaran Inquiry", app()->getLocale()) }}</h1>

                    <div class="d-flex gap-2 mb-4 wow fadeInUp" data-wow-delay="0.7s">
                        <i class="fa fa-solid fa-paper-plane text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>{{ GoogleTranslate::trans("Pengumpulan Inquiry", app()->getLocale()) }}</h5>
                            <p class="mb-0 text-justify">
                                {{ GoogleTranslate::trans("ECS berfungsi sebagai penghubung dengan Perwakilan Perdagangan (Perwadag) RI di luar negeri, yang secara rutin menerima permintaan dari buyer yang mencari produk tertentu. Inquiry ini sangat penting bagi eksportir, karena mereka mencerminkan minat pasar terhadap produk Indonesia.", app()->getLocale()) }}
                            </p>
                        </div>
                    </div>

                    <div class="d-flex gap-3 mb-4 wow fadeIn" data-wow-delay="0.5s">
                        <i class="fa fa-solid fa-share-alt text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>{{ GoogleTranslate::trans("Distribusi Inquiry", app()->getLocale()) }}</h5>
                            <p class="mb-0 text-justify">
                                {{ GoogleTranslate::trans("Setelah inquiry diterima, ECS mendistribusikan informasi tersebut kepada perusahaan yang dapat memenuhi permintaan. ECS menggunakan database perusahaan yang ada untuk memastikan bahwa inquiry disampaikan kepada eksportir yang tepat, sehingga meningkatkan peluang terjadinya transaksi.", app()->getLocale()) }}
                            </p>
                        </div>
                    </div>

                    <div class="d-flex gap-2 mb-4 wow fadeInUp" data-wow-delay="0.3s">
                        <i class="fa fa-solid fa-comments text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>{{ GoogleTranslate::trans("Proses Respon", app()->getLocale()) }}</h5>
                            <p class="mb-0 text-justify">
                                {{ GoogleTranslate::trans("ECS membantu perusahaan untuk memahami cara yang efektif dalam merespon inquiry. Ini termasuk memberikan panduan tentang penyusunan proposal yang menarik dan persiapan untuk negosiasi yang mungkin terjadi setelah inquiry direspon.", app()->getLocale()) }}
                            </p>
                        </div>
                    </div>

                    <div class="d-flex gap-1 mb-4 wow fadeInUp" data-wow-delay="0.3s">
                        <i class="fa fa-solid fa-handshake text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>{{ GoogleTranslate::trans("Potensi Transaksi", app()->getLocale()) }}</h5>
                            <p class="mb-0 text-justify">
                                {{ GoogleTranslate::trans("Setelah inquiry direspon dengan baik, ECS berusaha untuk mengubahnya menjadi transaksi dagang. Ini mencakup penyiapan semua dokumen yang diperlukan dan memastikan bahwa produk dapat dikirim sesuai dengan kesepakatan yang dibuat.", app()->getLocale()) }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0 wow fadeInRight" data-wow-delay="0.1s" style="min-height: 400px;">
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
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12 fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-secondary text-uppercase mb-3">{{ GoogleTranslate::trans("Beberapa Fakta", app()->getLocale()) }}</h6>
                <h1 class="mb-3">{{ GoogleTranslate::trans("Jawab Peluang, Raih Kesempatan Emas", app()->getLocale()) }}</h1>
                <div class="page-ekspor p-5">
                    <p class="text-justify p-3 text-white">
                        {{ GoogleTranslate::trans("Jangan lewatkan peluang bisnis internasional dengan layanan penyebaran inquiry kami. Inquiry dari buyer luar negeri adalah kunci untuk membuka potensi transaksi dagang baru. Kami bekerja sama dengan perwakilan perdagangan Indonesia di luar negeri, seperti Atase Perdagangan dan ITPC, untuk menyebarkan permintaan yang kami terima langsung kepada perusahaan yang sesuai. Respon yang cepat dan tepat bisa menjadi pintu masuk bagi perusahaan Anda menuju transaksi yang sukses.", app()->getLocale()) }}
                    </p>
                    <a href="{{ url('contact') }}" class="btn btn-primary py-3 px-5 ms-3 mb-4">{{ GoogleTranslate::trans("Hubungi Kami", app()->getLocale()) }}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact End -->
<!-- Content -->


@endsection
