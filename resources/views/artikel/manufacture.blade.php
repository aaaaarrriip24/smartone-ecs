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
        <h1 class="display-3 text-white mb-3 animated slideInDown">{{ __("Artikel") }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="#">{{ __("Beranda") }}</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">{{ __("Halaman") }}</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">{{ __("Artikel") }}</li>
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
                <img class="img-fluid w-25 mb-4" src="{{ asset('assets/images/ecs/icon_indonesia_great/Manufacture product.png') }}" alt="Default Image">
            </div>
            <h3 class="mb-3 text-center">{{ __("Potensi Ekspor Rempah-Rempah Indonesia") }}</h3>
            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __("Indonesia merupakan negara kepulauan yang memiliki kekayaan sumber daya alam, dan dikenal sebagai penghasil rempah-rempah sejak zaman dahulu. Badan Kebijakan Perdagangan (BKPerdag) pada tahun 2017,  menyampaikan bahwa Indonesia merupakan salah satu produsen rempah-rempah di dunia yang memiliki peluang besar sebagai pemasok rempah di dunia. Berdasarkan data dari Trade Map (2024), total nilai ekspor untuk komoditas kopi, teh, dan rempah-rempah Indonesia ke dunia mencapai US$ 1,7 milyar pada tahun 2021, dan sebesar US$1,9 milyar 2022, dan pada tahun 2023 tercata sedikit menurun taitu sebesar US$1,6 milyar. Penurunan nilai ekspor yang terjadi pada tahun 2023, meskipun cukup signifikan, masih menempatkan Indonesia sebagai salah satu eksportir utama dunia dalam sektor ini. Fluktuasi tersebut diperkirakan akibat berbagai faktor, mulai dari tantangan global seperti perubahan permintaan pasar, hingga gangguan rantai pasok akibat pandemi. Namun, potensi sektor rempah-rempah Indonesia tetap besar, didukung oleh kualitas produk yang diakui dunia internasional dan komitmen pemerintah serta pelaku usaha untuk memperkuat daya saing produk Indonesia di pasar global.") }}</p>
            <br>

            <h3 class="mb-3 text-center">Gambar 1</h3>
            <h3 class="mb-3 text-center"> Nilai Ekspor Komoditas Utama Rempah Indonesia Tahun 2019-2023 </h3>
            <img class="img-fluid w-100 mb-4" src="{{ asset('assets/images/ecs/icon_indonesia_great/Spicesdata.png') }}" alt="Default Image">
            <p class="text-muted mb-3">Sumber: Trade Map (2024)</p>

            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __("Berdasarkan data yang diperoleh dari Trade Map (2024) pada Gambar 1, komoditas utama rempah Indonesia yang diekspor pada tahun 2019-2024 meliputi Pala, Lada, Kayu Manis, Cengkeh, Jahe, dan Vanila. Komoditas pala, mencatat pertumbuhan yang impresif dari tahun 2019 hingga 2021 dengan nilai ekspor terbesar pada tahun 2021 sebesar US$274,9 juta, namun, terjadi penurunan pada tahun 2023, dimana nilai ekspor turun menjadi $239,2 juta.") }}</p>

            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __("Komoditas Lada juga merupakan salah satu komoditas unggulan yang mana mencatat nilai ekspor pada tahun 2021 sebesar US$174,9 juta, akan tetapi, setelah tahun 2021 menunjukkan penurunan yang signifikan, yang tercatat hanya sebesar US$117,5 juta di tahun 2023. Adapun komoditas Kayu Manis, yang juga mencatat nilai ekspor tertinggi di tahun 2021 dengan nilai ekspor sebesar US$160, 7 juta, namun, pada tahun berikutnya mengalami penurunan signifikan, yang tercatat hanya sebesar US$99,7 juta di tahun 2023.") }}</p>

            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __("Selanjutnya, komoditas Cengkeh mencatat nilai ekspor terbesar di tahun 2020 yang mencapai US$176,5 juta dan mengalami penurunan drastis pada tahun 2021 dan 2022. Namun, nilai ekspor Cengkeh mengalami peningkatan kembali pada tahun 2023 sebesar yang mencapai $99,6 juta. Sementara untuk komoditas Vanila justru terus menglami penurunan ekspor dari tahun 2019 hingga 2023, tercatat sebesar US$69,6 juta pada tahun 2019, dan terus mengalami penurunan dan tercatat hanya sebesar US$15,2 juta pada tahun 2023. Di sisi lain komoditas Jahe, justru memiliki tren positif tahun 2019-2023. Jahe, mencatat nilai ekspor sebesar US$18,5 juta pada tahun 2019, namun, pada tahun 2021 dan 2022 mengalami sedikit penurunan dan kembali mengalami peningkatan pada tahun 2023 menjadi sebesar US$41, 9 juta.") }}</p>

            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __("Secara keseluruhan, nilai ekspor komoditas utama rempah Indonesia yakni Pala, Lada, Kayu Manis, Cengkeh, Jahe dan Vanila menunjukkan fluktuasi selama periode 2019-2024. Perubahan nilai ekspor tersebut kemungkinan besar dipengaruhi oleh beberapa faktor seperti adanya perubahan permintaan global atau perubahan kebutuhan pasar, serta faktor kebijakan perdagangan suatu negara, dan adanya persaingan global. Meskipun demikian, komoditas tersebut tetap menjadi pilar penting dalam kinerja ekspor Indonesia dan memiliki potensi yang besar untuk mendukung pertumbuhan ekonomi di masa depan.") }}</p>

            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __("Data dari BPS (2024) menunjukkan bahwa sepuluh negara tujuan utama untuk ekspor komoditas Tanaman Obat, Aromatik, dan Rempah-Rempah adalah Thailand, China, Amerika Serikat, India, Vietnam, Belanda, Bangladesh, Jerman, Singapura, dan Pakistan. Nilai ekspor terbesar pada tahun 2023 mencapai US$ 127,1 juta ke China, sebesar US$ 64,4 juta ke India, dan sebesar US$ 46,3 juta ke Amerika Serikat.") }}</p>

            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __("Sebagai salah satu produsen rempah terbesar di dunia, Indonesia memiliki peluang yang sangat potensial untuk memperluas pasarnya ke seluruh dunia. Kualitas rempah-rempah Indonesia yang telah dikenal sejak zaman dahulu hingga kini terus diminati oleh pasar internasional. Oleh karena itu, upaya untuk meningkatkan ekspor harus menjadi prioritas, mengingat peluang yang besar dalam meningkatkan devisa negara serta kontribusi terhadap pertumbuhan ekonomi nasional.") }}</p>

            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __("Direktorat Jenderal Pengembangan Ekspor Nasional melalui Export Center Surabaya berperan aktif dalam mendukung para pelaku usaha rempah melalui berbagai program pembinaan dan pendampingan dengan tujuan dapat menembus pasar internasional serta memperluas jangkauan pasar. Melalui sinergi dan komitmen bersama, rempah-rempah Indonesia diharapkan mampu bersaing secara lebih efektif di pasar global, menciptakan peluang yang lebih luas dalam memajukan sektor ekspor.") }}</p>

            <a href="{{ url('/') }}" class="btn btn-primary mt-4">{{ __("Kembali ke Daftar Artikel") }}</a>
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
                            <h5 class="card-title">{{ __("Coffee") }}</h5>
                            <p class="card-text" style="font-size: 0.9rem; color: #555;">{{ Str::limit(__("Kopi merupakan salah satu komoditi hasil perkebunan yang memiliki peranan cukup penting dalam perekonomian di Indonesia. Kopi juga merupakan salah satu komoditas ekspor yang telah menghasilkan devisa negara. Menurut BPS (2022), perkebunan kopi menurut pengusahaannya dibedakan menjadi Perkebunan Besar (PB) dan Perkebunan Rakyat (PR). Perkebunan Besar (PB) merupakan perkebunan yang dikelola secara komersial oleh perusahaan yang memiliki badan hukum, dan PB terdiri atas Perkebunan Besar Negara (PBN) dan Perkebunan Besar Swasta (PBS) Nasional atau Asing. Sementara itu, Perkebunan Rakyat (PR) merupakan perkebunan yang dikelola oleh rakyat atau pekebunan yang dikelompokkan dalam usaha kecil dan usaha rumah tangga."), 70, '...') }}</p>
                            <a href="{{ url('artikel/coffee') }}" class="btn btn-primary">{{ __("Baca Selengkapnya") }}</a>
                        </div>
                    </div>
                </div>
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
