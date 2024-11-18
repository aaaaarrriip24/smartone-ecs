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
        <h1 class="display-3 text-white mb-3 animated slideInDown">{{ GoogleTranslate::trans("Relasi Lain", app()->getLocale()) }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">{{ GoogleTranslate::trans("Beranda", app()->getLocale()) }}</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="javascript:void(0)">{{ GoogleTranslate::trans("Halaman", app()->getLocale()) }}</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">{{ GoogleTranslate::trans("Relasi Lain", app()->getLocale()) }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Service Start -->
<div class="container-xxl">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-secondary text-uppercase">{{ GoogleTranslate::trans("Hubungan Kami", app()->getLocale()) }}</h6>
            <h1 class="mb-5">{{ GoogleTranslate::trans("Jelajahi Hubungan Lainnya", app()->getLocale()) }}</h1>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4 h-100 d-flex flex-column">
                    <div class="overflow-hidden text-center mb-4">
                        <img class="img-fluid w-75" src="{{ asset('logo_relations/Logo Bea Cukai.png')}}" alt="">
                    </div>
                    <div class="mt-auto">
                        <h4 class="mb-3">{{ GoogleTranslate::trans("Bea Cukai", app()->getLocale()) }}</h4>
                        <a class="btn-slide mt-2" href="https://www.beacukai.go.id/"><i class="fa fa-arrow-right"></i><span>{{ GoogleTranslate::trans("Kunjungi Kami", app()->getLocale()) }}</span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4 h-100">
                    <div class="overflow-hidden text-center mb-4">
                        <img class="img-fluid w-50" src="{{ asset('logo_relations/Logo Disperindag Jatim.png')}}" alt="">
                    </div>
                    <h4 class="mb-3">{{ GoogleTranslate::trans("Disperindag Jatim", app()->getLocale()) }}</h4>
                    <a class="btn-slide mt-2" href="https://disperindag.jatimprov.go.id/"><i class="fa fa-arrow-right"></i><span>{{ GoogleTranslate::trans("Kunjungi Kami", app()->getLocale()) }}</span></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4 h-100 d-flex flex-column">
                    <div class="overflow-hidden text-center mb-4 pt-5">
                        <img class="img-fluid w-75" src="{{ asset('logo_relations/Logo Eximbank.png')}}" alt="">
                    </div>
                    <div class="mt-auto">
                        <h4 class="mb-3">{{ GoogleTranslate::trans("Exim Bank", app()->getLocale()) }}</h4>
                        <a class="btn-slide mt-2" href="https://www.indonesiaeximbank.go.id/"><i class="fa fa-arrow-right"></i><span>{{ GoogleTranslate::trans("Kunjungi Kami", app()->getLocale()) }}</span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4 h-100 d-flex flex-column">
                    <div class="overflow-hidden text-center mb-4">
                        <img class="img-fluid w-75" src="{{ asset('logo_relations/Logo FTA Center.jpg')}}" alt="">
                    </div>
                    <div class="mt-auto">
                        <h4 class="mb-3">{{ GoogleTranslate::trans("Pusat Perjanjian Perdagangan Bebas", app()->getLocale()) }}</h4>
                        <a class="btn-slide mt-2" href="https://ftacenter.kemendag.go.id/free-trade-agreement"><i class="fa fa-arrow-right"></i><span>{{ GoogleTranslate::trans("Kunjungi Kami", app()->getLocale()) }}</span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4 h-100 d-flex flex-column">
                    <div class="overflow-hidden text-center mb-4">
                        <img class="img-fluid w-75" src="{{ asset('logo_relations/Logo GPEI.png')}}" alt="">
                    </div>
                    <div class="mt-auto">
                        <h4 class="mb-3">{{ GoogleTranslate::trans("Gabungan Perusahaan Ekspor Indonesia", app()->getLocale()) }}</h4>
                        <a class="btn-slide mt-2" href="https://jatimexport.org/dpp-gpei/"><i class="fa fa-arrow-right"></i><span>{{ GoogleTranslate::trans("Kunjungi Kami", app()->getLocale()) }}</span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4 h-100 d-flex flex-column">
                    <div class="overflow-hidden text-center mb-4">
                        <img class="img-fluid w-75 pt-5" src="{{ asset('logo_relations/Logo IDDC 1.svg')}}" alt="">
                    </div>
                    <div class="mt-auto">
                        <h4 class="mb-3">{{ GoogleTranslate::trans("Pusat Pengembangan Desain Indonesia", app()->getLocale()) }}</h4>
                        <a class="btn-slide mt-2" href="https://iddc.kemendag.go.id/gdi/"><i class="fa fa-arrow-right"></i><span>{{ GoogleTranslate::trans("Kunjungi Kami", app()->getLocale()) }}</span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4 h-100 d-flex flex-column">
                    <div class="overflow-hidden text-center mb-4">
                        <img class="img-fluid w-75 pt-5" src="{{ asset('logo_relations/Logo InaExport.png')}}" alt="">
                    </div>
                    <div class="mt-auto">
                        <h4 class="mb-3">{{ GoogleTranslate::trans("InaExport", app()->getLocale()) }}</h4>
                        <a class="btn-slide mt-2" href="https://inaexport.id/"><i class="fa fa-arrow-right"></i><span>{{ GoogleTranslate::trans("Kunjungi Kami", app()->getLocale()) }}</span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4 h-100 d-flex flex-column">
                    <div class="overflow-hidden text-center mb-4">
                        <img class="img-fluid w-75" src="{{ asset('logo_relations/logo insw 1.png')}}" alt="">
                    </div>
                    <div class="mt-auto">
                        <h4 class="mb-3">{{ GoogleTranslate::trans("Repositori Perdagangan Nasional Indonesia", app()->getLocale()) }}</h4>
                        <a class="btn-slide mt-2" href="https://insw.go.id/intr"><i class="fa fa-arrow-right"></i><span>{{ GoogleTranslate::trans("Kunjungi Kami", app()->getLocale()) }}</span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4 h-100 d-flex flex-column">
                    <div class="overflow-hidden text-center mb-4">
                        <img class="img-fluid w-75 pt-5" src="{{ asset('logo_relations/Logo Kementerian Perdagangan.png')}}" alt="">
                    </div>
                    <div class="mt-auto">
                        <h4 class="mb-3">{{ GoogleTranslate::trans("Kementerian Perdagangan", app()->getLocale()) }}</h4>
                        <a class="btn-slide mt-2" href="https://www.kemendag.go.id/"><i class="fa fa-arrow-right"></i><span>{{ GoogleTranslate::trans("Kunjungi Kami", app()->getLocale()) }}</span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4 h-100 d-flex flex-column">
                    <div class="overflow-hidden text-center mb-4 py-5">
                        <img class="img-fluid w-75" src="{{ asset('logo_relations/Logo TEI 2024.png')}}" alt="">
                    </div>
                    <div class="mt-auto">
                        <h4 class="mb-3">{{ GoogleTranslate::trans("Trade Export Indonesia", app()->getLocale()) }}</h4>
                        <a class="btn-slide mt-2" href="https://www.tradexpoindonesia.com/"><i class="fa fa-arrow-right"></i><span>{{ GoogleTranslate::trans("Kunjungi Kami", app()->getLocale()) }}</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->


@endsection
