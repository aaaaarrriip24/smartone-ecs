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


<!-- Fact Start -->
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
<!-- Fact End -->
@endsection
@section('js')
<script>
    let table;
    $(document).ready(function () {
        table = $('#dt_topik').DataTable({
            autoWidth: false,
            responsive: false,
            scrollCollapse: true,
            processing: true,
            serverSide: true,
            displayLength: 5,
            paginate: true,
            lengthChange: true,
            filter: true,
            sort: true,
            info: true,
            searching: true,
            ajax: base_url + "our-supplier", // Pastikan endpoint ini benar
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    className: 'text-center',
                    width: '5%'
                },
                {
                    data: null, // Menggunakan 'null' untuk custom render
                    render: function (data, type, row) {
                        return row.nama_perusahaan + ', ' + row.kode_perusahaan; // Format yang diinginkan
                    },
                    orderable: true,
                }
            ]
        });

        $(".dt-length").addClass("d-none");
    });
</script>
@endsection
