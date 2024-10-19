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
        <h1 class="display-3 text-white mb-3 animated slideInDown">{{ session('locale') == 'id' ? 'Konsultasi Ekspor' : 'Export Consultation' }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="#">{{ session('locale') == 'id' ? 'Beranda' : 'Home' }}</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">{{ session('locale') == 'id' ? 'Halaman' : 'Page' }}</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">{{ session('locale') == 'id' ? 'Konsultasi Ekspor' : 'Export Consultation' }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Content -->
    <!-- Konsultasi Ekspor Start -->
    <div class="container-fluid overflow-hidden py-3 px-lg-0">
        <div class="container about py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('assets_users/img/konsultan_ekspor1.jpg')}}"
                            style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="text-secondary text-uppercase mb-2">Layanan Kami</h6>
                    <h1 class="mb-4">Konsultasi Ekspor</h1>
                    <p class="mb-4 text-justify">
                        Konsultasi ekspor merupakan layanan unggulan dari ECS yang dirancang khusus untuk mendukung berbagai kalangan, mulai dari pelaku usaha kecil hingga besar, masyarakat umum, hingga mahasiswa yang ingin memahami seluk-beluk proses ekspor. Dengan layanan ini, Anda akan mendapatkan panduan lengkap dan bimbingan praktis untuk menjalani langkah-langkah ekspor dengan percaya diri. ECS siap membantu Anda menjawab setiap pertanyaan dan kebutuhan Anda terkait ekspor, sehingga Anda dapat memaksimalkan potensi bisnis Anda di pasar internasional. Bergabunglah dengan kami dan jadikan perjalanan ekspor Anda lebih mudah dan sukses
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Konsultasi Ekspor End -->

    <!-- Feature Start -->
    <div id="services" class="container-fluid overflow-hidden  px-lg-0">
        <div class="container feature py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 feature-text wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase mb-3">Konsultasi Ekspor</h6>
                    <h1 class="mb-5">Aspek yang Mencakup Konsultasi Ekspor</h1>
                    <div class="d-flex gap-2 mb-4 wow fadeInUp" data-wow-delay="0.7s">
                        <i class="fa fa-paper-plane text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>Prosedur Ekspor</h5>
                            <p class="mb-0 text-justify">
                                memberikan panduan langkah demi langkah tentang bagaimana mengekspor produk, mulai dari riset pasar, pemilihan produk, hingga pengiriman. Ini termasuk penjelasan tentang cara mengisi dokumen ekspor yang diperlukan, termasuk faktur, surat jalan, dan dokumen kepabeanan.
                            </p>
                        </div>
                    </div>
                    <div class="d-flex gap-4 mb-4 wow fadeIn" data-wow-delay="0.5s">
                        <i class="fa fa-solid  fa-file-contract text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>Legalitas Perusahaan</h5>
                            <p class="mb-0 text-justify">
                                ECS membantu pelaku usaha dalam memahami aspek hukum yang terkait dengan ekspor. Ini termasuk jenis izin yang diperlukan, pendaftaran perusahaan, dan pemenuhan regulasi lokal serta internasional yang harus diikuti agar bisnis dapat beroperasi secara sah di pasar global.
                            </p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 mb-4 wow fadeInUp" data-wow-delay="0.3s">
                        <i class="fa fa-solid fa-check-circle text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>Sertifikasi Produk</h5>
                            <p class="mb-0 text-justify">
                                Produk yang diekspor sering kali memerlukan sertifikasi tertentu agar sesuai dengan standar internasional. ECS memberikan informasi tentang jenis sertifikasi yang mungkin dibutuhkan, termasuk sertifikasi kualitas, keamanan, dan standar lingkungan yang relevan dengan produk yang diekspor.
                            </p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 mb-4 wow fadeInUp" data-wow-delay="0.3s">
                        <i class="fa fa-solid fa-chart-line text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>Strategi Perluasan Pasar</h5>
                            <p class="mb-0 text-justify">
                                Konsultasi juga mencakup informasi tentang standar produk yang harus dipatuhi untuk berbagai negara tujuan. ECS membantu pelaku usaha memahami spesifikasi teknis yang diperlukan, termasuk ukuran, kemasan, dan label yang sesuai.
                            </p>
                        </div>
                    </div>
                    <div class="d-flex  mb-4 wow fadeInUp" data-wow-delay="0.3s">
                        <i class="fa fa-solid fa-money-bill-wave text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>Pembiayaan dan Sengketa</h5>
                            <p class="mb-0 text-justify">
                                Dalam situasi di mana pelaku usaha menghadapi masalah keuangan atau sengketa dengan buyer, ECS menyediakan saran dan dukungan. Mereka menghubungkan pelaku usaha dengan lembaga pembiayaan atau penyelesaian sengketa yang dapat membantu memecahkan masalah yang dihadapi.                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0 wow fadeInRight" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100"
                            src="{{ asset('assets_users/img/konsultan_ekspor.jpg')}}" style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->

<!-- Content -->

@endsection
