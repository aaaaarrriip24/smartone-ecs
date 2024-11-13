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
        <h1 class="display-3 text-white mb-3 animated slideInDown">{{ session('locale') == 'id' ? 'Artikel' : 'Article' }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="#">{{ session('locale') == 'id' ? 'Beranda' : 'Home' }}</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">{{ session('locale') == 'id' ? 'Halaman' : 'Pages' }}</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">{{ session('locale') == 'id' ? 'Artikel' : 'Article' }}</li>
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
            <h3 class="mb-3 text-center">{{ session('locale') == 'id' ? 'Potensi Ekspor Komoditas Perikanan Indonesia' : 'Export Potential of Indonesian Fishery Commodities' }}</h3>
            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ session('locale') == 'id' ? 'Indonesia merupakan salah satu negara maritim yang kaya akan sumber daya laut, hal tersebut menjadikan Indonesia sebagai salah satu pemasok produk perikanan dunia dan produk perikanan ini sebagai salah satu komoditas unggulan Indonesia yang memiliki potensi besar untuk diekspor. Menurut data dari Kementerian Kelautan dan Perikanan, sektor produksi perikanan Indonesia terbagi menjadi dua, yakni sektor produksi perikanan tangkap (Laut dan Perairan Umum) dan sektor perikanan budidaya.' : "Indonesia is one of the world’s major maritime nations, rich in marine resources, making it one of the leading suppliers of fishery products globally. These fishery products are among Indonesia's flagship commodities with high export potential. According to data from the Ministry of Marine Affairs and Fisheries, Indonesia’s fishery production sector is divided into two categories: capture fisheries (marine and inland waters) and aquaculture." }}</p>
            
            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ session('locale') == 'id' ? 'Total produksi perikanan selama tahun 2021 tercatat sebesar 21,8 juta dan pada tahun 2022 meningkat menjadi sebesar 22,1 juta ton, dan sebesar 24,7 juta ton pada tahun 2023 (KKP, 2024). Pertumbuhan produksi ini menandakan potensi besar pada sektor perikanan sebagai salah satu komoditas strategis untuk ekspor. ' : "Total fishery production in 2021 reached 21.8 million tons, rising to 22.1 million tons in 2022 and 24.7 million tons in 2023 (Ministry of Marine Affairs and Fisheries, 2024). This production growth highlights the enormous potential of the fishery sector as a strategic export commodity. " }}</p>

            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ session('locale') == 'id' ? 'Sektor produksi perikanan tangkap laut pada tahun pada tahun 2021 tercatat sebesar 6,9 juta ton dan meningkat menjadi 7,2 juta ton pada tahun 2022. Komoditas utama yang mendominasi sektor produksi perikanan tangkap laut adalah Udang, Tuna, Cakalang, dan Tongkol. Sementara itu, produksi perikanan tangkap di perairan umum juga menunjukkan peningkatan, dengan total tercatat 462,9 ribu ton pada tahun 2021 dan meningkat menjadi 521,7 ribu ton pada tahun 2022. Adapun komoditas utama yang mendominasi produksi perairan umum adalah jenis Ikan yang sama dan Udang.' : "The marine capture fisheries sector produced 6.9 million tons in 2021, increasing to 7.2 million tons in 2022. The primary commodities dominating this sector are shrimp, tuna, skipjack, and mackerel. Inland capture fisheries production also showed an increase, with a total of 462.9 thousand tons in 2021, rising to 521.7 thousand tons in 2022. The main species in inland fisheries include the same fish types and shrimp." }}</p>

            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ session('locale') == 'id' ? 'Produksi perikanan budidaya mencatat total produksi sebesar 14,8 juta ton pada tahun 2022 dan meningkat sebesar 16,9 juta ton pada tahun 2023. Adapun komoditas utama pada perikanan budidaya di tahun 2022-2023, antara lain Bandeng, Gurami, Ikan Lainnya, Kakap, Kerapu, Lele, Mas, Nila, Patin, Rumput Laut, dan Udang.' : "Aquaculture production totaled 14.8 million tons in 2022, rising to 16.9 million tons in 2023. Key aquaculture commodities in 2022-2023 include milkfish, gourami, other fish species, snapper, grouper, catfish, carp, tilapia, pangasius, seaweed, and shrimp." }}</p>

            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ session('locale') == 'id' ? 'Provinsi Sulawesi Selatan, Nusa Tenggara Timur, dan Jawa Timur tercatat sebagai tiga provinsi penghasil produk perikanan terbesar pada tahun 2022. Provinsi Sulawesi Selatan memiliki total produksi perikanan sebesar 4,5 juta ton pada tahun 2021 dan pada tahun 2020 menghasilkan jumlah yang sama yaitu 4,5 juta ton. Adapun Provinsi Nusa Tenggara Timur memiliki total produksi perikanan sebesar 1,6 juta ton pada tahun 2022 dan sebesar 1.554.565 ton pada tahun 2023. Sementara itu, Provinsi Jawa Timur memiliki total produksi perikanan sebesar 1.825.182 ton pada tahun 2022 dan sebesar 1,9 juta ton pada tahun 2023. Ketiga provinsi tersebut berkontribusi besar dalam menyuplai kebutuhan perikanan domestik maupun ekspor.' : "South Sulawesi, East Nusa Tenggara, and East Java are recorded as the top three fishery-producing provinces in 2022. South Sulawesi had a total fishery production of 4.5 million tons in 2021, with the same volume in 2022. East Nusa Tenggara had a total production of 1.6 million tons in 2022 and 1.554 million tons in 2023, while East Java had a total fishery production of 1.825 million tons in 2022, rising to 1.9 million tons in 2023. These three provinces play a significant role in supplying fishery needs for both domestic consumption and export. " }}</p>

            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ session('locale') == 'id' ? 'Meskipun produksi perikanan terus mengalami peningkatan, kinerja ekspor pada produk kelautan dan perikanan pada tahun 2023 justru mengalami sedikit penurunan dibandingkan dengan tahun sebelumnya. Volume ekspor produk perikanan tercatat mencapat 1,2 juta ton pada tahun 2022, sementara pada tahun 2023 tercatat malah mengalami penurunan dari sisi volume sebesar -0,23 persen dibandingan dengan tahun 2022. Penurunan serupa juga tercermin pada nilai ekspor produk perikanan yang tercatat sebesar US$ 5,63 miliar pada tahun 2023, turun sebesar 9,79 persen dibandingkan dengan tahun 2022. Meskipun demikian, jika dilihat dari tren lima tahun terakhir (2019-2023), volume ekspor produk perikanan Indonesia secara rata-rata mengalami pertumbuhan sebesar 0,84 persen, sedangkan nilai ekspornya naik sebesar 3,67 persen. ' : "Although fishery production has steadily increased, export performance of marine and fishery products declined slightly in 2023 compared to the previous year. The export volume of fishery products reached 1.2 million tons in 2022 but decreased in 2023, with a volume drop of -0.23% compared to 2022. Similarly, the export value of fishery products was recorded at USD 5.63 billion in 2023, down by 9.79% compared to 2022. Nevertheless, the five-year trend (2019-2023) shows that the export volume of Indonesian fishery products grew by an average of 0.84%, while the export value rose by 3.67%." }}</p>

            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ session('locale') == 'id' ? 'Komoditas utama hasil perikanan yang mendominasi ekspor Indonesia selama periode 2019-2023 adalah Udang, Lobster, Tuna, Tongkol, Cakalang, Mutiara, Rumput Laut, dan Rajungan Kepiting. Adapun negara tujuan ekspor terbesar untuk produk perikanan Indonesia pada tahun 2019-2023 diantaranya adalah China, Amerika Serikat, Jepang, Malaysia, Vietnam, dan Thailand. China merupakan negara tujuan utama dengan volume ekspor hasil perikanan terbesar selama tahun 2019- 2023. Kinerja ekspor ke China pada tahun 2023 tercatat sebesar 438,6 ribu ton, sementara pada tahun 2022 sebesar 403,7 ribu ton, artinya mengalami kenaikan sebesar 8,65 persen dibandingkan tahun 2022 (Kementerian Kelautan dan Perikanan, 2024).' : "Indonesia's primary export fishery commodities during the 2019-2023 period were shrimp, lobster, tuna, mackerel, skipjack, pearls, seaweed, and crab. The largest export destinations for Indonesian fishery products from 2019 to 2023 included China, the United States, Japan, Malaysia, Vietnam, and Thailand. China was the primary destination, with the largest export volume of fishery products during the 2019-2023 period. Exports to China reached 438.6 thousand tons in 2023, up from 403.7 thousand tons in 2022, an increase of 8.65% compared to the previous year (Ministry of Marine Affairs and Fisheries, 2024). " }}</p>

            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ session('locale') == 'id' ? 'Potensi ekspor produk perikanan Indonesia ini membuka peluang besar bagi pelaku usaha dalam negeri untuk terus meningkatkan kapasitas produksi dan memenuhi permintaan pasar internasional. Seiring dengan pertumbuhan permintaan global untuk produk perikanan yang berkelanjutan dan berkualitas tinggi, pelaku usaha di Indonesia diharapkan mampu memanfaatkan potensi besar ini dengan optimal. Dalam hal ini, dukungan dari Kementerian Perdagangan melalui Export Center Surabaya, akan sangat penting untuk memperkuat daya saing produk perikanan Indonesia di pasar global dan diharapkan ekspor perikanan Indonesia dapat terus berkembang, memberikan kontribusi signifikan bagi pertumbuhan ekonomi nasional.' : "This export potential offers substantial opportunities for domestic business players to continuously expand production capacity and meet international market demand. With the growing global demand for sustainable and high-quality fishery products, Indonesian business players are expected to capitalize on this potential optimally. In this regard, support from the Ministry of Trade through the Surabaya Export Center will be essential to strengthen the competitiveness of Indonesian fishery products in global markets, enabling Indonesia’s fishery exports to continue growing and significantly contribute to national economic growth." }}</p>

            <p class="text-muted mb-3">{{ session('locale') == 'id' ? 'Sumber: Kementerian Kelautan dan Perikanan. (2024). ANALISIS INDIKATOR KINERJA UTAMA SEKTOR KELAUTAN DAN PERIKANAN KURUN WAKTU 2019-2023: Vol. Volume 2. Pusat Data, Statistik dan Informasi.' : "Source: Ministry of Marine Affairs and Fisheries. (2024). ANALYSIS OF KEY PERFORMANCE INDICATORS OF MARINE AND FISHERIES SECTOR FOR THE PERIOD 2019-2023: Vol. Volume 2. Center for Data, Statistics and Information."}}</p>
            <a href="{{ url('/') }}" class="btn btn-primary mt-4">{{ session('locale') == 'id' ? 'Kembali ke Daftar Artikel' : 'Back to Article List' }}</a>
        </div>

    </div>
</div>
<!-- Berita Detail End -->

@endsection
