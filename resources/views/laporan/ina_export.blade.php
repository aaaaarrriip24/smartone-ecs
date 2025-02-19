@extends('layouts.app')
@section('content')
<style>
    .datepicker-dropdown {
        top: 340px !important;
        z-index: 10;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Extra Peserta Inaexport</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Extra</a></li>
                    <li class="breadcrumb-item active">Peserta Peserta Inaexport</li>
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
                <h5 class="card-title mb-0">Peserta Business Matching</h5>
            </div>
            <form action="{{ url('p_inaexport/pdf') }}" id="forms" method="post" target="_blank">
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
                            <table id="dt_p_inaexport"
                                class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                style="width:100%">
                                <thead>
                                    <th>No. </th>
                                    <th>Kode Ina Export</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Produk</th>
                                    <th>Tanggal Registrasi</th>
                                    <th>Nama Petugas</th>
                                    <th>Jumlah Peserta</th>
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
    $(document).ready(function () {
        $(".datepicker").datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
        });

        $('.filter').on('change', function (e) {
            table.ajax.reload(null, false);
        });

        table = $('#dt_p_inaexport').DataTable({
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
                url: base_url + "extra/p_inaexport",
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
                    data: 'kode_ina_export',
                    name: 'kode_ina_export',
                    orderable: true,
                },
                {
                    data: 'nama_perusahaan',
                    name: 'nama_perusahaan',
                    orderable: true,
                    render: function (data, type, row, meta) {
                        let text = row.nama_perusahaan;
                        let result = text.toUpperCase();
                        let str = row.nama_tipe;
                        if (str == null) {
                            str = "";
                        } else {
                            str = ", " + row.nama_tipe;
                        }

                        return result + str;
                    }
                },
                {
                    data: 'detail_produk_utama',
                    name: 'detail_produk_utama',
                    orderable: true,
                },
                {
                    data: 'tanggal_registrasi_inaexport',
                    name: 'tanggal_registrasi_inaexport',
                    orderable: true,
                    render: function (data, type, row) {
                        var tanggal = row.tanggal_registrasi_inaexport;
                        if (tanggal == "0000-00-00") {
                            tanggal = "-";
                            return tanggal;
                        } else {
                            if (tanggal != null) {
                                // return tanggal;
                                return moment(tanggal).format('DD-MMM-YYYY');
                            } else {
                                tanggal = "-";
                                return tanggal;
                            }
                        }
                    }

                    // render: function (data, type, row) {
                    //     let tanggal_reg = tanggal_registrasi_inaexport;
                    //     if(tanggal_reg = null) {
                    //         tanggal_reg = "-";
                    //     }
                    //     return moment(tanggal_reg).format('DD-MMM-YYYY');
                    // }
                },
                {
                    data: 'nama_petugas',
                    name: 'nama_petugas',
                    orderable: true,
                },
                {
                    data: 'peserta_ina',
                    name: 'peserta_ina',
                    orderable: true,
                    render: function (data, type, row) {
                        return row.DT_RowIndex + "/" + row.peserta_ina;
                    }
                },
            ]
        });

        $(document).on('click', '.btn-pdf', function () {
		    document.getElementById("forms").submit();
        });
    });
</script>
@endsection
