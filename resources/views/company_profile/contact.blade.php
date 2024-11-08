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
        <h1 class="display-3 text-white mb-3 animated slideInDown">{{ session('locale') == 'id' ? 'Hubungi Kami' : 'Contact Us' }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="#">{{ session('locale') == 'id' ? 'Beranda' : 'Home' }}</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">{{ session('locale') == 'id' ? 'Halaman' : 'Pages' }}</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">{{ session('locale') == 'id' ? 'Hubungi Kami' : 'Contact Us' }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Contact Start -->
<div class="container-fluid overflow-hidden px-lg-0">
    <div class="container contact-page py-5 px-lg-0">
        <div class="row g-5 mx-lg-0">
            <div class="col-md-6 contact-form wow fadeIn" data-wow-delay="0.1s">
                <h1 class="">ExportCenter Surabaya</h1>
                <p class="mb-2">{{ session('locale') == 'id' ? 'Kirim email kepada kami:' : 'Send us an email:' }}</p>
                <p class="mb-2">exportcenter.surabaya@kemendag.go.id</p>
                <p class="mb-2">{{ session('locale') == 'id' ? 'Kunjungi kami:' : 'Visit us:' }}</p>
                <p class="mb-2">Jl. Kedung Doro No.80-90, Sawahan, Kec. Sawahan, Surabaya, Jawa Timur 60251</p>
                <div class="bg-light p-4">
                @if(session('success'))
                    <div class="success-message">{{ session('success') }}</div>
                @endif
                    <form action="{{ route('contact.send') }}" method="POST" id="contact-form">
                    @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="{{ session('locale') == 'id' ? 'Nama Anda' : 'Your Name' }}">
                                    <label for="name">{{ session('locale') == 'id' ? 'Nama Anda' : 'Your Name' }}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="{{ session('locale') == 'id' ? 'Email Anda' : 'Your Email' }}">
                                    <label for="email">{{ session('locale') == 'id' ? 'Email Anda' : 'Your Email' }}</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="{{ session('locale') == 'id' ? 'Subjek' : 'Subject' }}">
                                    <label for="subject">{{ session('locale') == 'id' ? 'Subjek' : 'Subject' }}</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="{{ session('locale') == 'id' ? 'Tinggalkan pesan di sini' : 'Leave a message here' }}" id="message" name="message" style="height: 100px"></textarea>
                                    <label for="message">{{ session('locale') == 'id' ? 'Pesan' : 'Message' }}</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">{{ session('locale') == 'id' ? 'Kirim Pesan' : 'Send Message' }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 pe-lg-0 wow fadeInRight" data-wow-delay="0.1s">
                <div class="position-relative h-100">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26563.494827674116!2d112.74705133376894!3d-7.261231135874163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f95860af4edd%3A0x59c14f1ab3f2bd72!2sExport%20Center%20Surabaya!5e0!3m2!1sen!2sid!4v1729301404012!5m2!1sen!2sid" width="750" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

<script>
    $(document).ready(function() {
        $('#contact-form').on('submit', function(e) {
            e.preventDefault(); // Mencegah pengiriman form default

            // Clear previous messages
            $('#success-message').hide();
            $('#error-message').hide();

            // Send the form data using AJAX
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#success-message').text(response.success).show();
                    $('#contact-form')[0].reset(); // Reset form setelah berhasil
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON.errors;
                    let errorMessages = '';
                    for (const [key, value] of Object.entries(errors)) {
                        errorMessages += value[0] + '<br>';
                    }
                    $('#error-message').html(errorMessages).show();
                }
            });
        });
    });
</script>
@endsection
