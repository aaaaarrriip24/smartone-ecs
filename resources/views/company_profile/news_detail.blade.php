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

<!-- Berita Detail Start -->
<div class="container-fluid p-5">
    <div class="row">
        <div class="col-md-8">
            @if(!empty($berita->gambar))
                @php
                    $gambarArray = json_decode($berita->gambar);
                @endphp
                
                <div class="row mb-4">
                    @foreach($gambarArray as $image)
                        <div class="col-md-4 mb-3">
                            <div class="img-container">
                                <img class="img-fluid w-100" src="{{ asset('images/' . $image) }}" alt="Berita Image">
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <img class="img-fluid w-100 mb-4" src="{{ asset('assets/images/default.png') }}" alt="Default Image">
            @endif

            <h2 class="mb-3">{{ GoogleTranslate::trans($berita->judul, app()->getLocale()) }}</h2>
            <p class="text-muted mb-3">{{ \Carbon\Carbon::parse(($berita->created_at))->format('d F Y') }}</p>
            <p class="text-justify">{{ GoogleTranslate::trans($berita->isi, app()->getLocale()) }}</p>
            <br>
            <a href="{{ url('berita') }}" class="btn btn-primary mt-4">{{ __("Kembali ke Daftar Berita") }}</a>
        </div>

        <!-- Berita Lainnya Start -->
        <div class="col-md-4">
            <div class="row g-4 mt-3">
                @foreach($otherBerita as $item)
                    <div class="col-12 mb-3">
                        <div class="card" style="border-radius: 10px; width: 75%; margin: auto;">
                            <div class="img-container" style="overflow: hidden; border-radius: 10px 10px 0 0;">
                                @if(!empty($item->gambar))
                                    @php
                                        $gambarArray = json_decode($item->gambar);
                                        $firstImage = !empty($gambarArray) ? $gambarArray[0] : 'default.png';
                                    @endphp
                                    <img class="small-img" src="{{ asset('images/' . $firstImage) }}" alt="Berita Image">
                                @else
                                    <img class="small-img" src="{{ asset('assets/images/default.png') }}" alt="Default Image">
                                @endif
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ GoogleTranslate::trans($item->judul, app()->getLocale()) }}</h5>
                                <p class="card-text" style="font-size: 0.9rem; color: #555;">{{ Str::limit(GoogleTranslate::trans($item->isi, app()->getLocale()), 70, '...') }}</p>
                                <a href="{{ url('news/detail/' . $item->id) }}" class="btn btn-primary">{{ __("Baca Selengkapnya") }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Berita Lainnya End -->
    </div>
</div>
<!-- Berita Detail End -->

@endsection
