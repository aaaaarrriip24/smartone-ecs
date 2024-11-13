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
                <img class="img-fluid w-25 mb-4" src="{{ asset('assets/images/ecs/icon_indonesia_great/Manufacture product.png') }}" alt="Default Image">
            </div>
            <h3 class="mb-3 text-center">{{ session('locale') == 'id' ? 'Potensi Ekspor Rempah-Rempah Indonesia' : 'Potential of Indonesian Spice Exports' }}</h3>
            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ session('locale') == 'id' ? 'Indonesia merupakan negara kepulauan yang memiliki kekayaan sumber daya alam, dan dikenal sebagai penghasil rempah-rempah sejak zaman dahulu. Badan Kebijakan Perdagangan (BKPerdag) pada tahun 2017,  menyampaikan bahwa Indonesia merupakan salah satu produsen rempah-rempah di dunia yang memiliki peluang besar sebagai pemasok rempah di dunia. Berdasarkan data dari Trade Map (2024), total nilai ekspor untuk komoditas kopi, teh, dan rempah-rempah Indonesia ke dunia mencapai US$ 1,7 milyar pada tahun 2021, dan sebesar US$1,9 milyar 2022, dan pada tahun 2023 tercata sedikit menurun taitu sebesar US$1,6 milyar. Penurunan nilai ekspor yang terjadi pada tahun 2023, meskipun cukup signifikan, masih menempatkan Indonesia sebagai salah satu eksportir utama dunia dalam sektor ini. Fluktuasi tersebut diperkirakan akibat berbagai faktor, mulai dari tantangan global seperti perubahan permintaan pasar, hingga gangguan rantai pasok akibat pandemi. Namun, potensi sektor rempah-rempah Indonesia tetap besar, didukung oleh kualitas produk yang diakui dunia internasional dan komitmen pemerintah serta pelaku usaha untuk memperkuat daya saing produk Indonesia di pasar global.' : "Indonesia is an archipelagic country that has rich natural resources, and has been known as a producer of spices since ancient times. The Trade Policy Agency (BKPerdag) in 2017, stated that Indonesia is one of the world's spice producers that has great potential as a supplier of spices in the world. Based on data from the Trade Map (2024), the total export value for Indonesian coffee, tea, and spice commodities to the world reached US$ 1.7 billion in 2021, and US$ 1.9 billion in 2022, and in 2023 it was recorded to have decreased slightly, namely US$ 1.6 billion. The decline in export value that occurred in 2023, although quite significant, still places Indonesia as one of the world's main exporters in this sector. This fluctuation is estimated to be due to various factors, ranging from global challenges such as changes in market demand, to supply chain disruptions due to the pandemic. However, the potential of the Indonesian spice sector remains large, supported by the quality of products that are recognized internationally and the commitment of the government and business actors to strengthen the competitiveness of Indonesian products in the global market." }}</p>
            <br>

            <h3 class="mb-3 text-center">Gambar 1</h3>
            <h3 class="mb-3 text-center"> Nilai Ekspor Komoditas Utama Rempah Indonesia Tahun 2019-2023 </h3>
            <img class="img-fluid w-100 mb-4" src="{{ asset('assets/images/ecs/icon_indonesia_great/Spicesdata.png') }}" alt="Default Image">
            <p class="text-muted mb-3">Sumber: Trade Map (2024)</p>

            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ session('locale') == 'id' ? 'Berdasarkan data yang diperoleh dari Trade Map (2024) pada Gambar 1, komoditas utama rempah Indonesia yang diekspor pada tahun 2019-2024 meliputi Pala, Lada, Kayu Manis, Cengkeh, Jahe, dan Vanila. Komoditas pala, mencatat pertumbuhan yang impresif dari tahun 2019 hingga 2021 dengan nilai ekspor terbesar pada tahun 2021 sebesar US$274,9 juta, namun, terjadi penurunan pada tahun 2023, dimana nilai ekspor turun menjadi $239,2 juta.' : "Based on data obtained from the Trade Map (2024) in Figure 1, Indonesia's main spice commodities exported in 2019-2024 include Nutmeg, Pepper, Cinnamon, Cloves, Ginger, and Vanilla. Nutmeg recorded impressive growth from 2019 to 2021 with the largest export value in 2021 of US$274.9 million, however, there was a decline in 2023, where the export value fell to $239.2 million." }}</p>

            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ session('locale') == 'id' ? 'Komoditas Lada juga merupakan salah satu komoditas unggulan yang mana mencatat nilai ekspor pada tahun 2021 sebesar US$174,9 juta, akan tetapi, setelah tahun 2021 menunjukkan penurunan yang signifikan, yang tercatat hanya sebesar US$117,5 juta di tahun 2023. Adapun komoditas Kayu Manis, yang juga mencatat nilai ekspor tertinggi di tahun 2021 dengan nilai ekspor sebesar US$160, 7 juta, namun, pada tahun berikutnya mengalami penurunan signifikan, yang tercatat hanya sebesar US$99,7 juta di tahun 2023.' : "Pepper is also one of the leading commodities which recorded an export value in 2021 of US$174.9 million, however, after 2021 it showed a significant decline, which was recorded at only US$117.5 million in 2023. As for the Cinnamon commodity, which also recorded the highest export value in 2021 with an export value of US$160.7 million, however, in the following year it experienced a significant decline, which was recorded at only US$99.7 million in 2023." }}</p>

            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ session('locale') == 'id' ? 'Selanjutnya, komoditas Cengkeh mencatat nilai ekspor terbesar di tahun 2020 yang mencapai US$176,5 juta dan mengalami penurunan drastis pada tahun 2021 dan 2022. Namun, nilai ekspor Cengkeh mengalami peningkatan kembali pada tahun 2023 sebesar yang mencapai $99,6 juta. Sementara untuk komoditas Vanila justru terus menglami penurunan ekspor dari tahun 2019 hingga 2023, tercatat sebesar US$69,6 juta pada tahun 2019, dan terus mengalami penurunan dan tercatat hanya sebesar US$15,2 juta pada tahun 2023. Di sisi lain komoditas Jahe, justru memiliki tren positif tahun 2019-2023. Jahe, mencatat nilai ekspor sebesar US$18,5 juta pada tahun 2019, namun, pada tahun 2021 dan 2022 mengalami sedikit penurunan dan kembali mengalami peningkatan pada tahun 2023 menjadi sebesar US$41, 9 juta.' : "Furthermore, the Clove commodity recorded the largest export value in 2020, reaching US$176.5 million and experiencing a drastic decline in 2021 and 2022. However, the Clove export value increased again in 2023 to reach $99.6 million. Meanwhile, the Vanilla commodity continued to experience a decline in exports from 2019 to 2023, recorded at US$69.6 million in 2019, and continued to decline and was recorded at only US$15.2 million in 2023. On the other hand, the Ginger commodity actually had a positive trend in 2019-2023. Ginger recorded an export value of US$18.5 million in 2019, however, in 2021 and 2022 it experienced a slight decline and increased again in 2023 to US$41.9 million." }}</p>

            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ session('locale') == 'id' ? 'Secara keseluruhan, nilai ekspor komoditas utama rempah Indonesia yakni Pala, Lada, Kayu Manis, Cengkeh, Jahe dan Vanila menunjukkan fluktuasi selama periode 2019-2024. Perubahan nilai ekspor tersebut kemungkinan besar dipengaruhi oleh beberapa faktor seperti adanya perubahan permintaan global atau perubahan kebutuhan pasar, serta faktor kebijakan perdagangan suatu negara, dan adanya persaingan global. Meskipun demikian, komoditas tersebut tetap menjadi pilar penting dalam kinerja ekspor Indonesia dan memiliki potensi yang besar untuk mendukung pertumbuhan ekonomi di masa depan.' : "Overall, the export value of Indonesia's main spice commodities, namely Nutmeg, Pepper, Cinnamon, Cloves, Ginger and Vanilla, showed fluctuations during the 2019-2024 period. Changes in export value are likely influenced by several factors such as changes in global demand or changes in market needs, as well as factors in a country's trade policy, and global competition. Nevertheless, these commodities remain an important pillar in Indonesia's export performance and have great potential to support economic growth in the future." }}</p>

            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ session('locale') == 'id' ? 'Data dari BPS (2024) menunjukkan bahwa sepuluh negara tujuan utama untuk ekspor komoditas Tanaman Obat, Aromatik, dan Rempah-Rempah adalah Thailand, China, Amerika Serikat, India, Vietnam, Belanda, Bangladesh, Jerman, Singapura, dan Pakistan. Nilai ekspor terbesar pada tahun 2023 mencapai US$ 127,1 juta ke China, sebesar US$ 64,4 juta ke India, dan sebesar US$ 46,3 juta ke Amerika Serikat.' : "Data from BPS (2024) shows that the ten main destination countries for exports of Medicinal Plants, Aromatics, and Spices are Thailand, China, the United States, India, Vietnam, the Netherlands, Bangladesh, Germany, Singapore, and Pakistan. The largest export value in 2023 reached US$ 127.1 million to China, US$ 64.4 million to India, and US$ 46.3 million to the United States." }}</p>

            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ session('locale') == 'id' ? 'Sebagai salah satu produsen rempah terbesar di dunia, Indonesia memiliki peluang yang sangat potensial untuk memperluas pasarnya ke seluruh dunia. Kualitas rempah-rempah Indonesia yang telah dikenal sejak zaman dahulu hingga kini terus diminati oleh pasar internasional. Oleh karena itu, upaya untuk meningkatkan ekspor harus menjadi prioritas, mengingat peluang yang besar dalam meningkatkan devisa negara serta kontribusi terhadap pertumbuhan ekonomi nasional.' : "As one of the largest spice producers in the world, Indonesia has a very potential opportunity to expand its market worldwide. The quality of Indonesian spices that have been known since ancient times until now continues to be in demand by the international market. Therefore, efforts to increase exports must be a priority, considering the great opportunity to increase the country's foreign exchange and contribution to national economic growth." }}</p>

            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ session('locale') == 'id' ? 'Direktorat Jenderal Pengembangan Ekspor Nasional melalui Export Center Surabaya berperan aktif dalam mendukung para pelaku usaha rempah melalui berbagai program pembinaan dan pendampingan dengan tujuan dapat menembus pasar internasional serta memperluas jangkauan pasar. Melalui sinergi dan komitmen bersama, rempah-rempah Indonesia diharapkan mampu bersaing secara lebih efektif di pasar global, menciptakan peluang yang lebih luas dalam memajukan sektor ekspor.' : "The Directorate General of National Export Development through the Surabaya Export Center plays an active role in supporting spice business actors through various coaching and mentoring programs with the aim of penetrating the international market and expanding market reach. Through synergy and joint commitment, Indonesian spices are expected to be able to compete more effectively in the global market, creating wider opportunities in advancing the export sector." }}</p>

            <a href="{{ url('/') }}" class="btn btn-primary mt-4">{{ session('locale') == 'id' ? 'Kembali ke Daftar Artikel' : 'Back to Article List' }}</a>
        </div>

    </div>
</div>
<!-- Berita Detail End -->

@endsection
