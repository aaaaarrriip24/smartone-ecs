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
        width: 100%;
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
            {{ GoogleTranslate::trans("Artikel", app()->getLocale()) }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white"
                        href="#">{{ GoogleTranslate::trans("Beranda", app()->getLocale()) }}</a></li>
                <li class="breadcrumb-item"><a class="text-white"
                        href="#">{{ GoogleTranslate::trans("Halaman", app()->getLocale()) }}</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">
                    {{ GoogleTranslate::trans("Artikel", app()->getLocale()) }}</li>
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
                {{ GoogleTranslate::trans("Potensi Kopi Nusantara Go Global", app()->getLocale()) }}
            </h3>

            <p class="text-justify">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ GoogleTranslate::trans("Kopi merupakan salah satu komoditi hasil perkebunan yang memiliki peranan cukup penting dalam perekonomian di Indonesia. Kopi juga merupakan salah satu komoditas ekspor yang telah menghasilkan devisa negara. Menurut BPS (2022), perkebunan kopi menurut pengusahaannya dibedakan menjadi Perkebunan Besar (PB) dan Perkebunan Rakyat (PR). Perkebunan Besar (PB) merupakan perkebunan yang dikelola secara komersial oleh perusahaan yang memiliki badan hukum, dan PB terdiri atas Perkebunan Besar Negara (PBN) dan Perkebunan Besar Swasta (PBS) Nasional atau Asing. Sementara itu, Perkebunan Rakyat (PR) merupakan perkebunan yang dikelola oleh rakyat atau pekebunan yang dikelompokkan dalam usaha kecil dan usaha rumah tangga.", app()->getLocale()) }}
            </p>

            <p class="text-justify">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ GoogleTranslate::trans("Berdasarkan data dari BPS (2021) dan BPS (2022) disebutkan bahwa total produksi kopi Indonesia pada tahun 2021 sebesar 786,2 ribu ton dengan rincian produksi kopi menurut status pengusahaan bahwa PR sebesar 780,9 ribu ton, PBN sebesar 4,1 ribu ton, dan PBS sebesar 1,2 ribu ton.", app()->getLocale()) }}
            </p>

            <p class="text-justify">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ GoogleTranslate::trans("Produksi kopi terbesar menurut provinsi tahun 2021 adalah Sumatera Selatan sebesar 27 persen, Lampung sebesar 15 persen, Sumatera Utara sebesar 10 persen, Aceh sebesar 9 persen, Bengkulu sebesar 8 persen, dan 28 provinsi lainnya sebesar 31 persen dari total produksi kopi nasional tahun 2021.", app()->getLocale()) }}
            </p>

            <p class="text-justify">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ GoogleTranslate::trans("Indonesia memiliki beberapa jenis kopi unggulan yang mendominasi pasar internasional. BPS (2022) menyebutkan pada tahun 2022 terdapat tiga jenis kopi dengan volume ekspor terbesar adalah Robusta, Arabica, dan Coffee Other Than Arabica WIB/Robusta OIB, yang menyumbang mayoritas ekspor kopi.", app()->getLocale()) }}
            </p>

            <ol>
                <li><p>{{ GoogleTranslate::trans("Robusta, Not Roasted, Not Decaffeinated (HS Code 0901113000), jenis kopi ini mencakup 86,13 persen dari total volume ekspor kopi Indonesia, menjadikannya kopi yang paling banyak diekspor.", app()->getLocale()) }}</p></li>
                <li><p>{{ GoogleTranslate::trans("Arabica, Not Roasted, Not Decaffeinated (HS Code 0901112000), jenis kopi dengan kontribusi sebesar 11,10 persen dari total volume ekspor.", app()->getLocale()) }}</p></li>
                <li><p>{{ GoogleTranslate::trans("Coffee Other Than Arabica WIB/Robusta OIB, Not Roasted, Not Decaffeinated (HS Code 0901190000), jenis kopi ini menyumbang 1,91 persen dari total volume ekspor.", app()->getLocale()) }}</p></li>
            </ol>

            <p class="text-justify">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ GoogleTranslate::trans("Total volume ekspor kopi pada tahun 2021 mencapai 387,3 ribu ton, kemudian meningkat menjadi 437,6 ribu ton pada tahun 2022. Peningkatan serupa juga terjadi pada nilai ekspor, yang mencapai US$ 1.148,4 juta pada tahun 2022, naik sebesar 33,76 persen.", app()->getLocale()) }}
            </p>

            <p class="text-justify">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ GoogleTranslate::trans("Berdasarkan data dari BPS, lima negara utama tujuan ekspor kopi Indonesia pada tahun 2023 adalah Amerika Serikat, Mesir, Jepang, Malaysia, dan India.", app()->getLocale()) }}
            </p>

            <p class="text-justify">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ GoogleTranslate::trans("Potensi kopi Indonesia sebagai salah satu produk unggulan sektor perkebunan membuka peluang signifikan bagi pelaku usaha untuk memperluas jangkauan pasar internasional. Kementerian Perdagangan berkomitmen untuk memberikan dukungan maksimal dalam meningkatkan ekspor.", app()->getLocale()) }}
            </p>

            <p class="text-muted mb-3">
                {{ GoogleTranslate::trans("Sumber: Badan Pusat Statistik. (2022-2024).", app()->getLocale()) }}
            </p>
            <a href="{{ url('/') }}"
                class="btn btn-primary mt-4">{{ GoogleTranslate::trans("Kembali ke Daftar Artikel", app()->getLocale()) }}</a>
        </div>
    </div>
</div>
<!-- Berita Detail End -->

@endsection
