@extends('layouts.users')
@section('content')

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow border-top border-5 border-primary sticky-top p-0">
    <a href="index.html" class="navbar-brand bg-primary d-flex align-items-center px-4 px-lg-5">
        <h2 class="mb-2 text-white">ECS</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
            <a href="{{ url('about') }}" class="nav-item nav-link">About ECS</a>
            <a href="{{ url('supplier') }}" class="nav-item nav-link ">Supplier List</a>
            <a href="{{ url('news') }}" class="nav-item nav-link ">News</a>
            <a href="{{ url('gallery') }}" class="nav-item nav-link active">ECS Gallery</a>
            <a href="{{ url('contact') }}" class="nav-item nav-link">Contact</a>
            @if(Auth::check())
            <a class="nav-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
                <span class="align-middle" data-key="t-logout">Logout</span></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            @else
            <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
            @endif
        </div>
        <h4 class="m-0 pe-lg-5 d-none d-lg-block"><i class="fa fa-headphones text-primary me-3"></i>+0857-5587-9497</h4>
    </div>
</nav>
<!-- Navbar End -->


<!-- Page Header Start -->
<div class="container-fluid page-header py-5" style="margin-bottom: 6rem;">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">ECS Gallery</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">ECS Gallery</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container py-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-secondary text-uppercase">Our Team</h6>
            <h1 class="mb-5">Expert Team Members</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item p-4">
                    <div class="overflow-hidden mb-4">
                        <img class="img-fluid" src="{{ asset('assets_users/img/team-1.jpg')}}" alt="">
                    </div>
                    <h5 class="mb-0">Full Name</h5>
                    <p>Designation</p>
                    <div class="btn-slide mt-1">
                        <i class="fa fa-share"></i>
                        <span>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item p-4">
                    <div class="overflow-hidden mb-4">
                        <img class="img-fluid" src="{{ asset('assets_users/img/team-2.jpg')}}" alt="">
                    </div>
                    <h5 class="mb-0">Full Name</h5>
                    <p>Designation</p>
                    <div class="btn-slide mt-1">
                        <i class="fa fa-share"></i>
                        <span>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="team-item p-4">
                    <div class="overflow-hidden mb-4">
                        <img class="img-fluid" src="{{ asset('assets_users/img/team-3.jpg')}}" alt="">
                    </div>
                    <h5 class="mb-0">Full Name</h5>
                    <p>Designation</p>
                    <div class="btn-slide mt-1">
                        <i class="fa fa-share"></i>
                        <span>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.9s">
                <div class="team-item p-4">
                    <div class="overflow-hidden mb-4">
                        <img class="img-fluid" src="{{ asset('assets_users/img/team-4.jpg')}}" alt="">
                    </div>
                    <h5 class="mb-0">Full Name</h5>
                    <p>Designation</p>
                    <div class="btn-slide mt-1">
                        <i class="fa fa-share"></i>
                        <span>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item p-4">
                    <div class="overflow-hidden mb-4">
                        <img class="img-fluid" src="{{ asset('assets_users/img/team-2.jpg')}}" alt="">
                    </div>
                    <h5 class="mb-0">Full Name</h5>
                    <p>Designation</p>
                    <div class="btn-slide mt-1">
                        <i class="fa fa-share"></i>
                        <span>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item p-4">
                    <div class="overflow-hidden mb-4">
                        <img class="img-fluid" src="{{ asset('assets_users/img/team-3.jpg')}}" alt="">
                    </div>
                    <h5 class="mb-0">Full Name</h5>
                    <p>Designation</p>
                    <div class="btn-slide mt-1">
                        <i class="fa fa-share"></i>
                        <span>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="team-item p-4">
                    <div class="overflow-hidden mb-4">
                        <img class="img-fluid" src="{{ asset('assets_users/img/team-4.jpg')}}" alt="">
                    </div>
                    <h5 class="mb-0">Full Name</h5>
                    <p>Designation</p>
                    <div class="btn-slide mt-1">
                        <i class="fa fa-share"></i>
                        <span>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.9s">
                <div class="team-item p-4">
                    <div class="overflow-hidden mb-4">
                        <img class="img-fluid" src="{{ asset('assets_users/img/team-1.jpg')}}" alt="">
                    </div>
                    <h5 class="mb-0">Full Name</h5>
                    <p>Designation</p>
                    <div class="btn-slide mt-1">
                        <i class="fa fa-share"></i>
                        <span>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->

@endsection
