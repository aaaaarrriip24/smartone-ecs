@extends('layouts.app')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Master Perusahaan</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Master</a></li>
                    <li class="breadcrumb-item active">Perusahaan</li>
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
                <h5 class="card-title mb-0">Perusahaan</h5>
            </div>
            <form action="{{ url('perusahaan/pdf') }}" id="forms" method="post" target="_blank">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <div class="col-md-6">
                                <div class="row g-0">
                                    <label class="form-label">Rentang Perusahaan</label>
                                    <div class="col-sm-5 p-0">
                                        <select name="select_perusahaan1"
                                            class="form-control form-control-sm select_perusahaan1 filter"></select>
                                    </div>
                                    <div class="col-sm-1 mb-0 p-0 text-center">
                                        <button class="btn btn-sm btn-secondary">&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;</button>
                                    </div>
                                    <div class="col-sm-5 p-0">
                                        <select name="select_perusahaan2"
                                            class="form-control form-control-sm select_perusahaan2 filter"></select>
                                    </div>
                                </div>
                            </div>
                            <table id="dt_perusahaan"
                                class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                style="width:100%">
                                <thead>
                                    <th>No. </th>
                                    <!-- <th>Kode</th> -->
                                    <th class="d-none">Merk Produk</th>
                                    <th class="d-none">Detail Produk</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Alamat Perusahaan</th>
                                    <!-- <th>Email</th> -->
                                    <th>No. Kontak</th>
                                    <th>Kategori Produk</th>
                                    <th>Status (CL/ NC)</th>
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
        $('.filter').on('change', function (e) {
            table.ajax.reload(null, false);
        });

        table = $('#dt_perusahaan').DataTable({
            autoWidth: false,
            responsive: false,
            scrollCollapse: true,
            processing: true,
            serverSide: true,
            paginate: true,
            lengthChange: true,
            filter: true,
            sort: true,
            info: true,
            ajax: {
                url: base_url + "master/perusahaan",
                type: "GET",
                data: function (data) {
                    if ($(".in").val() != "") data.in = $(".in").val();
                    if ($('.select_perusahaan1').val() != '') data.select_perusahaan1 = $('.select_perusahaan1').val();
                    if ($('.select_perusahaan2').val() != '') data.select_perusahaan2 = $('.select_perusahaan2').val();
                    // data.select_perusahaan1 = moment($('.tglawal').val(), 'DD-MM-YYYY').format('YYYY-MM-DD');
                    // data.select_perusahaan2 = moment($('.tglakhir').val(), 'DD-MM-YYYY').format('YYYY-MM-DD');
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
                // {
                //     data: 'kode_perusahaan',
                //     name: 'kode_perusahaan',
                //     orderable: true,
                // },
                {
                    data: 'merek_produk',
                    name: 'merek_produk',
                    visible: false,
                },
                {
                    data: 'detail_produk_utama',
                    name: 'detail_produk_utama',
                    visible: false,
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
                    data: 'alamat_perusahaan',
                    name: 'alamat_perusahaan',
                    orderable: true,
                    render: function (data, type, row, meta) {
                        var alamat = row.alamat_perusahaan;
                        var str = row.cities;
                        var str_prov = row.provinsi;
                        if (str_prov == null) {
                            str_prov = "-";
                        }
                        if (str == null) {
                            str = "-";
                        }
                        if (alamat == null) {
                            alamat = "-";
                        }

                        function titleCase(str) {
                            var splitStr = str.toLowerCase().split(' ');
                            for (var i = 0; i < splitStr.length; i++) {
                                // You do not need to check if i is larger than splitStr length, as your for does that for you
                                // Assign it back to the array
                                splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i]
                                    .substring(1);
                            }
                            // Directly return the joined string
                            return splitStr.join(' ');
                        }
                        return alamat + "<br>" + titleCase(str) + "<br>" + titleCase(str_prov);
                    }
                },
                // {
                //     data: 'email',
                //     name: 'email',
                //     orderable: true,
                // },
                {
                    data: 'telp_contact_person',
                    name: 'telp_contact_person',
                    orderable: true,
                },
                {
                    data: 'sub_kategori',
                    name: 'sub_kategori',
                    orderable: true,
                },
                {
                    data: 'status_data',
                    name: 'status_data',
                    orderable: true,
                }
            ]
        });

        $(".select_perusahaan1").select2({
            placeholder: "Pilih Perusahaan",
            width: '100%',
            allowClear: true,
            ajax: {
                url: base_url + 'select/filterperusahaan',
                dataType: 'json',
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                id: item.id,
                                text: item.kode_perusahaan.toUpperCase()
                            }
                        })
                    };
                },
            }
        }).on('select2:select', function (e) {
            var data = e.params.data;
            $(".produk_detail").val(data.produk);
        });

        $(".select_perusahaan2").select2({
            placeholder: "Pilih Perusahaan",
            width: '100%',
            allowClear: true,
            ajax: {
                url: base_url + 'select/filterperusahaan',
                dataType: 'json',
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                id: item.id,
                                text: item.kode_perusahaan.toUpperCase()
                            }
                        })
                    };
                },
            }
        }).on('select2:select', function (e) {
            var data = e.params.data;
            $(".produk_detail").val(data.produk);
        });
        
        $(document).on('click', '.btn-pdf', function () {
            document.getElementById("forms").submit();
        });
    });

</script>
@endsection