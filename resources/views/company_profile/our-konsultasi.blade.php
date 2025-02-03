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
        <h1 class="display-3 text-white mb-3 animated slideInDown">{{ __("Konsultasi Ekspor") }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">{{ __("Beranda") }}</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="javascript:void(0)">{{ __("Halaman") }}</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">{{ __("Konsultasi Ekspor") }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Content -->
    <!-- Konsultasi Ekspor Start -->
    <div class="container-fluid overflow-hidden px-lg-0">
        <div class="container about py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('assets_users/img/konsultan_ekspor1.jpg')}}" style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="text-secondary text-uppercase mb-2">{{ __("Layanan Kami") }}</h6>
                    <h1 class="mb-4">{{ __("Konsultasi Ekspor") }}</h1>
                    <p class="mb-4 text-justify">
                        {{ __("Konsultasi ekspor merupakan layanan unggulan dari ECS yang dirancang khusus untuk mendukung berbagai kalangan, mulai dari pelaku usaha kecil hingga besar, masyarakat umum, hingga mahasiswa yang ingin memahami seluk-beluk proses ekspor. Dengan layanan ini, Anda akan mendapatkan panduan lengkap dan bimbingan praktis untuk menjalani langkah-langkah ekspor dengan percaya diri. ECS siap membantu Anda menjawab setiap pertanyaan dan kebutuhan Anda terkait ekspor, sehingga Anda dapat memaksimalkan potensi bisnis Anda di pasar internasional. Bergabunglah dengan kami dan jadikan perjalanan ekspor Anda lebih mudah dan sukses.") }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Konsultasi Ekspor End -->

    <!-- Feature Start -->
    <div id="services" class="container-fluid overflow-hidden px-lg-0">
        <div class="container feature py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 feature-text wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase mb-3">{{ __("Konsultasi Ekspor") }}</h6>
                    <h1 class="mb-5">{{ __("Aspek yang Mencakup Konsultasi Ekspor") }}</h1>

                    <div class="d-flex gap-2 mb-4 wow fadeInUp" data-wow-delay="0.7s">
                        <i class="fa fa-paper-plane text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>{{ __("Prosedur Ekspor") }}</h5>
                            <p class="mb-0 text-justify">
                                {{ __("Memberikan panduan langkah demi langkah tentang bagaimana mengekspor produk, mulai dari riset pasar hingga pengiriman. Ini termasuk penjelasan tentang cara mengisi dokumen ekspor yang diperlukan.") }}
                            </p>
                        </div>
                    </div>

                    <div class="d-flex gap-4 mb-4 wow fadeIn" data-wow-delay="0.5s">
                        <i class="fa fa-solid fa-file-contract text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>{{ __("Legalitas Perusahaan") }}</h5>
                            <p class="mb-0 text-justify">
                                {{ __("Membantu pelaku usaha memahami aspek hukum terkait ekspor, termasuk izin yang diperlukan dan regulasi yang harus diikuti.") }}
                            </p>
                        </div>
                    </div>

                    <div class="d-flex gap-2 mb-4 wow fadeInUp" data-wow-delay="0.3s">
                        <i class="fa fa-solid fa-check-circle text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>{{ __("Sertifikasi Produk") }}</h5>
                            <p class="mb-0 text-justify">
                                {{ __("Memberikan informasi tentang jenis sertifikasi yang diperlukan agar produk sesuai dengan standar internasional.") }}
                            </p>
                        </div>
                    </div>

                    <div class="d-flex gap-2 mb-4 wow fadeInUp" data-wow-delay="0.3s">
                        <i class="fa fa-solid fa-chart-line text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>{{ __("Strategi Perluasan Pasar") }}</h5>
                            <p class="mb-0 text-justify">
                                {{ __("Membantu pelaku usaha memahami spesifikasi teknis yang diperlukan untuk berbagai negara tujuan.") }}
                            </p>
                        </div>
                    </div>

                    <div class="d-flex mb-4 wow fadeInUp" data-wow-delay="0.3s">
                        <i class="fa fa-solid fa-money-bill-wave text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>{{ __("Pembiayaan dan Sengketa") }}</h5>
                            <p class="mb-0 text-justify">
                                {{ __("Menyediakan saran dan dukungan untuk masalah keuangan atau sengketa dengan buyer, serta menghubungkan pelaku usaha dengan lembaga yang tepat.") }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 pe-lg-0 wow fadeInRight" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('assets_users/img/konsultan_ekspor.jpg') }}" style="object-fit: cover;" alt="">
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
                <h1 class="mb-3">{{ __("Panduan Tepat, Sukses di Pasar Global") }}</h1>
                <div class="page-ekspor p-5">
                    <p class="text-justify p-3 text-white">
                        {{ __("Konsultasi Ekspor kami memberikan panduan lengkap untuk setiap tahap proses ekspor Anda. Dengan bimbingan dari para ahli yang berpengalaman, kami membantu Anda memahami prosedur ekspor, persyaratan legalitas, sertifikasi produk, serta strategi untuk memperluas pasar ke luar negeri. Layanan ini dirancang khusus untuk bisnis dari berbagai skala, dari pemula hingga yang sudah berpengalaman, agar dapat meraih peluang sukses di pasar global.") }}
                    </p>
                    <a href="{{ url('contact') }}" class="btn btn-primary py-3 px-5 ms-3 mb-4">{{ __("Hubungi Kami") }}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact End -->

<!-- Content -->

@endsection
