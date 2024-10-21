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
                <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">{{ session('locale') == 'id' ? 'Beranda' : 'Home' }}</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="javascript:void(0)">{{ session('locale') == 'id' ? 'Halaman' : 'Page' }}</a></li>
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
                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('assets_users/img/konsultan_ekspor1.jpg')}}" style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="text-secondary text-uppercase mb-2">{{ session('locale') == 'id' ? 'Layanan Kami' : 'Our Services' }}</h6>
                    <h1 class="mb-4">{{ session('locale') == 'id' ? 'Konsultasi Ekspor' : 'Export Consultation' }}</h1>
                    <p class="mb-4 text-justify">
                        {{ session('locale') == 'id' ? 'Konsultasi ekspor merupakan layanan unggulan dari ECS yang dirancang khusus untuk mendukung berbagai kalangan, mulai dari pelaku usaha kecil hingga besar, masyarakat umum, hingga mahasiswa yang ingin memahami seluk-beluk proses ekspor. Dengan layanan ini, Anda akan mendapatkan panduan lengkap dan bimbingan praktis untuk menjalani langkah-langkah ekspor dengan percaya diri. ECS siap membantu Anda menjawab setiap pertanyaan dan kebutuhan Anda terkait ekspor, sehingga Anda dapat memaksimalkan potensi bisnis Anda di pasar internasional. Bergabunglah dengan kami dan jadikan perjalanan ekspor Anda lebih mudah dan sukses.' : 'Export consultation is a flagship service from ECS designed to support various groups, from small to large businesses, the general public, and students seeking to understand the intricacies of the export process. With this service, you will receive comprehensive guidance and practical advice to navigate the export steps confidently. ECS is ready to assist you in answering every question and need related to exports, helping you maximize your business potential in the international market. Join us and make your export journey easier and more successful.' }}
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
                    <h6 class="text-secondary text-uppercase mb-3">{{ session('locale') == 'id' ? 'Konsultasi Ekspor' : 'Export Consultation' }}</h6>
                    <h1 class="mb-5">{{ session('locale') == 'id' ? 'Aspek yang Mencakup Konsultasi Ekspor' : 'Aspects of Export Consultation' }}</h1>
                    
                    <div class="d-flex gap-2 mb-4 wow fadeInUp" data-wow-delay="0.7s">
                        <i class="fa fa-paper-plane text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>{{ session('locale') == 'id' ? 'Prosedur Ekspor' : 'Export Procedures' }}</h5>
                            <p class="mb-0 text-justify">
                                {{ session('locale') == 'id' ? 'Memberikan panduan langkah demi langkah tentang bagaimana mengekspor produk, mulai dari riset pasar hingga pengiriman. Ini termasuk penjelasan tentang cara mengisi dokumen ekspor yang diperlukan.' : 'Provides step-by-step guidance on how to export products, from market research to shipping. This includes explanations on how to fill out necessary export documents.' }}
                            </p>
                        </div>
                    </div>
                    
                    <div class="d-flex gap-4 mb-4 wow fadeIn" data-wow-delay="0.5s">
                        <i class="fa fa-solid fa-file-contract text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>{{ session('locale') == 'id' ? 'Legalitas Perusahaan' : 'Company Legality' }}</h5>
                            <p class="mb-0 text-justify">
                                {{ session('locale') == 'id' ? 'Membantu pelaku usaha memahami aspek hukum terkait ekspor, termasuk izin yang diperlukan dan regulasi yang harus diikuti.' : 'Helps businesses understand the legal aspects related to exports, including required permits and regulations that must be followed.' }}
                            </p>
                        </div>
                    </div>

                    <div class="d-flex gap-2 mb-4 wow fadeInUp" data-wow-delay="0.3s">
                        <i class="fa fa-solid fa-check-circle text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>{{ session('locale') == 'id' ? 'Sertifikasi Produk' : 'Product Certification' }}</h5>
                            <p class="mb-0 text-justify">
                                {{ session('locale') == 'id' ? 'Memberikan informasi tentang jenis sertifikasi yang diperlukan agar produk sesuai dengan standar internasional.' : 'Provides information on the types of certifications required for products to meet international standards.' }}
                            </p>
                        </div>
                    </div>

                    <div class="d-flex gap-2 mb-4 wow fadeInUp" data-wow-delay="0.3s">
                        <i class="fa fa-solid fa-chart-line text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>{{ session('locale') == 'id' ? 'Strategi Perluasan Pasar' : 'Market Expansion Strategy' }}</h5>
                            <p class="mb-0 text-justify">
                                {{ session('locale') == 'id' ? 'Membantu pelaku usaha memahami spesifikasi teknis yang diperlukan untuk berbagai negara tujuan.' : 'Helps businesses understand the technical specifications required for various target countries.' }}
                            </p>
                        </div>
                    </div>

                    <div class="d-flex mb-4 wow fadeInUp" data-wow-delay="0.3s">
                        <i class="fa fa-solid fa-money-bill-wave text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>{{ session('locale') == 'id' ? 'Pembiayaan dan Sengketa' : 'Financing and Disputes' }}</h5>
                            <p class="mb-0 text-justify">
                                {{ session('locale') == 'id' ? 'Menyediakan saran dan dukungan untuk masalah keuangan atau sengketa dengan buyer, serta menghubungkan pelaku usaha dengan lembaga yang tepat.' : 'Provides advice and support for financial issues or disputes with buyers, connecting businesses with the right institutions.' }}
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
                <h6 class="text-secondary text-uppercase mb-3">{{ session('locale') == 'id' ? 'Beberapa Fakta' : 'Some Facts' }}</h6>
                <h1 class="mb-3">{{ session('locale') == 'id' ? 'Panduan Tepat, Sukses di Pasar Global' : 'Right Guidance, Success in Global Markets' }}</h1>
                <div class="page-ekspor p-5">
                    <p class="text-justify p-3 text-white">
                        {{ session('locale') == 'id' ? 'Konsultasi Ekspor kami memberikan panduan lengkap untuk setiap tahap proses ekspor Anda. Dengan bimbingan dari para ahli yang berpengalaman, kami membantu Anda memahami prosedur ekspor, persyaratan legalitas, sertifikasi produk, serta strategi untuk memperluas pasar ke luar negeri. Layanan ini dirancang khusus untuk bisnis dari berbagai skala, dari pemula hingga yang sudah berpengalaman, agar dapat meraih peluang sukses di pasar global.' : 'Our Export Consultation provides comprehensive guidance for every stage of your export process. With insights from experienced experts, we help you understand export procedures, legal requirements, product certifications, and strategies to expand your market overseas. This service is tailored for businesses of all sizes, from beginners to seasoned players, to seize success opportunities in global markets.' }}
                    </p>
                    <a href="{{ url('contact') }}" class="btn btn-primary py-3 px-5 ms-3 mb-4">{{ session('locale') == 'id' ? 'Hubungi Kami' : 'Contact Us' }}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact End -->

<!-- Content -->

@endsection
