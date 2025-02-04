@extends('layouts.users')
@section('content')
<style>
    .text-truncate-3 {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        -webkit-line-clamp: 3; /* Maksimal 3 baris */
        line-height: 1.3;
        margin-top: auto;
    }
</style>

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow border-top border-5 border-primary sticky-top p-0">
    <a href="{{ url('/') }}" class="navbar-brand bg-white d-flex align-items-center px-4 px-lg-5">
        <img src="{{ asset('assets/images/kemendag.png')}}" class=""
            style="background: white;width: 180px; display: inline-block;" alt="">
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    @include('layouts.navbar')
</nav>
<!-- Navbar End -->


<!-- Carousel Start -->
<div class="container-fluid p-0 pb-1">
    <div class="owl-carousel header-carousel position-relative mb-5">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{ asset('assets/images/ecs/slide_welcome/1.jpg')}}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                style="background: rgba(6, 3, 21, .0);">
            </div>
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{ asset('assets/images/ecs/slide_welcome/2.jpg')}}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                style="background: rgba(6, 3, 21, .0);">
            </div>
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{ asset('assets/images/ecs/slide_welcome/3.jpg')}}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                style="background: rgba(6, 3, 21, .0);">
            </div>
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{ asset('assets/images/ecs/slide_welcome/4.jpg')}}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                style="background: rgba(6, 3, 21, .0);">
            </div>
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{ asset('assets/images/ecs/slide_welcome/5.jpg')}}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                style="background: rgba(6, 3, 21, .0);">
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->

<!-- Service Start -->
<div class="container-fluid p-0 py-4">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-secondary text-uppercase">{{ lng("Layanan Kami") }}</h6>
            <h1 class="mb-5">{{ lng("Jelajahi Layanan Kami") }}</h1>
        </div>
        <div class="row w-100 justify-content-center px-0">
            <div class="col-md-6 col-lg-2 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-3 h-100 d-flex flex-column ">
                    <div class="overflow-hidden p-3 text-center mb-4">
                        <img class="img-fluid w-100" src="{{ asset('assets/images/ecs/icon_layanan/Business Matching.png')}}" alt="">
                    </div>
                    <h6 class="mb-3">{{ lng("Business Matching") }}</h6>
                    <p class="text-truncate-3">{{ lng("Business Matching menghubungkan pelaku bisnis dengan mitra dagang potensial melalui analisis kebutuhan dan acara networking, menciptakan peluang kerjasama yang saling menguntungkan.") }}</p>
                    <a class="btn-slide mt-auto" href="{{ url('our-bm') }}"><i class="fa fa-arrow-right"></i><span>{{ lng("Baca Selengkapnya")}}</span></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-2 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item p-3 h-100 d-flex flex-column ">
                    <div class="overflow-hidden p-3 text-center mb-4">
                        <img class="img-fluid w-100" src="{{ asset('assets/images/ecs/icon_layanan/Konsultasi.png')}}" alt="">
                    </div>
                    <h6 class="mb-3">{{ lng("Konsultasi Ekspor") }}</h6>
                    <p class="text-truncate-3">{{ lng("Konsultasi Ekspor memberikan panduan lengkap tentang proses ekspor, termasuk persyaratan hukum dan strategi pemasaran global, untuk membantu perusahaan memasuki pasar internasional.") }}</p>
                    <a class="btn-slide mt-auto" href="{{ url('our-konsultasi') }}"><i class="fa fa-arrow-right"></i><span>{{ lng("Baca Selengkapnya")}}</span></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-2 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-3 h-100 d-flex flex-column ">
                    <div class="overflow-hidden p-3 text-center mb-4">
                        <img class="img-fluid w-100" src="{{ asset('assets/images/ecs/icon_layanan/Pendampingan InaExport.png')}}" alt="">
                    </div>
                    <h6 class="mb-3">{{ lng("Pendampingan InaExport") }}</h6>
                    <p class="text-truncate-3">{{ lng("Pendampingan InaExport mendukung perusahaan dalam memanfaatkan platform InaExport, memberikan pelatihan dan strategi untuk meningkatkan visibilitas produk di pasar internasional.") }}</p>
                    <a class="btn-slide mt-auto" href="{{ url('our-panduan') }}"><i class="fa fa-arrow-right"></i><span>{{ lng("Baca Selengkapnya")}}</span></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-2 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item p-3 h-100 d-flex flex-column ">
                    <div class="overflow-hidden p-3 text-center mb-4">
                        <img class="img-fluid w-100" src="{{ asset('assets/images/ecs/icon_layanan/Penyebaran Inquiry.png')}}" alt="">
                    </div>
                    <h6 class="mb-3">{{ lng("Penyebaran Inquiry") }}</h6>
                    <p class="text-truncate-3">{{ lng("Penyebaran Inquiry mempromosikan produk Anda kepada calon pembeli di pasar global dengan mengelola dan menyebarkan permintaan informasi dari buyer kepada pelaku usaha yang relevan.") }}</p>
                    <a class="btn-slide mt-auto" href="{{ url('our-inquiries') }}"><i class="fa fa-arrow-right"></i><span>{{ lng("Baca Selengkapnya")}}</span></a>
                </div>
            </div>

            <div class="col-md-6 col-lg-2 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item p-3 h-100 d-flex flex-column ">
                    <div class="overflow-hidden p-3 text-center mb-4">
                        <img class="img-fluid w-100" src="{{ asset('assets/images/ecs/icon_layanan/Mediasi Kasus Dagang.png')}}" alt="">
                    </div>
                    <h6 class="mb-3">{{ lng("Layanan Lainnya") }}</h6>
                    <p class="text-truncate-3">{{ lng("Layanan lainnya termasuk, mediasi Kasus Dagang menawarkan penyelesaian sengketa bisnis dengan mediator profesional, membantu pihak-pihak mencapai kesepakatan tanpa jalur hukum yang panjang.") }}</p>
                    <a class="btn-slide mt-auto" href="{{ url('other-service') }}"><i class="fa fa-arrow-right"></i><span>{{ lng("Baca Selengkapnya")}}</span></a>
                </div>
            </div>
        </div>
</div>
<!-- Service End -->

{{-- about --}}
<div class="container-xxl py-5 my-5">
    <div class="row">
        <div class="col-12">
            <!-- Header Section -->
            <h6 class="text-secondary text-uppercase">
                {{ lng("Tentang Kami") }}
            </h6>
            <h1 class="mb-5">
                {{ lng("Tentang") }} Export Center Surabaya (ECS)
            </h1>

            <!-- Content Section -->
            <div class="text-justify">
                <p>{{ lng("Kementerian Perdagangan Republik Indonesia sebagai pengemban amanah Peraturan Pemerintah Pengganti Undang-Undang (Perpu) Nomor 2 Tahun 2022 tentang Cipta Kerja Pasal 74 yang bertugas melakukan pembinaan terhadap Pelaku Usaha dalam rangka pengembangan Ekspor untuk perluasan akses Pasar bagi Barang dan Jasa produksi dalam negeri.
                    Pada Peraturan Menteri Perdagangan Republik Indonesia Nomor 29 Tahun 2022, Direktorat Pengembangan Pasar dan Informasi Ekspor, Direktorat Jenderal Pengembangan Ekspor Nasional (Ditjen. PEN), mempunyai tugas melaksanakan perumusan dan pelaksanaan kebijakan di bidang pengembangan dan peningkatan daya saing pasar ekspor, pelaku ekspor, dan pengembangan kelembagaan promosi.")}}
                </p>

                <!-- Collapsible Content -->
                <div id="moreText" class="collapse">
                    <p>{{ lng("Export Center Surabaya (ECS) sebagai perpanjangan tangan Direktorat Pengembangan Pasar dan Informasi Ekspor di daerah, berperan mengoptimalkan peran eksportir daerah dalam memanfaatkan peluang ekspor diantaranya dengan penyebaran inquiry dan hasil Market Intelligence yang diperoleh dari Perwakilan Perdagangan di Luar Negeri, pemanfaatan Free Trade Agreement (FTA) maupun promosi ekspor. Dengan adanya Export Center Surabaya ini, kebijakan yang diterbitkan oleh Kementerian Perdagangan dapat tersampaikan dan dimanfaatkan secara optimal oleh para pelaku usaha. Selain itu informasi yang bersumber Perwakilan Perdagangan di luar negeri dapat tersalurkan secara tepat dan cepat sehingga dapat memperluas pangsa ekspor.")}}
                    </p>
                    <p>{{ lng("Maksud Penyelenggaraan Export Center Surabaya adalah untuk mengoptimalkan peluang pasar ekspor di pasar internasional agar dapat dimanfaatkan oleh para pelaku usaha ekspor.
                        Tujuan dari kegiatan penyelenggaraan Export Center Surabaya adalah menyediakan layanan publik yang berfungsi sebagai tempat para pelaku usaha untuk memperoleh konsultasi dan informasi mengenai peluang pasar ekspor diantaranya buyers inquiry yang diperoleh dari Perwakilan Perdagangan di Luar Negeri, Market Intelligence, pemanfaatan Free Trade Agreement maupun promosi ekspor.")}}
                    </p>
                </div>
                <a href="#moreText" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#moreText" aria-expanded="false" aria-controls="moreText" onclick="hideButton(this)">
                    {{ lng("Baca Selengkapnya")}}
                </a>
                <!-- Read More Button -->
            </div>
        </div>
    </div>
</div>

<!-- News Start -->
<div class="container-xxl py-2">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-secondary text-uppercase">{{ lng("Berita ECS") }}</h6>
            <h1 class="mb-5">{{ lng("Jelajahi Berita Kami") }}</h1>
        </div>
        <div class="row g-4">
            @foreach($berita as $item)
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item p-3">
                        <div class="overflow-hidden p-3 text-center mb-4">
                            @if(!empty($item->gambar))
                                @php
                                    $gambarArray = json_decode($item->gambar);
                                    $firstImage = !empty($gambarArray) ? $gambarArray[0] : 'default.png';
                                @endphp
                                <img class="img-fluid w-75" src="{{ asset('images/' . $firstImage) }}" alt="">
                            @else
                                <img class="img-fluid w-75" src="{{ asset('assets/images/default.png') }}" alt="Default Image">
                            @endif
                        </div>
                        <h4 class="mb-3">{{ session('locale') == 'id' ? $item->judul : $item->judul }}</h4>
                        <p class="text-justify">{{ Str::limit($item->isi, 150, '...') }}</p>
                        <a class="btn-slide mt-2" href="{{ url('news/detail/' . $item->id) }}">
                            <i class="fa fa-arrow-right"></i>
                            <span>{{ lng("Baca Selengkapnya") }}</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a class="btn btn-primary" href="{{ url('news') }}">{{ lng("Baca Berita Lainnya") }}</a>
        </div>
    </div>
</div>
<!-- News End -->

<!-- Service Start -->
<div class="container p-0 py-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-secondary text-uppercase mb-3"> {{ lng("Sebuah Fakta") }}</h6>
            <h1 class="mb-5">{{ lng("Produk Indonesia yang Berpotensi Besar") }}</h1>
        </div>
        <div class="row w-100 justify-content-center px-0">
            <div class="col-md-6 col-lg-2 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-3 h-100 d-flex flex-column ">
                    <div class="overflow-hidden p-3 text-center mb-4">
                        <img class="img-fluid w-100" src="{{ asset('assets/images/ecs/icon_indonesia_great/Spices.png')}}" alt="">
                    </div>
                    <h6 class="mb-3">{{ lng("Rempah") }}</h6>
                    <p class="text-truncate-3">{{ lng("Indonesia merupakan negara kepulauan yang memiliki kekayaan sumber daya alam, dan dikenal sebagai penghasil rempah-rempah sejak zaman dahulu.") }}</p>
                    <a class="btn-slide mt-auto" href="{{ url('artikel/spices') }}"><i class="fa fa-arrow-right"></i><span>{{ lng("Baca Selengkapnya")}}</span></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-2 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item p-3 h-100 d-flex flex-column ">
                    <div class="overflow-hidden p-3 text-center mb-4">
                        <img class="img-fluid w-100" src="{{ asset('assets/images/ecs/icon_indonesia_great/Fish.png')}}" alt="">
                    </div>
                    <h6 class="mb-3">{{ lng("Ikan") }}</h6>
                    <p class="text-truncate-3">{{ lng("Indonesia merupakan salah satu negara maritim yang kaya akan sumber daya laut, hal tersebut menjadikan Indonesia sebagai salah satu pemasok produk perikanan dunia dan produk perikanan ini sebagai salah satu komoditas unggulan Indonesia yang memiliki potensi besar untuk diekspor.") }}</p>
                    <a class="btn-slide mt-auto" href="{{ url('artikel/fish') }}"><i class="fa fa-arrow-right"></i><span>{{ lng("Baca Selengkapnya")}}</span></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-2 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-3 h-100 d-flex flex-column ">
                    <div class="overflow-hidden p-3 text-center mb-4">
                        <img class="img-fluid w-100" src="{{ asset('assets/images/ecs/icon_indonesia_great/Furniture.png')}}" alt="">
                    </div>
                    <h6 class="mb-3">{{ lng("Mebel") }}</h6>
                    <p class="text-truncate-3">{{ lng("Indonesia merupakan salah satu negara penghasil produk furniture berkualitas tinggi yang diakui secara global.") }}</p>
                    <a class="btn-slide mt-auto" href="{{ url('artikel/furniture') }}"><i class="fa fa-arrow-right"></i><span>{{ lng("Baca Selengkapnya")}}</span></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-2 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item p-3 h-100 d-flex flex-column ">
                    <div class="overflow-hidden p-3 text-center mb-4">
                        <img class="img-fluid w-100" src="{{ asset('assets/images/ecs/icon_indonesia_great/Coffee.png')}}" alt="">
                    </div>
                    <h6 class="mb-3">{{ lng("Kopi") }}</h6>
                    <p class="text-truncate-3">{{ lng("Kopi merupakan salah satu komoditi hasil perkebunan yang memiliki peranan cukup penting dalam perekonomian di Indonesia. Kopi juga merupakan salah satu komoditas ekspor yang telah menghasilkan devisa negara.") }}</p>
                    <a class="btn-slide mt-auto" href="{{ url('artikel/coffee') }}"><i class="fa fa-arrow-right"></i><span>{{ lng("Baca Selengkapnya")}}</span></a>
                </div>
            </div>

            <div class="col-md-6 col-lg-2 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item p-3 h-100 d-flex flex-column ">
                    <div class="overflow-hidden p-3 text-center mb-4">
                        <img class="img-fluid w-100" src="{{ asset('assets/images/ecs/icon_indonesia_great/Food Processing.png')}}" alt="">
                    </div>
                    <h6 class="mb-3">{{ lng("Pengelolahan Makanan") }}</h6>
                    <p class="text-truncate-3">{{ lng("Indonesia merupakan salah satu negara dengan potensi besar dalam industri food processing atau pengolahan makanan, berkat melimpahnya sumber daya alam dan keanekaragaman hasil pertanian serta perikanan.") }}</p>
                    <a class="btn-slide mt-auto" href="{{ url('artikel/food') }}"><i class="fa fa-arrow-right"></i><span>{{ lng("Baca Selengkapnya")}}</span></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-2 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item p-3 h-100 d-flex flex-column ">
                    <div class="overflow-hidden p-3 text-center mb-4">
                        <img class="img-fluid w-100" src="{{ asset('assets/images/ecs/icon_indonesia_great/Manufacture product.png')}}" alt="">
                    </div>
                    <h6 class="mb-3">{{ lng("Memproduksi Produk") }}</h6>
                    <p class="text-truncate-3">{{ lng("Indonesia memiliki potensi besar dalam industri manufaktur yang berkontribusi signifikan terhadap perekonomian nasional.") }}</p>
                    <a class="btn-slide mt-auto" href="{{ url('artikel/manufacture') }}"><i class="fa fa-arrow-right"></i><span>{{ lng("Baca Selengkapnya")}}</span></a>
                </div>
            </div>
        </div>
</div>

<!-- Dashboard -->
<div class="container-xxl py-4">
    <div class="container py-4">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="mb-5">{{ lng("Performa ECS") }}</h1>
        </div>
        <div class="row g-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">ECS Performance</div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Template -->
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center" scope="col" style="background-color: rgb(255, 99, 132);">
                                                Perusahaan&nbsp;Terdaftar</th>
                                            <th class="text-center" scope="col" style="background-color: rgb(75, 192, 192);">
                                                Business&nbsp;Matching</th>
                                            <th class="text-center" scope="col" width="250px" style="background-color: rgb(189,156,255);">
                                                Inquiry</th>
                                            <th class="text-center" scope="col" style="background-color: rgb(255, 205, 86);">
                                                Realisasi&nbsp;Export&nbsp;(USD)</th>
                                            <th class="text-center" scope="col" style="background-color: rgb(255, 159, 64);">
                                                Jumlah&nbsp;Konsultasi</th>
                                            <th class="text-center" scope="col" style="background-color: rgb(124,194,242);">InaExport</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-end">{{ number_format($perusahaan) }}</td>
                                            <td class="text-end">
                                                {{ number_format($bm) }}/{{ number_format( $ptbm2->jumlah_perusahaan )}}</td>
                                            <td class="text-end">
                                                {{ number_format($iq) }}/{{ number_format( $ptiq2->jumlah_perusahaan )}}</td>
                                            <td class="text-end">{{ number_format($export->total) }}</td>
                                            <td class="text-end">{{ number_format($layanan) }}</td>
                                            <td class="text-end">{{ number_format( $ptina->count_perusahaan )}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <canvas id="chart_layanan_konsultasi" style="width: 900px; height: 500px"></canvas>
                            </div>
                            <!-- <div class="col-md-6">
                                <canvas id="chart_topik" style="width: 900px; height: 500px"></canvas>
                            </div> -->
                            <div class="col-md-6">
                                <table id="dt_topik" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="background-color: rgb(255, 99, 132);">No.
                                            </th>
                                            <th scope="col" style="background-color: rgb(255, 205, 86);">Topik Konsultasi
                                            </th>
                                            <th scope="col" style="background-color: rgb(75, 192, 192);">Data Konsultasi
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Dashboard -->


<!-- Team Start -->
<div class="container-xxl py-4">
    <div class="container py-4">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-secondary text-uppercase">{{ lng("Tim Kami") }}</h6>
            <h1 class="mb-5">{{ lng("Anggota Tim") }}</h1>
        </div>
        <div class="row g-4 mb-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item p-4 h-100 d-flex flex-column">
                    <div class="overflow-hidden mb-4">
                        <img class="img" style="width:350px; height:350px;" src="{{ asset('assets/images/ecs/tim/Dirgantoro.png')}}" alt="">
                    </div>
                    <h5 class="mb-0">Toto Dirgantoro</h5>
                    <p>{{ Str::limit('Kepala Pengelola Export Center Surabaya', 150, $end='...') }}</p>
                    <div class="btn-slide mt-auto">
                        <i class="fa fa-share"></i>
                        <span>
                            <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item p-4 h-100 d-flex flex-column">
                    <div class="overflow-hidden mb-4">
                        <img class="img" style="width:350px; height:350px;" src="{{ asset('assets/images/ecs/tim/Adistiar-Prayoga.png')}}" alt="">
                    </div>
                    <h5 class="mb-0">Adistiar Prayoga</h5>
                    <p>{{ Str::limit('Staff Senior Bidang Keuangan', 150, $end='...') }}</p>
                    <div class="btn-slide mt-auto">
                        <i class="fa fa-share"></i>
                        <span>
                            <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item p-4 h-100 d-flex flex-column">
                    <div class="overflow-hidden mb-4">
                        <img class="img" style="width:350px; height:350px;" src="{{ asset('assets/images/ecs/tim/Bu Rima.jpg')}}" alt="">
                    </div>
                    <h5 class="mb-0">Lies Rimayani</h5>
                    <p>{{ Str::limit('Staff Junior Keuangan', 150, $end='...') }}</p>
                    <div class="btn-slide mt-auto">
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
        <div class="row g-4 mb-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item p-4 h-100 d-flex flex-column">
                    <div class="overflow-hidden mb-4">
                        <img class="img" style="width:350px; height:350px;" src="{{ asset('assets/images/ecs/tim/Jalian Setiarsa.png')}}" alt="">
                    </div>
                    <h5 class="mb-0">Jalian Setiarsa</h5>
                    <p>{{ Str::limit('Koordinator Tenaga Teknis', 150, $end='...') }}</p>
                    <div class="btn-slide mt-auto">
                        <i class="fa fa-share"></i>
                        <span>
                            <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item p-4 h-100 d-flex flex-column">
                    <div class="overflow-hidden mb-4">
                        <img class="img" style="width:350px; height:350px;" src="{{ asset('assets/images/ecs/tim/Arie Indarwanto.png')}}" alt="">
                    </div>
                    <h5 class="mb-0">Arie Indarwanto</h5>
                    <p>{{ Str::limit('Tenaga Teknis Bidang Prosedur Ekspor, Logistik dan Kepabeanan ', 150, $end='...') }}</p>
                    <div class="btn-slide mt-auto">
                        <i class="fa fa-share"></i>
                        <span>
                            <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item p-4 h-100 d-flex flex-column">
                    <div class="overflow-hidden mb-4">
                        <img class="img" style="width:350px; height:350px;" src="{{ asset('assets/images/ecs/tim/Aksamil Khair.png')}}" alt="">
                    </div>
                    <h5 class="mb-0">Aksamil Khair</h5>
                    <p>{{ Str::limit('Tenaga Teknis Bidang Implementasi Hasil Perjanjian Perdagangan Internasional, Inaexport dan Hubungan Antar Lembaga ', 150, $end='...') }}</p>
                    <div class="btn-slide mt-auto">
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
        <div class="row g-4 mb-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item p-4 h-100 d-flex flex-column">
                    <div class="overflow-hidden mb-4">
                        <img class="img" style="width:250px; height:250px;" src="{{ asset('assets/images/ecs/tim/Permadani Anggi Palupi.png')}}" alt="">
                    </div>
                    <h5 class="mb-0">Permadani Anggi Palupi</h5>
                    <p>{{ Str::limit('Koordinator Tenaga Pendukung Bidang Keuangan ', 150, $end='...') }}</p>
                    <div class="btn-slide mt-auto">
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
                <div class="team-item p-4 h-100 d-flex flex-column">
                    <div class="overflow-hidden mb-4">
                        <img class="img" style="width:250px; height:250px;" src="{{ asset('assets/images/ecs/tim/Faya Valentia.png')}}" alt="">
                    </div>
                    <h5 class="mb-0">Faya Valentia Ivany</h5>
                    <p>{{ Str::limit('Tenaga Pendukung Bidang Sekretariat ', 150, $end='...') }}</p>
                    <div class="btn-slide mt-auto">
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
                <div class="team-item p-4 h-100 d-flex flex-column">
                    <div class="overflow-hidden mb-4">
                        <img class="img" style="width:250px; height:250px;" src="{{ asset('assets/images/ecs/tim/Maulidina Fahria.png')}}" alt="">
                    </div>
                    <h5 class="mb-0">Maulidina Fahria W</h5>
                    <p>{{ Str::limit('Tenaga Pendukung Bidang Kegiatan ', 150, $end='...') }}</p>
                    <div class="btn-slide mt-auto">
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
                <div class="team-item p-4 h-100 d-flex flex-column">
                    <div class="overflow-hidden mb-4">
                        <img class="img" style="width:250px; height:250px;" src="{{ asset('assets/images/ecs/tim/Layla Novia Rahmah.png')}}" alt="">
                    </div>
                    <h5 class="mb-0">Layla Novia Rahmah</h5>
                    <p>{{ Str::limit('Tenaga Pendukung Bidang Konsultasi ', 150, $end='...') }}</p>
                    <div class="btn-slide mt-auto">
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

<!-- Testimonial Start -->
<div class="container-xxl wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h1 class="mb-0">{{ lng("Mitra Kami") }}</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="p-4 my-5">
                <div class="d-flex align-items-center mt-5">
                    <img class="img-fluid rounded mx-auto d-block" src="{{ asset('assets_users/partner/kemendag.svg') }}"
                        style="width: 250px; height: auto;">
                </div>
            </div>
            <div class="p-4 my-5">
                <div class="d-flex align-items-center">
                    <img class="img-fluid rounded mx-auto d-block"
                        src="{{ asset('assets_users/partner/disperindag.png') }}" style="width: 150px; height: auto;">
                </div>
            </div>
            <div class="p-4 my-5">
                <div class="d-flex align-items-center mt-5">
                    <img class="img-fluid rounded mx-auto d-block"
                        src="{{ asset('assets_users/partner/inaexport.png') }}" style="width: 250px; height: auto;">
                </div>
            </div>
            <div class="p-4 my-5">
                <div class="d-flex align-items-center">
                    <img class="img-fluid rounded mx-auto d-block" src="{{ asset('assets_users/partner/gpei.png') }}"
                        style="width: 250px; height: auto;">
                </div>
            </div>
            <div class="p-4 my-5">
                <div class="d-flex align-items-center">
                    <img class="img-fluid rounded mx-auto d-block" src="{{ asset('assets_users/partner/LPEI.jpg') }}"
                        style="width: 250px; height: auto;">
                </div>
            </div>
            <div class="p-4 my-5">
                <div class="d-flex align-items-center">
                    <img class="img-fluid rounded mx-auto d-block" src="{{ asset('assets_users/partner/BPOM.png') }}"
                        style="width: 150px; height: auto;">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->
@endsection
@section('js')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
    var barLayanan = document.getElementById("chart_layanan_konsultasi").getContext('2d');
    $.get(base_url + "section2", function (result, status) {
        const labels = result.label
        const data = {
            labels: labels,
            datasets: [{
                label: 'Data Layanan Konsultasi ECS',
                data: result.data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };
        console.log(data);

        var myChart = new Chart(barLayanan, {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },

        });
    });

</script>
<script type="text/javascript">
    function hideButton(button) {
        // Tunggu hingga elemen terbuka, lalu sembunyikan tombol
        setTimeout(() => {
            button.style.display = 'none';
        }, 300); // Sesuaikan dengan durasi animasi Bootstrap (default 300ms)
    }

    var barTopik = document.getElementById("chart_topik").getContext('2d');
    $.get(base_url + "section3", function (result, status) {
        const labels = result.label
        const data = {
            labels: labels,
            datasets: [{
                label: 'Data Topik Layanan',
                data: result.data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };
        console.log(data);

        var myChart = new Chart(barTopik, {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },

        });
    });

</script>
<script>
    let table;
    $(document).ready(function () {
        table = $('#dt_topik').DataTable({
            autoWidth: false,
            responsive: false,
            scrollCollapse: true,
            processing: true,
            serverSide: true,
            displayLength: 5,
            paginate: true,
            lengthChange: true,
            filter: true,
            sort: true,
            info: true,
            searching: false,
            ajax: base_url + "data_topik",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    className: 'text-center',
                    width: '5%'
                },
                {
                    data: 'nama_topik',
                    name: 'nama_topik',
                    orderable: true,
                },
                {
                    data: 'total',
                    name: 'total',
                    className: 'text-end',
                    orderable: false,
                    searchable: false,
                    width: '25%'
                },
            ]
        });

        $(".dt-length").addClass("d-none");
    });
</script>
@endsection
