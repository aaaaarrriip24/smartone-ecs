@extends('layouts.app')
@section('content')
<!-- start page title -->
<style>
    .datepicker-dropdown {
        top: 340px !important;
        z-index: 10;
    }

</style>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Transaksi Realisasi Export</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Transaksi</a></li>
                    <li class="breadcrumb-item active">Realisasi Export</li>
                    <li class="breadcrumb-item">
                        <button class="btn btn-sm btn-secondary btn-pdf">PDF</button>
                    </li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Realisasi Export</h5>
            </div>
            <form action="{{ url('export/pdf') }}" id="forms" method="post" target="_blank">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <div class="col-md-5">
                                <label class="form-label">Rentang Tanggal</label>
                                <div class="input-group input-group-sm">
                                    <input type="text"
                                        class="form-control form-control-sm datepicker x-readonly tglawal filter"
                                        readonly placeholder="Select date" onchange="reloadDT('tglawal')"
                                        value="<?=date('01-m-Y')?>" name="tglawal">
                                    <div class="input-group-append input-group-prepend">
                                        <div class="input-group-text">-</div>
                                    </div>
                                    <input type="text"
                                        class="form-control form-control-sm datepicker x-readonly tglakhir filter"
                                        readonly placeholder="Select date" onchange="reloadDT('tglakhir')"
                                        value="<?=date('d-m-Y')?>" name="tglakhir">
                                </div>
                            </div>
                            <table id="dt_export"
                                class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                style="width:100%">
                                <thead>
                                    <th>No. </th>
                                    <th>Nama Perusahaan</th>
                                    <th>Produk Detail</th>
                                    <th>Tanggal Realisasi</th>
                                    <th>Tanggal Lapor</th>
                                    <th>Nilai Transaksi (USD)</th>
                                    <th>Negara Tujuan</th>
                                    <th>Nama Buyer</th>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    let table;

    function reloadDT() {
        table.ajax.reload();
    }

    const formatter = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',

        // These options are needed to round to whole numbers if that's what you want.
        //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
        //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
    });
    $(document).ready(function () {
        $(".datepicker").datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
        });

        $('.filter').on('change', function (e) {
            table.ajax.reload(null, false);
        });

        table = $('#dt_export').DataTable({
            autoWidth: false,
            responsive: false,
            scrollCollapse: true,
            processing: true,
            serverSide: true,
            displayLength: 10,
            paginate: true,
            lengthChange: true,
            filter: true,
            sort: true,
            info: true,
            ajax: {
                url: base_url + "transaksi/export",
                type: "GET",
                data: function (data) {
                    if ($(".in").val() != "") data.in = $(".in").val();
                    if ($('.tglawal').val() != '') data.tglawal = $('.tglawal').val();
                    if ($('.tglakhir').val() != '') data.tglakhir = $('.tglakhir').val();
                    data.tglawal = moment($('.tglawal').val(), 'DD-MM-YYYY').format('YYYY-MM-DD');
                    data.tglakhir = moment($('.tglakhir').val(), 'DD-MM-YYYY').format('YYYY-MM-DD');
                    return data;
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    className: 'text-center',
                    width: '5%'
                },
                {
                    data: 'nama_perusahaan',
                    name: 'nama_perusahaan',
                    orderable: true,
                    render: function (data, type, row) {
                        let text = row.nama_perusahaan;
                        let result = text.toUpperCase();
                        return result + ", " + row.nama_tipe;
                    }
                },
                {
                    data: 'detail_produk_utama',
                    name: 'detail_produk_utama',
                    orderable: true,
                },
                {
                    data: 'tanggal_export',
                    name: 'tanggal_export',
                    orderable: true,
                    render: function (data, type, row) {
                        var tanggal = row.tanggal_export;
                        if (tanggal == null) {
                            tanggal = "-";
                            return tanggal;
                        } else {
                            return moment(tanggal).format('DD-MMM-YYYY');
                        }
                    }
                },
                {
                    data: 'tanggal_lapor',
                    name: 'tanggal_lapor',
                    orderable: true,
                    render: function (data, type, row) {
                        return moment(row.tanggal_lapor).format('DD-MMM-YYYY');
                    }
                },
                {
                    data: 'nilai_transaksi',
                    name: 'nilai_transaksi',
                    className: 'text-end',
                    orderable: true,
                    render: function (data, type, row) {
                        return new Intl.NumberFormat().format(row.nilai_transaksi);
                    }
                },
                {
                    data: 'en_short_name',
                    name: 'en_short_name',
                    orderable: true,
                },
                {
                    data: 'nama_buyer',
                    name: 'nama_buyer',
                    orderable: true,
                },
            ]
        });

        $(document).on('click', '.btn-pdf', function () {
		    document.getElementById("forms").submit();
        });
    });
</script>
@endsection
