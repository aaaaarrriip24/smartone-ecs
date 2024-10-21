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
        <h1 class="display-3 text-white mb-3 animated slideInDown">{{ session('locale') == 'id' ? 'Layanan Lainnya' : 'Other Services' }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">{{ session('locale') == 'id' ? 'Beranda' : 'Home' }}</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="javascript:void(0)">{{ session('locale') == 'id' ? 'Halaman' : 'Page' }}</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">{{ session('locale') == 'id' ? 'Layanan Lainnya' : 'Other Services' }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Content -->
    <!-- Layanan Lainnya Start -->
    <div class="container-fluid overflow-hidden py-3 px-lg-0">
        <div class="container about py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('assets_users/img/other2.jpg')}}"
                            style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="mb-4">{{ session('locale') == 'id' ? 'Layanan Lainnya' : 'Other Services' }}</h1>
                    <p class="mb-4 text-justify">
                        {{ session('locale') == 'id' ? 'ECS juga menawarkan berbagai layanan tambahan untuk membantu pelaku usaha dalam menghadapi situasi sulit. Layanan ini mencakup dukungan dalam menangani sengketa dengan buyer, memfasilitasi pertemuan dengan perwakilan perdagangan, hingga memberikan solusi atas masalah yang muncul selama proses ekspor. Dengan pendekatan yang proaktif dan dukungan dari tim ahli, ECS berkomitmen untuk menjadi mitra yang dapat diandalkan oleh pelaku usaha, membantu mereka mengatasi hambatan dan mencapai keberhasilan di pasar internasional.' : 'ECS also offers various additional services to assist entrepreneurs in facing challenging situations. These services include support in handling disputes with buyers, facilitating meetings with trade representatives, and providing solutions to problems that arise during the export process. With a proactive approach and support from a team of experts, ECS is committed to being a reliable partner for entrepreneurs, helping them overcome obstacles and achieve success in the international market.' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Layanan Lainnya End -->

    <!-- Feature Start -->
    <div id="services" class="container-fluid overflow-hidden px-lg-0">
        <div class="container feature py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 feature-text wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase mb-3">{{ session('locale') == 'id' ? 'Layanan Lainnya' : 'Other Services' }}</h6>
                    <h1 class="mb-5">{{ session('locale') == 'id' ? 'Aspek yang Mencakup Layanan Lainnya' : 'Aspects Covering Other Services' }}</h1>
                    
                    <div class="d-flex mb-4 wow fadeInUp" data-wow-delay="0.7s">
                        <i class="fa fa-solid fa-handshake text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>{{ session('locale') == 'id' ? 'Menyelesaikan Sengketa' : 'Dispute Resolution' }}</h5>
                            <p class="mb-0 text-justify">
                                {{ session('locale') == 'id' ? 'Jika terjadi sengketa antara eksportir dan buyer, ECS berperan sebagai mediator. Mereka dapat menghubungi Perwakilan Perdagangan untuk membantu mengorganisir pertemuan antara kedua belah pihak, guna mencari solusi yang adil dan menghindari konflik yang lebih serius.' : 'In the event of a dispute between exporters and buyers, ECS acts as a mediator. They can contact Trade Representatives to help organize meetings between both parties to find a fair solution and avoid more serious conflicts.' }}
                            </p>
                        </div>
                    </div>
                    
                    <div class="d-flex gap-2 mb-4 wow fadeIn" data-wow-delay="0.5s">
                        <i class="fa fa-solid fa-tools text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>{{ session('locale') == 'id' ? 'Penyelesaian Masalah Bisnis' : 'Business Problem Resolution' }}</h5>
                            <p class="mb-0 text-justify">
                                {{ session('locale') == 'id' ? 'ECS siap membantu pelaku usaha dalam menghadapi berbagai tantangan yang terkait dengan ekspor, termasuk keterlambatan pengiriman, kualitas produk yang tidak sesuai, dan masalah komunikasi dengan buyer.' : 'ECS is ready to assist entrepreneurs in facing various challenges related to exports, including delivery delays, product quality issues, and communication problems with buyers.' }}
                            </p>
                        </div>
                    </div>
                    
                    <div class="d-flex gap-2 mb-4 wow fadeInUp" data-wow-delay="0.3s">
                        <i class="fa fa-solid fa-arrows-alt-h text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>{{ session('locale') == 'id' ? 'Jembatan ke Lembaga Terkait' : 'Bridge to Relevant Institutions' }}</h5>
                            <p class="mb-0 text-justify">
                                {{ session('locale') == 'id' ? 'ECS berfungsi sebagai jembatan untuk menghubungkan pelaku usaha dengan lembaga pemerintah atau organisasi lain yang dapat memberikan dukungan, baik itu dalam hal hukum, keuangan, atau aspek teknis dari bisnis ekspor.' : 'ECS serves as a bridge to connect entrepreneurs with government agencies or other organizations that can provide support, whether in legal, financial, or technical aspects of export business.' }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0 wow fadeInRight" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100"
                            src="{{ asset('assets_users/img/other1.jpg')}}" style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->


    <!-- Fact Start -->
    <div class="container py-5 ">
        <div class="row">
            <div class="col-lg-12 fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-secondary text-uppercase mb-3">{{ session('locale') == 'id' ? 'Beberapa Fakta' : 'Some Facts' }}</h6>
                <h1 class="mb-3">{{ session('locale') == 'id' ? 'Dukungan Penuh untuk Perjalanan Ekspor Anda' : 'Full Support for Your Export Journey' }}</h1>
                <div class="page-ekspor p-5">
                    <p class="text-justify p-3 text-white">
                        {{ session('locale') == 'id' ? 'Kami memahami bahwa setiap perjalanan ekspor memiliki tantangannya sendiri. Layanan kami mencakup solusi bagi berbagai kebutuhan bisnis, mulai dari pembiayaan hingga penyelesaian sengketa dengan buyer internasional. Tim kami siap memberikan dukungan yang dibutuhkan untuk memastikan proses ekspor Anda berjalan lancar dan efisien. Apapun kebutuhan Anda, kami siap membantu agar Anda bisa fokus pada hal yang paling penting: mengembangkan bisnis Anda ke tingkat internasional.' : 'We understand that every export journey has its own challenges. Our services include solutions for various business needs, from financing to dispute resolution with international buyers. Our team is ready to provide the support you need to ensure your export process runs smoothly and efficiently. Whatever your needs, we are here to help you focus on what matters most: developing your business to the international level.' }}
                    </p>
                    <a href="{{ url('contact') }}" class="btn btn-primary py-3 px-5 ms-3 mb-4">{{ session('locale') == 'id' ? 'Hubungi Kami' : 'Contact Us' }}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact End -->



<!-- Content -->


@endsection
