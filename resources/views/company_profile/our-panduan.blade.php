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
        <h1 class="display-3 text-white mb-3 animated slideInDown">{{ session('locale') == 'id' ? 'Panduan Aplikasi InaExport' : 'InaExport Application Guide' }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="#">{{ session('locale') == 'id' ? 'Beranda' : 'Home' }}</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">{{ session('locale') == 'id' ? 'Halaman' : 'Page' }}</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">{{ session('locale') == 'id' ? 'Panduan Aplikasi InaExport' : 'InaExport Application Guide' }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Content -->
    <!-- Panduan Aplikasi InaExport Start -->
    <div class="container-fluid overflow-hidden py-3 px-lg-0">
        <div class="container about py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('assets_users/img/inquiry2.jpg')}}"
                            style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="text-secondary text-uppercase mb-2">Layanan Kami</h6>
                    <h1 class="mb-4">Panduan Aplikasi InaExport</h1>
                    <p class="mb-4 text-justify">
                        Export Center Surabaya (ECS) menyediakan panduan bagi pelaku usaha untuk mendaftar di aplikasi InaExport, sebuah platform penting yang mendukung kegiatan perdagangan internasional. Dengan bantuan ECS, pelaku usaha dapat memahami cara memaksimalkan potensi aplikasi ini untuk mempromosikan produk mereka kepada calon buyer di berbagai negara. Aplikasi InaExport menjadi jembatan antara eksportir dan Perwakilan Perdagangan Indonesia di luar negeri, membuka peluang lebih besar bagi pelaku usaha untuk menerima inquiry dan menjangkau pasar global dengan lebih efektif.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Panduan Aplikasi InaExport End -->

    <!-- Fact Start -->
    <div class="container-fluid py-5 ">
        <div class="row">
            <div class="col-lg-12 fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-secondary text-uppercase mb-3">Some Facts</h6>
                <h1 class="mb-3">Terdaftar di InaExport, Buka Pintu Ekspor Lebih Lebar</h1>
                <div class = "page-ekspor p-5">
                    <p class="text-justify p-3 text-white">
                        Daftarkan perusahaan Anda di aplikasi InaExport dan perluas peluang ekspor dengan bimbingan dari tim kami. Aplikasi ini menjadi referensi utama bagi perwakilan perdagangan RI di luar negeri saat mencari produk Indonesia yang diminati buyer. Dengan panduan kami, Anda akan memahami cara bergabung dengan platform ini dan meningkatkan kesempatan untuk mendapatkan inquiry langsung dari pembeli internasional. Pastikan produk Anda terdaftar dan siap bersaing di pasar global.
                    </p>
                    <a href="{{ url('contact') }}" class="btn btn-primary py-3 px-5 ms-3 mb-4">Hubungi Kami</a>
                </div>

            </div>
        </div>
    </div>
    <!-- Fact End -->

    <!-- Feature Start -->
    <div id="services" class="container-fluid overflow-hidden  px-lg-0">
        <div class="container feature py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 feature-text wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase mb-3">Panduan Aplikasi InaExport</h6>
                    <h1 class="mb-5">Aspek yang Mencakup Panduan Aplikasi InaExport</h1>
                    <div class="d-flex mb-4 wow fadeInUp" data-wow-delay="0.7s">
                        <i class="fa fa-solid fa-user-plus text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>Pendaftaran di InaExport</h5>
                            <p class="mb-0 text-justify">
                                ECS berfungsi sebagai penghubung dengan Perwakilan Perdagangan (Perwadag) RI di luar negeri, yang secara rutin menerima permintaan dari buyer yang mencari produk tertentu. Inquiry ini sangat penting bagi eksportir, karena mereka mencerminkan minat pasar terhadap produk Indonesia.
                            </p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 mb-4 wow fadeIn" data-wow-delay="0.5s">
                        <i class="fa fa-solid fa-paper-plane text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>Distribusi Inquiry</h5>
                            <p class="mb-0 text-justify">
                                ECS membantu pelaku usaha memahami proses pendaftaran di aplikasi InaExport, yang melibatkan pengisian formulir, penyediaan dokumen yang diperlukan, dan pemahaman tentang kriteria yang harus dipenuhi.
                            </p>
                        </div>
                    </div>
                    <div class="d-flex gap-3 mb-4 wow fadeInUp" data-wow-delay="0.3s">
                        <i class="fa fa-solid fa-award text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>Manfaat Keanggotaan</h5>
                            <p class="mb-0 text-justify">
                                Dengan terdaftar di InaExport, perusahaan berpotensi menerima inquiry dari buyer internasional yang mencari produk dari Indonesia. ECS menjelaskan bagaimana keanggotaan ini dapat membuka peluang baru dan meningkatkan visibilitas perusahaan di pasar global.
                            </p>
                        </div>
                    </div>
                    <div class="d-flex gap-1 mb-4 wow fadeInUp" data-wow-delay="0.3s">
                        <i class="fa fa-solid fa-globe text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>Rujukan untuk Perwakilan Perdagangan</h5>
                            <p class="mb-0 text-justify">
                                Data dalam aplikasi InaExport digunakan oleh Perwakilan Perdagangan untuk mengidentifikasi perusahaan yang dapat memenuhi permintaan dari buyer. ECS memastikan bahwa perusahaan yang terdaftar mendapat perhatian yang layak dari Perwakilan Perdagangan.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0 wow fadeInRight" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100"
                            src="{{ asset('assets_users/img/inquiry.jpg')}}" style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->

<!-- Content -->


@endsection
