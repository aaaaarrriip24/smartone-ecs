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
            <h4 class="mb-sm-0">Transaksi Konsultasi</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Transaksi</a></li>
                    <li class="breadcrumb-item active">Konsultasi</li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('konsultasi/add') }}" class="btn btn-sm btn-primary text-light" type="text">Add</a>
                    </li>
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
                <h5 class="card-title mb-0">Konsultasi</h5>
            </div>
            <form action="{{ url('konsultasi/pdf') }}" id="forms" method="post" target="_blank">
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
                            <table id="dt_konsultasi"
                                class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                style="width:100%">
                                <thead>
                                    <th>No. </th>
                                    <th>Nama Perusahaan</th>
                                    <th>Tanggal Konsultasi</th>
                                    <th>Cara Konsultasi</th>
                                    <th>Topik Konsultasi</th>
                                    <th>Isi Konsultasi</th>
                                    <th>Action</th>
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

        table = $('#dt_konsultasi').DataTable({
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
                url: base_url + "transaksi/konsultasi",
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
                    render: function (data, type, row, meta) {
                        var sep = "";
                        if (row.nama_tipe == "") {
                            sep = "";
                        } else {
                            sep = ", ";
                        }
                        let text = row.nama_perusahaan;
                        let result = text.toUpperCase();
                        return result + sep + row.nama_tipe;
                    }
                },
                {
                    data: 'tanggal_konsultasi',
                    name: 'tanggal_konsultasi',
                    orderable: true,
                    render: function (data, type, row) {
                        return moment(row.tanggal_konsultasi).format('DD-MMM-YYYY');
                    }
                },
                {
                    data: 'cara_konsultasi',
                    name: 'cara_konsultasi',
                    orderable: true,
                },
                {
                    data: 'nama_topik',
                    name: 'nama_topik',
                    orderable: true,
                },
                {
                    data: 'isi_konsultasi',
                    name: 'isi_konsultasi',
                    orderable: true,
                    render: function (data, type, row, meta) {
                        var html = row.isi_konsultasi;
                        var div = document.createElement("div");
                        div.innerHTML = html;
                        var text = div.textContent || div.innerText || "";

                        var str = text;
                        if (str.length > 30) str = str.substring(0, 30);
                        return str;
                    }
                },

                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '10%'
                },
            ]
        });

        $(document).on('click', '.btn-pdf', function () {
		    document.getElementById("forms").submit();
        });

        $(document).on('click', '.btn-delete', function () {
            var url = $(this).attr('data-href');
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "GET",
                        url: url,
                        success: function (response) {
                            table.ajax.reload(null, true);
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success"
                            });
                        }
                    });
                }
            });
        });
    });

</script>
@endsection
