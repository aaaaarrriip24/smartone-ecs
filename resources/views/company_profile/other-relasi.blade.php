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
        <h1 class="display-3 text-white mb-3 animated slideInDown">{{ session('locale') == 'id' ? 'Relasi Lain' : 'Other Relations' }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">{{ session('locale') == 'id' ? 'Beranda' : 'Home' }}</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="javascript:void(0)">{{ session('locale') == 'id' ? 'Halaman' : 'Page' }}</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">{{ session('locale') == 'id' ? 'Relasi Lain' : 'Other Relations' }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Service Start -->
<div class="container-xxl py-3">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-secondary text-uppercase">{{ session('locale') == 'id' ? 'Hubungan Kami' : 'Our Relations' }}</h6>
            <h1 class="mb-5">{{ session('locale') == 'id' ? 'Jelajahi Hubungan Lainnya' : 'Explore Other Relations' }}</h1>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4 h-100 d-flex flex-column">
                    <div class="overflow-hidden text-center mb-4">
                        <img class="img-fluid w-75" src="{{ asset('logo_relations/Logo Bea Cukai.png')}}" alt="">
                    </div>
                    <div class="mt-auto">
                        <h4 class="mb-3">{{ session('locale') == 'id' ? 'Bea Cukai' : 'Bea Cukai' }}</h4>
                        <a class="btn-slide mt-2" href="https://www.beacukai.go.id/"><i class="fa fa-arrow-right"></i><span>{{ session('locale') == 'id' ? 'Kunjungi Kami' : 'Visit Us' }}</span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4 h-100">
                    <div class="overflow-hidden text-center mb-4">
                        <img class="img-fluid w-50" src="{{ asset('logo_relations/Logo Disperindag Jatim.png')}}" alt="">
                    </div>
                    <h4 class="mb-3">{{ session('locale') == 'id' ? 'Disperindag Jatim' : 'Disperindag Jatim' }}</h4>
                    <a class="btn-slide mt-2" href="https://disperindag.jatimprov.go.id/"><i class="fa fa-arrow-right"></i><span>{{ session('locale') == 'id' ? 'Kunjungi Kami' : 'Visit Us' }}</span></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4 h-100 d-flex flex-column">
                    <div class="overflow-hidden text-center mb-4 pt-5">
                        <img class="img-fluid w-75" src="{{ asset('logo_relations/Logo Eximbank.png')}}" alt="">
                    </div>
                    <div class="mt-auto">
                        <h4 class="mb-3">{{ session('locale') == 'id' ? 'Exim Bank' : 'Exim Bank' }}</h4>
                        <a class="btn-slide mt-2" href="https://www.indonesiaeximbank.go.id/"><i class="fa fa-arrow-right"></i><span>{{ session('locale') == 'id' ? 'Kunjungi Kami' : 'Visit Us' }}</span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4 h-100 d-flex flex-column">
                    <div class="overflow-hidden text-center mb-4">
                        <img class="img-fluid w-75" src="{{ asset('logo_relations/Logo FTA Center.jpg')}}" alt="">
                    </div>
                    <div class="mt-auto">
                        <h4 class="mb-3">{{ session('locale') == 'id' ? 'Pusat Perjanjian Perdagangan Bebas' : 'Free Trade Agreement Center' }}</h4>
                        <a class="btn-slide mt-2" href="https://ftacenter.kemendag.go.id/free-trade-agreement"><i class="fa fa-arrow-right"></i><span>{{ session('locale') == 'id' ? 'Kunjungi Kami' : 'Visit Us' }}</span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4 h-100 d-flex flex-column">
                    <div class="overflow-hidden text-center mb-4">
                        <img class="img-fluid w-75" src="{{ asset('logo_relations/Logo GPEI.png')}}" alt="">
                    </div>
                    <div class="mt-auto">
                        <h4 class="mb-3">{{ session('locale') == 'id' ? 'Gabungan Perusahaan Ekspor Indonesia' : 'Gabungan Perusahaan Ekspor Indonesia' }}</h4>
                        <a class="btn-slide mt-2" href="https://jatimexport.org/dpp-gpei/"><i class="fa fa-arrow-right"></i><span>{{ session('locale') == 'id' ? 'Kunjungi Kami' : 'Visit Us' }}</span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4 h-100 d-flex flex-column">
                    <div class="overflow-hidden text-center mb-4">
                        <img class="img-fluid w-75 pt-5" src="{{ asset('logo_relations/Logo IDDC 1.svg')}}" alt="">
                    </div>
                    <div class="mt-auto">
                        <h4 class="mb-3">{{ session('locale') == 'id' ? 'Pusat Pengembangan Desain Indonesia' : 'Indonesia Design Development Center' }}</h4>
                        <a class="btn-slide mt-2" href="https://iddc.kemendag.go.id/gdi/"><i class="fa fa-arrow-right"></i><span>{{ session('locale') == 'id' ? 'Kunjungi Kami' : 'Visit Us' }}</span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4 h-100 d-flex flex-column">
                    <div class="overflow-hidden text-center mb-4">
                        <img class="img-fluid w-75 pt-5" src="{{ asset('logo_relations/Logo InaExport.png')}}" alt="">
                    </div>
                    <div class="mt-auto">
                        <h4 class="mb-3">{{ session('locale') == 'id' ? 'InaExport' : 'InaExport' }}</h4>
                        <a class="btn-slide mt-2" href="https://inaexport.id/"><i class="fa fa-arrow-right"></i><span>{{ session('locale') == 'id' ? 'Kunjungi Kami' : 'Visit Us' }}</span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4 h-100 d-flex flex-column">
                    <div class="overflow-hidden text-center mb-4">
                        <img class="img-fluid w-75" src="{{ asset('logo_relations/logo insw 1.png')}}" alt="">
                    </div>
                    <div class="mt-auto">
                        <h4 class="mb-3">{{ session('locale') == 'id' ? 'Repositori Perdagangan Nasional Indonesia' : 'Indonesia National Trade Repository' }}</h4>
                        <a class="btn-slide mt-2" href="https://insw.go.id/intr"><i class="fa fa-arrow-right"></i><span>{{ session('locale') == 'id' ? 'Kunjungi Kami' : 'Visit Us' }}</span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4 h-100 d-flex flex-column">
                    <div class="overflow-hidden text-center mb-4">
                        <img class="img-fluid w-75 pt-5" src="{{ asset('logo_relations/Logo Kementerian Perdagangan.png')}}" alt="">
                    </div>
                    <div class="mt-auto">
                        <h4 class="mb-3">{{ session('locale') == 'id' ? 'Kementerian Perdagangan' : 'Kementerian Perdagangan' }}</h4>
                        <a class="btn-slide mt-2" href="https://www.kemendag.go.id/"><i class="fa fa-arrow-right"></i><span>{{ session('locale') == 'id' ? 'Kunjungi Kami' : 'Visit Us' }}</span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4 h-100 d-flex flex-column">
                    <div class="overflow-hidden text-center mb-4 py-5">
                        <img class="img-fluid w-75" src="{{ asset('logo_relations/Logo TEI 2024.png')}}" alt="">
                    </div>
                    <div class="mt-auto">
                        <h4 class="mb-3">{{ session('locale') == 'id' ? 'Trade Export Indonesia' : 'Trade Export Indonesia' }}</h4>
                        <a class="btn-slide mt-2" href="https://www.tradexpoindonesia.com/"><i class="fa fa-arrow-right"></i><span>{{ session('locale') == 'id' ? 'Kunjungi Kami' : 'Visit Us' }}</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->


@endsection
