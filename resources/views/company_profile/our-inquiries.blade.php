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
        <h1 class="display-3 text-white mb-3 animated slideInDown">{{ session('locale') == 'id' ? 'Penyebaran Inquiry' : 'Inquiry Dissemination' }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">{{ session('locale') == 'id' ? 'Beranda' : 'Home' }}</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="javascript:void(0)">{{ session('locale') == 'id' ? 'Halaman' : 'Page' }}</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">{{ session('locale') == 'id' ? 'Penyebaran Inquiry' : 'Inquiry Dissemination' }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Content -->
    <!-- Inquiry Distribution Start -->
    <div class="container-fluid overflow-hidden py-3 px-lg-0">
        <div class="container about py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('assets_users/img/inquiry2.jpg') }}"
                            style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="text-secondary text-uppercase mb-2">{{ session('locale') == 'id' ? 'Layanan Kami' : 'Our Services' }}</h6>
                    <h1 class="mb-4">{{ session('locale') == 'id' ? 'Penyebaran Inquiry' : 'Inquiry Distribution' }}</h1>
                    <p class="mb-4 text-justify">
                        {{ session('locale') == 'id' ? 'Penyebaran inquiry merupakan proses penting yang berfungsi untuk menjembatani komunikasi antara eksportir dan buyer internasional. Melalui penyebaran ini, eksportir dapat menerima informasi terkait permintaan produk dari buyer di luar negeri, yang pada gilirannya membuka peluang untuk menjalin kerjasama dan transaksi perdagangan. Proses ini tidak hanya meningkatkan keterhubungan antara kedua belah pihak, tetapi juga memastikan bahwa eksporter mendapatkan akses ke potensi pasar yang lebih luas, sehingga dapat memperluas jaringan bisnis dan meningkatkan kesempatan untuk sukses di pasar global.' : 'Inquiry distribution is an essential process that bridges communication between exporters and international buyers. Through this process, exporters can receive information about product requests from overseas buyers, opening up opportunities for cooperation and trade transactions. This process not only enhances connectivity between both parties but also ensures that exporters gain access to a broader market potential, allowing them to expand their business networks and increase their chances of success in the global market.' }}
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
                    <h6 class="text-secondary text-uppercase mb-3">{{ session('locale') == 'id' ? 'Penyebaran Inquiry' : 'Inquiry Distribution' }}</h6>
                    <h1 class="mb-5">{{ session('locale') == 'id' ? 'Aspek yang Mencakup Penyebaran Inquiry' : 'Aspects of Inquiry Distribution' }}</h1>
                    
                    <div class="d-flex gap-2 mb-4 wow fadeInUp" data-wow-delay="0.7s">
                        <i class="fa fa-solid fa-paper-plane text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>{{ session('locale') == 'id' ? 'Pengumpulan Inquiry' : 'Inquiry Collection' }}</h5>
                            <p class="mb-0 text-justify">
                                {{ session('locale') == 'id' ? 'ECS berfungsi sebagai penghubung dengan Perwakilan Perdagangan (Perwadag) RI di luar negeri, yang secara rutin menerima permintaan dari buyer yang mencari produk tertentu. Inquiry ini sangat penting bagi eksportir, karena mereka mencerminkan minat pasar terhadap produk Indonesia.' : 'ECS acts as a liaison with the Trade Representatives (Perwadag) of Indonesia abroad, who regularly receive requests from buyers looking for specific products. These inquiries are crucial for exporters as they reflect market interest in Indonesian products.' }}
                            </p>
                        </div>
                    </div>

                    <div class="d-flex gap-3 mb-4 wow fadeIn" data-wow-delay="0.5s">
                        <i class="fa fa-solid fa-share-alt text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>{{ session('locale') == 'id' ? 'Distribusi Inquiry' : 'Inquiry Distribution' }}</h5>
                            <p class="mb-0 text-justify">
                                {{ session('locale') == 'id' ? 'Setelah inquiry diterima, ECS mendistribusikan informasi tersebut kepada perusahaan yang dapat memenuhi permintaan. ECS menggunakan database perusahaan yang ada untuk memastikan bahwa inquiry disampaikan kepada eksportir yang tepat, sehingga meningkatkan peluang terjadinya transaksi.' : 'Once inquiries are received, ECS distributes the information to companies that can fulfill the requests. ECS utilizes its existing company database to ensure that inquiries reach the right exporters, thereby increasing the chances of transaction occurrence.' }}
                            </p>
                        </div>
                    </div>

                    <div class="d-flex gap-2 mb-4 wow fadeInUp" data-wow-delay="0.3s">
                        <i class="fa fa-solid fa-comments text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>{{ session('locale') == 'id' ? 'Proses Respon' : 'Response Process' }}</h5>
                            <p class="mb-0 text-justify">
                                {{ session('locale') == 'id' ? 'ECS membantu perusahaan untuk memahami cara yang efektif dalam merespon inquiry. Ini termasuk memberikan panduan tentang penyusunan proposal yang menarik dan persiapan untuk negosiasi yang mungkin terjadi setelah inquiry direspon.' : 'ECS assists companies in understanding effective ways to respond to inquiries. This includes providing guidance on crafting appealing proposals and preparing for potential negotiations that may follow the response to the inquiry.' }}
                            </p>
                        </div>
                    </div>

                    <div class="d-flex gap-1 mb-4 wow fadeInUp" data-wow-delay="0.3s">
                        <i class="fa fa-solid fa-handshake text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>{{ session('locale') == 'id' ? 'Potensi Transaksi' : 'Transaction Potential' }}</h5>
                            <p class="mb-0 text-justify">
                                {{ session('locale') == 'id' ? 'Setelah inquiry direspon dengan baik, ECS berusaha untuk mengubahnya menjadi transaksi dagang. Ini mencakup penyiapan semua dokumen yang diperlukan dan memastikan bahwa produk dapat dikirim sesuai dengan kesepakatan yang dibuat.' : 'After inquiries are effectively responded to, ECS strives to convert them into trade transactions. This includes preparing all necessary documents and ensuring that products can be shipped according to the agreements made.' }}
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
                <h6 class="text-secondary text-uppercase mb-3">{{ session('locale') == 'id' ? 'Beberapa Fakta' : 'Some Facts' }}</h6>
                <h1 class="mb-3">{{ session('locale') == 'id' ? 'Jawab Peluang, Raih Kesempatan Emas' : 'Seize Opportunities, Capture Golden Chances' }}</h1>
                <div class="page-ekspor p-5">
                    <p class="text-justify p-3 text-white">
                        {{ session('locale') == 'id' ? 'Jangan lewatkan peluang bisnis internasional dengan layanan penyebaran inquiry kami. Inquiry dari buyer luar negeri adalah kunci untuk membuka potensi transaksi dagang baru. Kami bekerja sama dengan perwakilan perdagangan Indonesia di luar negeri, seperti Atase Perdagangan dan ITPC, untuk menyebarkan permintaan yang kami terima langsung kepada perusahaan yang sesuai. Respon yang cepat dan tepat bisa menjadi pintu masuk bagi perusahaan Anda menuju transaksi yang sukses.' : 'Don\'t miss out on international business opportunities with our inquiry distribution service. Inquiries from foreign buyers are key to unlocking new trade transaction potential. We collaborate with Indonesian trade representatives abroad, such as Trade Attachés and ITPC, to distribute requests we receive directly to suitable companies. A quick and accurate response can be your gateway to successful transactions.' }}
                    </p>
                    <a href="{{ url('contact') }}" class="btn btn-primary py-3 px-5 ms-3 mb-4">{{ session('locale') == 'id' ? 'Hubungi Kami' : 'Contact Us' }}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact End -->
<!-- Content -->


@endsection
