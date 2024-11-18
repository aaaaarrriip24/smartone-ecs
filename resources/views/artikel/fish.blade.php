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
        height: auto; /* Menjaga aspek rasio */
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
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Efek shadow saat hover */
    }

    .small-img {
        width: 100%;
        height: auto; /* Menjaga proporsi gambar */
        transition: transform 0.3s ease;
    }

    .small-img:hover {
        transform: scale(1.05);
    }
</style>

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow border-top border-5 border-primary sticky-top p-0">
    <a href="{{ url('/') }}" class="navbar-brand bg-white d-flex align-items-center px-4 px-lg-5">
        <img src="{{ asset('assets/images/kemendag.png')}}" style="background: white; width: 180px; display: inline-block;" alt="">
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
        <h1 class="display-3 text-white mb-3 animated slideInDown">{{ GoogleTranslate::trans("Artikel", app()->getLocale()) }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="#">{{ GoogleTranslate::trans("Beranda", app()->getLocale()) }}</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">{{ GoogleTranslate::trans("Halaman", app()->getLocale()) }}</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">{{ GoogleTranslate::trans("Artikel", app()->getLocale()) }}</li>
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
                <img class="img-fluid w-25 mb-4" src="{{ asset('assets/images/ecs/icon_indonesia_great/Fish.png') }}" alt="Default Image">
            </div>
            <h3 class="mb-3 text-center">{{ GoogleTranslate::trans("Potensi Ekspor Komoditas Perikanan Indonesia", app()->getLocale()) }}</h3>
            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ GoogleTranslate::trans("Indonesia merupakan salah satu negara maritim yang kaya akan sumber daya laut, hal tersebut menjadikan Indonesia sebagai salah satu pemasok produk perikanan dunia dan produk perikanan ini sebagai salah satu komoditas unggulan Indonesia yang memiliki potensi besar untuk diekspor. Menurut data dari Kementerian Kelautan dan Perikanan, sektor produksi perikanan Indonesia terbagi menjadi dua, yakni sektor produksi perikanan tangkap (Laut dan Perairan Umum) dan sektor perikanan budidaya.", app()->getLocale()) }}</p>
            
            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ GoogleTranslate::trans("Total produksi perikanan selama tahun 2021 tercatat sebesar 21,8 juta dan pada tahun 2022 meningkat menjadi sebesar 22,1 juta ton, dan sebesar 24,7 juta ton pada tahun 2023 (KKP, 2024). Pertumbuhan produksi ini menandakan potensi besar pada sektor perikanan sebagai salah satu komoditas strategis untuk ekspor.", app()->getLocale()) }}</p>

            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ GoogleTranslate::trans("Sektor produksi perikanan tangkap laut pada tahun pada tahun 2021 tercatat sebesar 6,9 juta ton dan meningkat menjadi 7,2 juta ton pada tahun 2022. Komoditas utama yang mendominasi sektor produksi perikanan tangkap laut adalah Udang, Tuna, Cakalang, dan Tongkol. Sementara itu, produksi perikanan tangkap di perairan umum juga menunjukkan peningkatan, dengan total tercatat 462,9 ribu ton pada tahun 2021 dan meningkat menjadi 521,7 ribu ton pada tahun 2022. Adapun komoditas utama yang mendominasi produksi perairan umum adalah jenis Ikan yang sama dan Udang.", app()->getLocale()) }}</p>

            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ GoogleTranslate::trans("Produksi perikanan budidaya mencatat total produksi sebesar 14,8 juta ton pada tahun 2022 dan meningkat sebesar 16,9 juta ton pada tahun 2023. Adapun komoditas utama pada perikanan budidaya di tahun 2022-2023, antara lain Bandeng, Gurami, Ikan Lainnya, Kakap, Kerapu, Lele, Mas, Nila, Patin, Rumput Laut, dan Udang.", app()->getLocale()) }}</p>

            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ GoogleTranslate::trans("Provinsi Sulawesi Selatan, Nusa Tenggara Timur, dan Jawa Timur tercatat sebagai tiga provinsi penghasil produk perikanan terbesar pada tahun 2022. Provinsi Sulawesi Selatan memiliki total produksi perikanan sebesar 4,5 juta ton pada tahun 2021 dan pada tahun 2020 menghasilkan jumlah yang sama yaitu 4,5 juta ton. Adapun Provinsi Nusa Tenggara Timur memiliki total produksi perikanan sebesar 1,6 juta ton pada tahun 2022 dan sebesar 1.554.565 ton pada tahun 2023. Sementara itu, Provinsi Jawa Timur memiliki total produksi perikanan sebesar 1.825.182 ton pada tahun 2022 dan sebesar 1,9 juta ton pada tahun 2023. Ketiga provinsi tersebut berkontribusi besar dalam menyuplai kebutuhan perikanan domestik maupun ekspor.", app()->getLocale()) }}</p>

            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ GoogleTranslate::trans("Meskipun produksi perikanan terus mengalami peningkatan, kinerja ekspor pada produk kelautan dan perikanan pada tahun 2023 justru mengalami sedikit penurunan dibandingkan dengan tahun sebelumnya. Volume ekspor produk perikanan tercatat mencapat 1,2 juta ton pada tahun 2022, sementara pada tahun 2023 tercatat malah mengalami penurunan dari sisi volume sebesar -0,23 persen dibandingan dengan tahun 2022. Penurunan serupa juga tercermin pada nilai ekspor produk perikanan yang tercatat sebesar US$ 5,63 miliar pada tahun 2023, turun sebesar 9,79 persen dibandingkan dengan tahun 2022. Meskipun demikian, jika dilihat dari tren lima tahun terakhir (2019-2023), volume ekspor produk perikanan Indonesia secara rata-rata mengalami pertumbuhan sebesar 0,84 persen, sedangkan nilai ekspornya naik sebesar 3,67 persen.", app()->getLocale()) }}</p>

            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ GoogleTranslate::trans("Komoditas utama hasil perikanan yang mendominasi ekspor Indonesia selama periode 2019-2023 adalah Udang, Lobster, Tuna, Tongkol, Cakalang, Mutiara, Rumput Laut, dan Rajungan Kepiting. Adapun negara tujuan ekspor terbesar untuk produk perikanan Indonesia pada tahun 2019-2023 diantaranya adalah China, Amerika Serikat, Jepang, Malaysia, Vietnam, dan Thailand. China merupakan negara tujuan utama dengan volume ekspor hasil perikanan terbesar selama tahun 2019- 2023. Kinerja ekspor ke China pada tahun 2023 tercatat sebesar 438,6 ribu ton, sementara pada tahun 2022 sebesar 403,7 ribu ton, artinya mengalami kenaikan sebesar 8,65 persen dibandingkan tahun 2022 (Kementerian Kelautan dan Perikanan, 2024).", app()->getLocale()) }}</p>

            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ GoogleTranslate::trans("Potensi ekspor produk perikanan Indonesia ini membuka peluang besar bagi pelaku usaha dalam negeri untuk terus meningkatkan kapasitas produksi dan memenuhi permintaan pasar internasional. Seiring dengan pertumbuhan permintaan global untuk produk perikanan yang berkelanjutan dan berkualitas tinggi, pelaku usaha di Indonesia diharapkan mampu memanfaatkan potensi besar ini dengan optimal. Dalam hal ini, dukungan dari Kementerian Perdagangan melalui Export Center Surabaya, akan sangat penting untuk memperkuat daya saing produk perikanan Indonesia di pasar global dan diharapkan ekspor perikanan Indonesia dapat terus berkembang, memberikan kontribusi signifikan bagi pertumbuhan ekonomi nasional.", app()->getLocale()) }}</p>

            <p class="text-muted mb-3">{{ GoogleTranslate::trans("Sumber: Kementerian Kelautan dan Perikanan. (2024). ANALISIS INDIKATOR KINERJA UTAMA SEKTOR KELAUTAN DAN PERIKANAN KURUN WAKTU 2019-2023: Vol. Volume 2. Pusat Data, Statistik dan Informasi.", app()->getLocale())}}</p>
            <a href="{{ url('/') }}" class="btn btn-primary mt-4">{{ GoogleTranslate::trans("Kembali ke Daftar Artikel", app()->getLocale()) }}</a>
        </div>

        <!-- Berita Lainnya Start -->
        <div class="col-md-4">
            <div class="row g-4 mt-3">
                <div class="col-12 mb-3">
                    <div class="card" style="border-radius: 10px; width: 75%; margin: auto;">
                        <div class="img-container text-center" style="overflow: hidden; border-radius: 10px 10px 0 0;">
                            <img class="img-fluid w-50 p-2" src="{{ asset('assets/images/ecs/icon_indonesia_great/Coffee.png') }}" alt="Berita Image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ GoogleTranslate::trans("Coffee", app()->getLocale()) }}</h5>
                            <p class="card-text" style="font-size: 0.9rem; color: #555;">{{ Str::limit(GoogleTranslate::trans("Kopi merupakan salah satu komoditi hasil perkebunan yang memiliki peranan cukup penting dalam perekonomian di Indonesia. Kopi juga merupakan salah satu komoditas ekspor yang telah menghasilkan devisa negara. Menurut BPS (2022), perkebunan kopi menurut pengusahaannya dibedakan menjadi Perkebunan Besar (PB) dan Perkebunan Rakyat (PR). Perkebunan Besar (PB) merupakan perkebunan yang dikelola secara komersial oleh perusahaan yang memiliki badan hukum, dan PB terdiri atas Perkebunan Besar Negara (PBN) dan Perkebunan Besar Swasta (PBS) Nasional atau Asing. Sementara itu, Perkebunan Rakyat (PR) merupakan perkebunan yang dikelola oleh rakyat atau pekebunan yang dikelompokkan dalam usaha kecil dan usaha rumah tangga.", app()->getLocale()), 70, '...') }}</p>
                            <a href="{{ url('artikel/coffee') }}" class="btn btn-primary">{{ GoogleTranslate::trans("Baca Selengkapnya", app()->getLocale()) }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="card" style="border-radius: 10px; width: 75%; margin: auto;">
                        <div class="img-container text-center" style="overflow: hidden; border-radius: 10px 10px 0 0;">
                            <img class="img-fluid w-50 p-2" src="{{ asset('assets/images/ecs/icon_indonesia_great/Food Processing.png') }}" alt="Berita Image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ GoogleTranslate::trans("Food Processing", app()->getLocale()) }}</h5>
                            <p class="card-text" style="font-size: 0.9rem; color: #555;">{{ Str::limit(GoogleTranslate::trans("Berdasarkan data yang diperoleh dari Trade Map (2024) pada Gambar 1, komoditas utama rempah Indonesia yang diekspor pada tahun 2019-2024 meliputi Pala, Lada, Kayu Manis, Cengkeh, Jahe, dan Vanila. Komoditas pala, mencatat pertumbuhan yang impresif dari tahun 2019 hingga 2021 dengan nilai ekspor terbesar pada tahun 2021 sebesar US$274,9 juta, namun, terjadi penurunan pada tahun 2023, dimana nilai ekspor turun menjadi $239,2 juta.", app()->getLocale()), 70, '...') }}</p>
                            <a href="{{ url('artikel/food') }}" class="btn btn-primary">{{ GoogleTranslate::trans("Baca Selengkapnya", app()->getLocale()) }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="card" style="border-radius: 10px; width: 75%; margin: auto;">
                        <div class="img-container text-center" style="overflow: hidden; border-radius: 10px 10px 0 0;">
                            <img class="img-fluid w-50 p-2" src="{{ asset('assets/images/ecs/icon_indonesia_great/Furniture.png') }}" alt="Berita Image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ GoogleTranslate::trans("Furniture", app()->getLocale()) }}</h5>
                            <p class="card-text" style="font-size: 0.9rem; color: #555;">{{ Str::limit(GoogleTranslate::trans("Berdasarkan data yang diperoleh dari Trade Map (2024) pada Gambar 1, komoditas utama rempah Indonesia yang diekspor pada tahun 2019-2024 meliputi Pala, Lada, Kayu Manis, Cengkeh, Jahe, dan Vanila. Komoditas pala, mencatat pertumbuhan yang impresif dari tahun 2019 hingga 2021 dengan nilai ekspor terbesar pada tahun 2021 sebesar US$274,9 juta, namun, terjadi penurunan pada tahun 2023, dimana nilai ekspor turun menjadi $239,2 juta.", app()->getLocale()), 70, '...') }}</p>
                            <a href="{{ url('artikel/furniture') }}" class="btn btn-primary">{{ GoogleTranslate::trans("Baca Selengkapnya", app()->getLocale()) }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="card" style="border-radius: 10px; width: 75%; margin: auto;">
                        <div class="img-container text-center" style="overflow: hidden; border-radius: 10px 10px 0 0;">
                            <img class="img-fluid w-50 p-2" src="{{ asset('assets/images/ecs/icon_indonesia_great/Manufacture Product.png') }}" alt="Berita Image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ GoogleTranslate::trans("Manufacture", app()->getLocale()) }}</h5>
                            <p class="card-text" style="font-size: 0.9rem; color: #555;">{{ Str::limit(GoogleTranslate::trans("Berdasarkan data yang diperoleh dari Trade Map (2024) pada Gambar 1, komoditas utama rempah Indonesia yang diekspor pada tahun 2019-2024 meliputi Pala, Lada, Kayu Manis, Cengkeh, Jahe, dan Vanila. Komoditas pala, mencatat pertumbuhan yang impresif dari tahun 2019 hingga 2021 dengan nilai ekspor terbesar pada tahun 2021 sebesar US$274,9 juta, namun, terjadi penurunan pada tahun 2023, dimana nilai ekspor turun menjadi $239,2 juta.", app()->getLocale()), 70, '...') }}</p>
                            <a href="{{ url('artikel/manufacture') }}" class="btn btn-primary">{{ GoogleTranslate::trans("Baca Selengkapnya", app()->getLocale()) }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="card" style="border-radius: 10px; width: 75%; margin: auto;">
                        <div class="img-container text-center" style="overflow: hidden; border-radius: 10px 10px 0 0;">
                            <img class="img-fluid w-50 p-2" src="{{ asset('assets/images/ecs/icon_indonesia_great/Spices.png') }}" alt="Berita Image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ GoogleTranslate::trans("Spices", app()->getLocale()) }}</h5>
                            <p class="card-text" style="font-size: 0.9rem; color: #555;">{{ Str::limit(GoogleTranslate::trans("Berdasarkan data yang diperoleh dari Trade Map (2024) pada Gambar 1, komoditas utama rempah Indonesia yang diekspor pada tahun 2019-2024 meliputi Pala, Lada, Kayu Manis, Cengkeh, Jahe, dan Vanila. Komoditas pala, mencatat pertumbuhan yang impresif dari tahun 2019 hingga 2021 dengan nilai ekspor terbesar pada tahun 2021 sebesar US$274,9 juta, namun, terjadi penurunan pada tahun 2023, dimana nilai ekspor turun menjadi $239,2 juta.", app()->getLocale()), 70, '...') }}</p>
                            <a href="{{ url('artikel/spices') }}" class="btn btn-primary">{{ GoogleTranslate::trans("Baca Selengkapnya", app()->getLocale()) }}</a>
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
