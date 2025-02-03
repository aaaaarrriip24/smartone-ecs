@extends('layouts.users')
@section('content')
<style>
    .img-container {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .img-container img {
        transition: transform 0.3s ease;
        height: auto;
        /* Menjaga aspek rasio */
    }

    .img-container:hover img {
        transform: scale(1.05);
    }

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        /* Efek shadow saat hover */
    }

    .small-img {
        width: 50%;
        height: auto;
        /* Menjaga proporsi gambar */
        transition: transform 0.3s ease;
    }

    .small-img:hover {
        transform: scale(1.05);
    }

</style>

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow border-top border-5 border-primary sticky-top p-0">
    <a href="{{ url('/') }}" class="navbar-brand bg-white d-flex align-items-center px-4 px-lg-5">
        <img src="{{ asset('assets/images/kemendag.png')}}"
            style="background: white; width: 180px; display: inline-block;" alt="">
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
        <h1 class="display-3 text-white mb-3 animated slideInDown">
            {{ __("Artikel") }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white"
                        href="#">{{ __("Beranda") }}</a></li>
                <li class="breadcrumb-item"><a class="text-white"
                        href="#">{{ __("Halaman") }}</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">
                    {{ __("Artikel") }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Berita Detail Start -->
<div class="container-fluid px-5">
    <div class="row">
        <div class="col-md-8">
            <div class="d-flex justify-content-center">
                <img class="img-fluid w-25 mb-4" src="{{ asset('assets/images/ecs/icon_indonesia_great/Coffee.png') }}"
                    alt="Coffee Icon">
            </div>
            <h3 class="mb-3 text-center">
                {{ __("Potensi Kopi Nusantara Go Global") }}
            </h3>

            <p class="text-justify">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __("Kopi merupakan salah satu komoditi hasil perkebunan yang memiliki peranan cukup penting dalam perekonomian di Indonesia. Kopi juga merupakan salah satu komoditas ekspor yang telah menghasilkan devisa negara. Menurut BPS (2022), perkebunan kopi menurut pengusahaannya dibedakan menjadi Perkebunan Besar (PB) dan Perkebunan Rakyat (PR). Perkebunan Besar (PB) merupakan perkebunan yang dikelola secara komersial oleh perusahaan yang memiliki badan hukum, dan PB terdiri atas Perkebunan Besar Negara (PBN) dan Perkebunan Besar Swasta (PBS) Nasional atau Asing. Sementara itu, Perkebunan Rakyat (PR) merupakan perkebunan yang dikelola oleh rakyat atau pekebunan yang dikelompokkan dalam usaha kecil dan usaha rumah tangga.") }}
            </p>

            <p class="text-justify">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __("Berdasarkan data dari BPS (2021) dan BPS (2022) disebutkan bahwa total produksi kopi Indonesia pada tahun 2021 sebesar 786,2 ribu ton dengan rincian produksi kopi menurut status pengusahaan bahwa PR sebesar 780,9 ribu ton, PBN sebesar 4,1 ribu ton, dan PBS sebesar 1,2 ribu ton.") }}
            </p>

            <p class="text-justify">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __("Produksi kopi terbesar menurut provinsi tahun 2021 adalah Sumatera Selatan sebesar 27 persen, Lampung sebesar 15 persen, Sumatera Utara sebesar 10 persen, Aceh sebesar 9 persen, Bengkulu sebesar 8 persen, dan 28 provinsi lainnya sebesar 31 persen dari total produksi kopi nasional tahun 2021.") }}
            </p>

            <p class="text-justify">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __("Indonesia memiliki beberapa jenis kopi unggulan yang mendominasi pasar internasional. BPS (2022) menyebutkan pada tahun 2022 terdapat tiga jenis kopi dengan volume ekspor terbesar adalah Robusta, Arabica, dan Coffee Other Than Arabica WIB/Robusta OIB, yang menyumbang mayoritas ekspor kopi.") }}
            </p>

            <ol>
                <li><p>{{ __("Robusta, Not Roasted, Not Decaffeinated (HS Code 0901113000), jenis kopi ini mencakup 86,13 persen dari total volume ekspor kopi Indonesia, menjadikannya kopi yang paling banyak diekspor.") }}</p></li>
                <li><p>{{ __("Arabica, Not Roasted, Not Decaffeinated (HS Code 0901112000), jenis kopi dengan kontribusi sebesar 11,10 persen dari total volume ekspor.") }}</p></li>
                <li><p>{{ __("Coffee Other Than Arabica WIB/Robusta OIB, Not Roasted, Not Decaffeinated (HS Code 0901190000), jenis kopi ini menyumbang 1,91 persen dari total volume ekspor.") }}</p></li>
            </ol>

            <p class="text-justify">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __("Total volume ekspor kopi pada tahun 2021 mencapai 387,3 ribu ton, kemudian meningkat menjadi 437,6 ribu ton pada tahun 2022. Peningkatan serupa juga terjadi pada nilai ekspor, yang mencapai US$ 1.148,4 juta pada tahun 2022, naik sebesar 33,76 persen.") }}
            </p>

            <p class="text-justify">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __("Berdasarkan data dari BPS, lima negara utama tujuan ekspor kopi Indonesia pada tahun 2023 adalah Amerika Serikat, Mesir, Jepang, Malaysia, dan India.") }}
            </p>

            <p class="text-justify">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __("Potensi kopi Indonesia sebagai salah satu produk unggulan sektor perkebunan membuka peluang signifikan bagi pelaku usaha untuk memperluas jangkauan pasar internasional. Kementerian Perdagangan berkomitmen untuk memberikan dukungan maksimal dalam meningkatkan ekspor.") }}
            </p>

            <p class="text-muted mb-3">
                {{ __("Sumber: Badan Pusat Statistik. (2022-2024).") }}
            </p>
            <a href="{{ url('/') }}"
                class="btn btn-primary mt-4">{{ __("Kembali ke Daftar Artikel") }}</a>
        </div>

        <!-- Berita Lainnya Start -->
        <div class="col-md-4">
            <div class="row g-4 mt-3">
                <div class="col-12 mb-3">
                    <div class="card" style="border-radius: 10px; width: 75%; margin: auto;">
                        <div class="img-container text-center" style="overflow: hidden; border-radius: 10px 10px 0 0;">
                            <img class="img-fluid w-50 p-2" src="{{ asset('assets/images/ecs/icon_indonesia_great/Fish.png') }}" alt="Berita Image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ __("Fish") }}</h5>
                            <p class="card-text" style="font-size: 0.9rem; color: #555;">{{ Str::limit(__("Indonesia merupakan salah satu negara maritim yang kaya akan sumber daya laut, hal tersebut menjadikan Indonesia sebagai salah satu pemasok produk perikanan dunia dan produk perikanan ini sebagai salah satu komoditas unggulan Indonesia yang memiliki potensi besar untuk diekspor. Menurut data dari Kementerian Kelautan dan Perikanan, sektor produksi perikanan Indonesia terbagi menjadi dua, yakni sektor produksi perikanan tangkap (Laut dan Perairan Umum) dan sektor perikanan budidaya."), 70, '...') }}</p>
                            <a href="{{ url('artikel/fish') }}" class="btn btn-primary">{{ __("Baca Selengkapnya") }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="card" style="border-radius: 10px; width: 75%; margin: auto;">
                        <div class="img-container text-center" style="overflow: hidden; border-radius: 10px 10px 0 0;">
                            <img class="img-fluid w-50 p-2" src="{{ asset('assets/images/ecs/icon_indonesia_great/Food Processing.png') }}" alt="Berita Image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ __("Food Processing") }}</h5>
                            <p class="card-text" style="font-size: 0.9rem; color: #555;">{{ Str::limit(__("Berdasarkan data yang diperoleh dari Trade Map (2024) pada Gambar 1, komoditas utama rempah Indonesia yang diekspor pada tahun 2019-2024 meliputi Pala, Lada, Kayu Manis, Cengkeh, Jahe, dan Vanila. Komoditas pala, mencatat pertumbuhan yang impresif dari tahun 2019 hingga 2021 dengan nilai ekspor terbesar pada tahun 2021 sebesar US$274,9 juta, namun, terjadi penurunan pada tahun 2023, dimana nilai ekspor turun menjadi $239,2 juta."), 70, '...') }}</p>
                            <a href="{{ url('artikel/food') }}" class="btn btn-primary">{{ __("Baca Selengkapnya") }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="card" style="border-radius: 10px; width: 75%; margin: auto;">
                        <div class="img-container text-center" style="overflow: hidden; border-radius: 10px 10px 0 0;">
                            <img class="img-fluid w-50 p-2" src="{{ asset('assets/images/ecs/icon_indonesia_great/Furniture.png') }}" alt="Berita Image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ __("Furniture") }}</h5>
                            <p class="card-text" style="font-size: 0.9rem; color: #555;">{{ Str::limit(__("Berdasarkan data yang diperoleh dari Trade Map (2024) pada Gambar 1, komoditas utama rempah Indonesia yang diekspor pada tahun 2019-2024 meliputi Pala, Lada, Kayu Manis, Cengkeh, Jahe, dan Vanila. Komoditas pala, mencatat pertumbuhan yang impresif dari tahun 2019 hingga 2021 dengan nilai ekspor terbesar pada tahun 2021 sebesar US$274,9 juta, namun, terjadi penurunan pada tahun 2023, dimana nilai ekspor turun menjadi $239,2 juta."), 70, '...') }}</p>
                            <a href="{{ url('artikel/furniture') }}" class="btn btn-primary">{{ __("Baca Selengkapnya") }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="card" style="border-radius: 10px; width: 75%; margin: auto;">
                        <div class="img-container text-center" style="overflow: hidden; border-radius: 10px 10px 0 0;">
                            <img class="img-fluid w-50 p-2" src="{{ asset('assets/images/ecs/icon_indonesia_great/Manufacture Product.png') }}" alt="Berita Image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ __("Manufacture") }}</h5>
                            <p class="card-text" style="font-size: 0.9rem; color: #555;">{{ Str::limit(__("Berdasarkan data yang diperoleh dari Trade Map (2024) pada Gambar 1, komoditas utama rempah Indonesia yang diekspor pada tahun 2019-2024 meliputi Pala, Lada, Kayu Manis, Cengkeh, Jahe, dan Vanila. Komoditas pala, mencatat pertumbuhan yang impresif dari tahun 2019 hingga 2021 dengan nilai ekspor terbesar pada tahun 2021 sebesar US$274,9 juta, namun, terjadi penurunan pada tahun 2023, dimana nilai ekspor turun menjadi $239,2 juta."), 70, '...') }}</p>
                            <a href="{{ url('artikel/manufacture') }}" class="btn btn-primary">{{ __("Baca Selengkapnya") }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="card" style="border-radius: 10px; width: 75%; margin: auto;">
                        <div class="img-container text-center" style="overflow: hidden; border-radius: 10px 10px 0 0;">
                            <img class="img-fluid w-50 p-2" src="{{ asset('assets/images/ecs/icon_indonesia_great/Spices.png') }}" alt="Berita Image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ __("Spices") }}</h5>
                            <p class="card-text" style="font-size: 0.9rem; color: #555;">{{ Str::limit(__("Berdasarkan data yang diperoleh dari Trade Map (2024) pada Gambar 1, komoditas utama rempah Indonesia yang diekspor pada tahun 2019-2024 meliputi Pala, Lada, Kayu Manis, Cengkeh, Jahe, dan Vanila. Komoditas pala, mencatat pertumbuhan yang impresif dari tahun 2019 hingga 2021 dengan nilai ekspor terbesar pada tahun 2021 sebesar US$274,9 juta, namun, terjadi penurunan pada tahun 2023, dimana nilai ekspor turun menjadi $239,2 juta."), 70, '...') }}</p>
                            <a href="{{ url('artikel/spices') }}" class="btn btn-primary">{{ __("Baca Selengkapnya") }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Berita Lainnya End -->
    </div>
</div>
<!-- Berita Detail End -->

@endsection
