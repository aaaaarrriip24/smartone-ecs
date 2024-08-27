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
            <h4 class="mb-sm-0">Transaksi Partisipasi Perusahaan</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Transaksi</a></li>
                    <li class="breadcrumb-item active">Partisipasi Perusahaan</li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('partisipasi/add') }}" class="btn btn-sm btn-primary text-light" type="text">Add</a>
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
                <h5 class="card-title mb-0">Partisipasi Perusahaan</h5>
            </div>
            <form action="{{ url('partisipasi/pdf') }}" id="forms" method="post" target="_blank">
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

                            <table id="dt_bm"
                                class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                style="width:100%">
                                <thead>
                                    <th>No. </th>
                                    <th>Perusahaan</th>
                                    <th>Kegiatan</th>
                                    <th>Tanggal Partisipasi</th>
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
<!-- Modal -->
<div class="modal fade" id="pesertaBM" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="{{ url('ppbm/store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Peserta Business Matching</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Perusahaan</label>
                        <input hidden type="text" name="id_bm" class="get_id_bm">
                        <select name="id_perusahaan[]" class="form-control form-control-sm select_perusahaan" required
                            multiple="multiple"></select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
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

        table = $('#dt_bm').DataTable({
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
                url: base_url + "transaksi/partisipasi",
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
                    data: 'perusahaan',
                    name: 'perusahaan',
                    orderable: true,
                    render: function(data, type, row) {
                        return row.perusahaan.substr(0,30);
                    }
                },
                {
                    data: 'kegiatan',
                    name: 'kegiatan',
                    orderable: true,
                },
                {
                    data: 'tgl_partisipasi',
                    name: 'tgl_partisipasi',
                    orderable: true,
                    render: function (data, type, row) {
                        return moment(row.tgl_partisipasi).format('DD-MMM-YYYY');
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    className: 'text-center',
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

        $(document).on("click", ".btn-peserta", function () {
            let data = table.row($(this).closest('tr')).data();
            let peserta = data.peserta_bm;
            $('.select_perusahaan').empty();
            for (let index = 0; index < peserta.length; index++) {
                const element = peserta[index];
                $('.select_perusahaan').append(
                    `<option value="${element.id}" selected>${element.nama_perusahaan} - ${element.nama_tipe}</option>`
                )

            }
            $('#pesertaBM').modal('show');

            console.log(data);
            $(".get_id_bm").val(data.id);
        })

        // 
        $(".select_perusahaan").select2({
            placeholder: "Pilih Perusahaan",
            dropdownParent: $('#pesertaBM'),
            width: '100%',
            allowClear: true,
            ajax: {
                url: base_url + 'partperusahaan/show',
                dataType: 'json',
                data: function (params) {
                    params.id_bm = $('.get_id_bm').val();
                    return params
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                id: item.id,
                                text: item.nama_perusahaan + ', ' + item.nama_tipe,
                            }
                        })
                    };
                },
            }
        }).on('select2:select', function (e) {
            var data = e.params.data;
        });
    });

</script>
@endsection
