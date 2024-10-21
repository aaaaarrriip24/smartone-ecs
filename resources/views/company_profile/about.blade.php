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
        <h1 class="display-3 text-white mb-3 animated slideInDown">{{ session('locale') == 'id' ? 'Tentang Kami' : 'About Us' }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">{{ session('locale') == 'id' ? 'Beranda' : 'Home' }}</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="javascript:void(0)">{{ session('locale') == 'id' ? 'Halaman' : 'Pages' }}</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">{{ session('locale') == 'id' ? 'Tentang' : 'About' }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- About Start -->
<div class="container-fluid overflow-hidden px-lg-0">
    <div class="container about py-5 px-lg-0">
        <div class="row g-5 mx-lg-0">
            <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('assets_users/img/about.jpg') }}"
                        style="object-fit: cover;" alt="">
                </div>
            </div>
            <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="text-secondary text-uppercase mb-3">{{ session('locale') == 'id' ? 'Tentang Kami' : 'About Us' }}</h6>
                <h1 class="mb-5">{{ session('locale') == 'id' ? 'Selamat Datang di Export Center Surabaya' : 'Welcome to Export Center Surabaya' }}</h1>
                <p class="mb-5 text-justify">
                    {{ session('locale') == 'id' ? 'Kami hadir untuk mendukung dan memudahkan Anda dalam menjelajahi dunia ekspor. Dengan berbagai layanan komprehensif seperti konsultasi ekspor, penyebaran inquiry, business matching, hingga bantuan dalam aplikasi InaExport, kami siap menjadi mitra terpercaya dalam perjalanan Anda menuju pasar internasional. Mari bersama-sama wujudkan potensi ekspor Anda dan raih kesuksesan di pasar global.' : 'We are here to support and facilitate your exploration of the export world. With a range of comprehensive services such as export consultation, inquiry dissemination, business matching, and assistance with the InaExport application, we are ready to be your trusted partner on your journey to international markets. Let’s realize your export potential together and achieve success in the global market.' }}
                </p>
                <div class="row g-4 mb-5">
                    <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                        <i class="fa fa-solid fa-comments text-primary fa-3x flex-shrink-0 mb-4"></i>
                        <h5>{{ session('locale') == 'id' ? 'Konsultasi Ekspor' : 'Export Consultation' }}</h5>
                        <p class="mb-0 text-justify">
                            {{ session('locale') == 'id' ? 'Layanan ini merupakan aktivitas utama dari ECS, yang menyediakan panduan bagi pelaku usaha dari berbagai skala, masyarakat umum, dan mahasiswa terkait ekspor. Konsultasi mencakup prosedur ekspor, legalitas, sertifikasi produk, standar produk ekspor, serta strategi perluasan pasar. ECS juga membantu dalam masalah pembiayaan dan sengketa dengan buyer.' : 'This service is the main activity of ECS, providing guidance for entrepreneurs of various scales, the general public, and students regarding exports. Consultation covers export procedures, legality, product certification, export product standards, and market expansion strategies. ECS also assists with financing issues and disputes with buyers.' }}
                        </p>
                    </div>
                    <div class="col-sm-6 wow fadeIn" data-wow-delay="0.7s">
                        <i class="fa fa-solid fa-envelope-open-text text-primary fa-3x flex-shrink-0 mb-4"></i>
                        <h5>{{ session('locale') == 'id' ? 'Penyebaran Inquiry' : 'Inquiry Dissemination' }}</h5>
                        <p class="mb-0 text-justify">
                            {{ session('locale') == 'id' ? 'Melalui proses penyebaran inquiry yang efisien, perusahaan dapat meningkatkan kepuasan pelanggan sekaligus mengoptimalkan produk dan layanan yang mereka tawarkan.' : 'Through an efficient inquiry dissemination process, companies can enhance customer satisfaction while optimizing the products and services they offer.' }}
                        </p>
                    </div>
                </div>
                <a href="#services" class="btn btn-primary py-3 px-5">{{ session('locale') == 'id' ? 'Jelajahi Lebih Lanjut' : 'Explore More' }}</a>
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
                <h6 class="text-secondary text-uppercase mb-3">{{ session('locale') == 'id' ? 'Beberapa Fakta' : 'Some Facts' }}</h6>
                <h1 class="mb-5">{{ session('locale') == 'id' ? 'Menuju Pasar Global, Bersama Wujudkan Sukses Ekspor' : 'Towards the Global Market, Together Achieving Export Success' }}</h1>
                <p class="text-justify">
                    {{ session('locale') == 'id' ? 'ECS menyediakan berbagai layanan untuk mendukung pelaku usaha dalam proses ekspor, mulai dari konsultasi terkait prosedur dan legalitas, penyebaran inquiry dari calon pembeli internasional, hingga business matching untuk memfasilitasi pertemuan dan negosiasi antara eksportir dan buyer. Melalui aplikasi InaExport, ECS juga membantu perusahaan terhubung dengan perwakilan perdagangan di luar negeri. Selain itu, ECS memfasilitasi penyelesaian sengketa antara eksportir dan buyer guna memastikan kelancaran transaksi ekspor.' : 'ECS provides various services to support entrepreneurs in the export process, ranging from consultations on procedures and legality, inquiry dissemination from potential international buyers, to business matching to facilitate meetings and negotiations between exporters and buyers. Through the InaExport application, ECS also helps companies connect with trade representatives abroad. Additionally, ECS facilitates dispute resolution between exporters and buyers to ensure smooth export transactions.' }}
                </p>

                <p class="mb-4 text-justify">
                    {{ session('locale') == 'id' ? 'Dengan antarmuka yang intuitif dan dukungan pelanggan yang siap membantu, kami adalah solusi terbaik untuk memastikan pengiriman Anda berjalan lancar. Bergabunglah dengan kami dan rasakan kemudahan dalam mengelola semua pengiriman Anda di satu tempat!' : 'With an intuitive interface and customer support ready to assist, we are the best solution to ensure your shipments run smoothly. Join us and experience the ease of managing all your shipments in one place!' }}
                </p>
                <a href="{{ url('contact') }}" class="btn btn-primary py-3 px-5">{{ session('locale') == 'id' ? 'Hubungi Kami' : 'Contact Us' }}</a>
            </div>
            <div class="col-lg-6">
                <div class="row g-4 align-items-center">
                    <div class="col-sm-6">
                        <div class="bg-primary p-4 mb-4 wow fadeIn" data-wow-delay="0.3s">
                            <i class="fa fa-users fa-2x text-white mb-3"></i>
                            <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                            <p class="text-white mb-0">{{ session('locale') == 'id' ? 'Klien Puas' : 'Happy Clients' }}</p>
                        </div>
                        <div class="bg-secondary p-4 wow fadeIn" data-wow-delay="0.5s">
                            <i class="fa fa-ship fa-2x text-white mb-3"></i>
                            <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                            <p class="text-white mb-0">{{ session('locale') == 'id' ? 'Pengiriman Selesai' : 'Complete Shipments' }}</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="bg-success p-4 wow fadeIn" data-wow-delay="0.7s">
                            <i class="fa fa-star fa-2x text-white mb-3"></i>
                            <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                            <p class="text-white mb-0">{{ session('locale') == 'id' ? 'Ulasan Pelanggan' : 'Customer Reviews' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fact End -->



<!-- Feature Start -->
<div id="services" class="container-fluid overflow-hidden py-5 px-lg-0">
    <div class="container feature py-5 px-lg-0">
        <div class="row g-5 mx-lg-0">
            <div class="col-lg-6 feature-text wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-secondary text-uppercase mb-3">{{ session('locale') == 'id' ? 'Layanan Kami' : 'Our Services' }}</h6>
                <h1 class="mb-5">{{ session('locale') == 'id' ? 'Layanan Komprehensif ECS untuk Mendukung Kesuksesan Ekspor Bisnis Anda.' : 'Comprehensive ECS Services to Support Your Export Business Success.' }}</h1>
                <div class="d-flex gap-2 mb-4 wow fadeInUp" data-wow-delay="0.7s">
                    <i class="fa fa-solid fa-comments text-primary fa-3x flex-shrink-0"></i>
                    <div class="ms-4">
                        <h5>{{ session('locale') == 'id' ? 'Konsultasi Ekspor' : 'Export Consultation' }}</h5>
                        <p class="mb-0 text-justify">{{ session('locale') == 'id' ? 'Layanan ini merupakan aktivitas utama dari ECS, yang menyediakan panduan bagi pelaku usaha dari berbagai skala, masyarakat umum, dan mahasiswa terkait ekspor. Konsultasi mencakup prosedur ekspor, legalitas, sertifikasi produk, standar produk ekspor, serta strategi perluasan pasar. ECS juga membantu dalam masalah pembiayaan dan sengketa dengan buyer.' : 'This service is a core activity of ECS, providing guidance for entrepreneurs of all scales, the general public, and students regarding export. Consultation covers export procedures, legality, product certification, export product standards, and market expansion strategies. ECS also assists in financing issues and disputes with buyers.' }}</p>
                    </div>
                </div>
                <div class="d-flex gap-3 mb-4 wow fadeIn" data-wow-delay="0.5s">
                    <i class="fa fa-solid fa-envelope-open-text text-primary fa-3x flex-shrink-0"></i>
                    <div class="ms-4">
                        <h5>{{ session('locale') == 'id' ? 'Penyebaran Inquiry' : 'Inquiry Dissemination' }}</h5>
                        <p class="mb-0 text-justify">{{ session('locale') == 'id' ? 'Melalui proses penyebaran inquiry yang efisien, perusahaan dapat meningkatkan kepuasan pelanggan sekaligus mengoptimalkan produk dan layanan yang mereka tawarkan.' : 'Through an efficient inquiry dissemination process, companies can enhance customer satisfaction while optimizing the products and services they offer.' }}</p>
                    </div>
                </div>
                <div class="d-flex gap-1 mb-4 wow fadeInUp" data-wow-delay="0.3s">
                    <i class="fa fa-solid fa-users text-primary fa-3x flex-shrink-0"></i>
                    <div class="ms-4">
                        <h5>{{ session('locale') == 'id' ? 'Business Matching' : 'Business Matching' }}</h5>
                        <p class="mb-0 text-justify">{{ session('locale') == 'id' ? 'Dengan business matching yang efektif, perusahaan dapat memaksimalkan potensi mereka dan menciptakan hubungan yang saling menguntungkan di dunia bisnis.' : 'With effective business matching, companies can maximize their potential and create mutually beneficial relationships in the business world.' }}</p>
                    </div>
                </div>
                <div class="d-flex gap-3 mb-4 wow fadeInUp" data-wow-delay="0.7s">
                    <i class="fa fa-book text-primary fa-3x flex-shrink-0"></i>
                    <div class="ms-4">
                        <h5>{{ session('locale') == 'id' ? 'Panduan Aplikasi Inaexport' : 'InaExport Application Guide' }}</h5>
                        <p class="mb-0 text-justify">{{ session('locale') == 'id' ? 'Aplikasi ini dikembangkan oleh Direktorat Jenderal Pengembangan Ekspor Nasional dan berfungsi sebagai referensi utama bagi Perwadag saat ada inquiry dari buyer. Perusahaan yang terdaftar di aplikasi ini memiliki peluang lebih besar untuk mendapatkan inquiry dari Perwadag.' : 'This application was developed by the Directorate General of National Export Development and serves as a primary reference for Trade Representatives when there is an inquiry from buyers. Companies registered in this application have a greater chance of receiving inquiries from Trade Representatives.' }}</p>
                    </div>
                </div>
                <div class="d-flex gap-3 mb-4 wow fadeInUp" data-wow-delay="0.7s">
                    <i class="fa fa-solid fa-cogs text-primary fa-3x flex-shrink-0"></i>
                    <div class="ms-1">
                        <h5>{{ session('locale') == 'id' ? 'Layanan Lainnya' : 'Other Services' }}</h5>
                        <p class="mb-0 text-justify">{{ session('locale') == 'id' ? 'ECS juga membantu menyelesaikan sengketa antara pelaku usaha dan buyer, dengan menghubungkan mereka ke Perwadag untuk mediasi dan penyelesaian masalah.' : 'ECS also assists in resolving disputes between entrepreneurs and buyers, connecting them to Trade Representatives for mediation and problem resolution.' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 pe-lg-0 wow fadeInRight" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('assets_users/img/feature.jpg')}}" style="object-fit: cover;" alt="">
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
            <h6 class="text-secondary text-uppercase">{{ session('locale') == 'id' ? 'Tim Kami' : 'Our Team' }}</h6>
            <h1 class="mb-5">{{ session('locale') == 'id' ? 'Anggota Tim' : 'Expert Team Members' }}</h1>
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
