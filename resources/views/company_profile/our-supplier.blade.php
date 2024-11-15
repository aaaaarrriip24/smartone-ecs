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
        <h1 class="display-3 text-white mb-3 animated slideInDown">{{ session('locale') == 'id' ? 'Pemasok' : 'Suppliers' }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="#">{{ session('locale') == 'id' ? 'Beranda' : 'Home' }}</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">{{ session('locale') == 'id' ? 'Halaman' : 'Page' }}</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">{{ session('locale') == 'id' ? 'Pemasok' : 'Suppliers' }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Service Start -->
<div class="container-fluid px-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-secondary text-uppercase">{{ session('locale') == 'id' ? 'Hubungan Kami' : 'Our Relations' }}</h6>
            <h1 class="mb-5">{{ session('locale') == 'id' ? 'Jelajahi Hubungan Lainnya' : 'Explore Other Relations' }}</h1>
        </div>
        <div class="row g-4">

            @foreach ( $data_suplier as $data )


            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4 h-100 d-flex flex-column shadow rounded border">
                    <!-- Header Section -->
                    <div class="overflow-hidden text-center mb-4">
                        <h4 class="fw-bold mb-2">{{ $data->nama_perusahaan}}</h4>
                        <p class="text-muted mb-1">{{ $data->alamat_perusahaan}}</p>
                        <p class="text-muted mb-1">{{ $data->cities}}, {{ $data->provinsi}}</p>
                        <p class="text-muted">Indonesia</p>
                    </div>

                    <!-- Body Section -->
                    <div class="mt-auto">
                        <h5 class="fw-bold text-secondary">Product Details:</h5>
                        <p class="text-dark mb-1">
                            <strong>{{ session('locale') == 'id' ? 'Produk Utama:' : 'Main Product:' }}</strong>
                            {{ $data->detail_produk_utama }}
                        </p>
                        <p class="text-dark mb-1">
                            <strong>{{ session('locale') == 'id' ? 'Kategori:' : 'Category:' }}</strong>
                            {{ $data->sub_kategori }}
                        </p>
                        <p class="text-dark mb-1">
                            <strong>{{ session('locale') == 'id' ? 'Kapasitas Produksi:' : 'Production Capacity:' }}</strong>
                            {{ $data->kapasitas_produksi }} {{ $data->satuan_kapasitas_produksi }}
                        </p>
                        <p class="text-dark mb-3">
                            <strong>{{ session('locale') == 'id' ? 'Skala:' : 'Scale:' }}</strong>
                            {{ $data->skala_perusahaan }}
                        </p>

                        <!-- Image Section -->
                        <div class="text-center mb-3">
                            <img class="img-fluid w-75 rounded" src="{{ asset($data->foto_produk_1)}}" alt="Logo Bea Cukai">
                        </div>

                        <!-- Contact Section -->
                        <div class="">
                            <p class="fw-bold">{{ session('locale') == 'id' ? 'untuk informasi lebih detail' : 'For more detail Information:' }}</p>
                            <p class="fs-10 text-muted mb-1" style="font-size: clamp(12px, 2vw, 10px);"><i class="far fa-envelope"></i>  <a href="mailto:exportcenter.surabaya@kemendag.go.id" class="text-decoration-none">exportcenter.surabaya@kemendag.go.id</a></p>
                            <p class="fs-10 text-muted mb-1" style="font-size: clamp(12px, 2vw, 10px);"><i class="fas fa-phone"></i>  <a href="tel:+623135979106" class="text-decoration-none">+62 31 3597 9106</a></p>
                            <p class="fs-10 text-muted mb-1" style="font-size: clamp(12px, 2vw, 10px);"><i class="fas fa-comment-alt"></i>  <a href="tel:+6285755879497" class="text-decoration-none">+62 8575 5879 497</a></p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <div id="splide" class="splide">
                <div class="splide__track">
                    <div class="splide__list" id="card-container">

                    </div>
                </div>
            </div>
            <div>
                {!! $data_suplier->links() !!}
            </div> --}}
            {{ $data_suplier->links() }}

        </div>
</div>
<!-- Service End -->


{{-- <!-- Fact Start -->
<div class="container-xxl pb-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5">Member Perusahaan</h1>
                <table id="dt_topik" class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" style="background-color: rgb(255, 99, 132);">No.</th>
                            <th scope="col" style="background-color: rgb(255, 205, 86);">Perusahaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Baris data akan diisi oleh DataTable -->
                    </tbody>
                </table>
            </div>
            <div class="col-lg-5">
                <div class="row g-4 align-items-center">
                    <div class="col-sm-6">
                        <div class="bg-primary p-4 mb-4 wow fadeIn" data-wow-delay="0.3s">
                            <i class="fa fa-users fa-2x text-white mb-3"></i>
                            <h2 class="text-white mb-2" data-toggle="counter-up">{{ $perusahaan }}</h2>
                            <p class="text-white mb-0">Member Perusahaan</p>
                        </div>
                        <div class="bg-secondary p-4 wow fadeIn" data-wow-delay="0.5s">
                            <i class="fa fa-ship fa-2x text-white mb-3"></i>
                            <h2 class="text-white mb-2" data-toggle="counter-up">{{ $layanan }}</h2>
                            <p class="text-white mb-0">Konsultasi EKspor</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="bg-success p-4 wow fadeIn" data-wow-delay="0.7s">
                            <i class="fa fa-star fa-2x text-white mb-3"></i>
                            <h2 class="text-white mb-2" data-toggle="counter-up">{{ $ptina->count_perusahaan }}</h2>
                            <p class="text-white mb-0">InaExport</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fact End --> --}}
@endsection
@section('js')
<script>
    $(document).ready(function () {
            const suppliers = @json($data_suplier);
            // Lokasi untuk menempatkan kartu
            const $cardContainer = $('#card-container');

            $.each(suppliers.data, function (index, supplier) {
                const html = `
                    <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item p-4 h-100 d-flex flex-column shadow rounded border">
                            <!-- Header Section -->
                            <div class="overflow-hidden text-center mb-4">
                                <h4 class="fw-bold mb-2">${supplier.nama_perusahaan}</h4>
                                <p class="text-muted mb-1">${supplier.alamat_perusahaan}</p>
                                <p class="text-muted mb-1">${supplier.cities}, ${supplier.provinsi}</p>
                                <p class="text-muted">Indonesia</p>
                            </div>

                            <!-- Body Section -->
                            <div class="mt-auto">
                                <h5 class="fw-bold text-secondary">Product Details:</h5>
                                <p class="text-dark mb-1"><strong>Produk Utama:</strong> ${supplier.detail_produk_utama}</p>
                                <p class="text-dark mb-1"><strong>Kategori:</strong> ${supplier.sub_kategori}</p>
                                <p class="text-dark mb-1"><strong>Kapasitas Produksi:</strong> ${supplier.kapasitas_produksi} ${supplier.satuan_kapasitas_produksi}</p>
                                <p class="text-dark mb-3"><strong>Skala:</strong> ${supplier.skala_perusahaan}</p>

                                <!-- Image Section -->
                                <div class="text-center mb-3">
                                    <img class="img-fluid w-75 rounded" src="{{ asset('logo_relations/Logo Bea Cukai.png')}}" alt="Logo Bea Cukai">
                                </div>

                                <!-- Contact Section -->
                                <div class="">
                                    <p class="fw-bold">For more detail Information:</p>
                                    <p class="text-muted mb-1"><i class="far fa-envelope"></i> <a href="mailto:exportcenter.surabaya@kemendag.go.id" class="text-decoration-none">exportcenter.surabaya@kemendag.go.id</a></p>
                                    <p class="text-muted"><i class="fas fa-phone"></i> <a href="tel:+623135979106" class="text-decoration-none">+62 31 3597 9106</a></p>
                                    <p class="text-muted mb-1"><i class="fas fa-comment-alt"></i> <a href="tel:+6285755879497" class="text-decoration-none">+62 8575 5879 497</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
`;
                $cardContainer.append(html);
            });


            // Inisialisasi Splide
            new Splide('#splide', {
                type       : 'loop',
                perPage    : 3,
                pagination : true,
                arrows     : true,
                gap        : '4rem',
            }).mount();
    });
</script>
@endsection
