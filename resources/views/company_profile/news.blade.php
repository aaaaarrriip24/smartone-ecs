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
<div class="container-fluid page-header py-5" style="margin-bottom: 4rem;">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">{{ __("Berita") }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="#">{{ __("Beranda") }}</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">{{ __("Halaman") }}</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">{{ __("Berita") }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Service Start -->
<div class="container-xxl">
    <div class="container py-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-secondary text-uppercase">{{ __("Berita ECS") }}</h6>
            <h1 class="mb-5">{{ __("Jelajahi Berita Kami") }}</h1>
        </div>
        <div class="row g-4">
            @foreach($berita as $item)
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item p-4">
                        <div class="overflow-hidden text-center mb-4">
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
                        <h4 class="mb-3">{{ GoogleTranslate::trans($item->judul, app()->getLocale()) }}</h4>
                        <p class="text-justify">{{ Str::limit(GoogleTranslate::trans($item->isi, app()->getLocale()), 150, '...') }}</p>
                        <a class="btn-slide mt-2" href="{{ url('news/detail/' . $item->id) }}">
                            <i class="fa fa-arrow-right"></i>
                            <span>{{ __("Baca Selengkapnya") }}</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Service End -->
@endsection
