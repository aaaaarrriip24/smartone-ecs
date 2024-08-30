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
                    <!-- <li class="breadcrumb-item">
                        <a href="{{ url('perusahaan/add') }}" class="btn btn-sm btn-primary text-light"
                            type="text">Add</a>
                    </li> -->
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
                            <div class="col-md-12">
                                <div class="row g-2">
                                    <!-- <div class="col-sm-5 p-0">
                                        <select name="select_perusahaan1"
                                            class="form-control form-control-sm select_perusahaan1 filter"></select>
                                    </div>
                                    <div class="col-sm-1 mb-0 p-0 text-center">
                                        <button class="btn btn-sm btn-secondary">&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;</button>
                                    </div>
                                    <div class="col-sm-5 p-0">
                                        <select name="select_perusahaan2"
                                            class="form-control form-control-sm select_perusahaan2 filter"></select>
                                    </div> -->
                                    <div class="col-sm-3">
                                        <label class="form-label labelInput">Provinsi</label>
                                        <select name="province_id"
                                            class="form-control form-control-sm province_id filter"></select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="form-label labelInput">Kabupaten/Kota</label>
                                        <select name="cities_id"
                                            class="form-control form-control-sm cities_id filter"></select>
                                    </div>
                                    <div class="col-sm-3 step-1">
                                        <!-- <div class="form-group mb-2 div_kategori"> -->
                                        <label class="form-label labelInput">Kategori Produk</label>
                                        <select name="id_kategori_produk"
                                            class="form-control form-control-sm select_k_produk filter"></select>
                                        <!-- </div> -->
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- <div class="form-group mb-2 div_kategori"> -->
                                        <label class="form-label labelInput">Search</label>
                                        <input type="text" name="searchbox"
                                            class="form-control form-control-sm searchbox filter">
                                        <!-- </div> -->
                                    </div>
                                    <div class="col-sm-6 step-1">
                                        <!-- <div class="form-group mb-2 div_sub_kategori"> -->
                                        <label class="form-label labelInput">Sub Kategori Produk</label>
                                        <select name="id_sub_kategori[]"
                                            class="form-control form-control-sm select_sub_produk filter"
                                            multiple="multiple"></select>
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>
                            <table id="dt_perusahaan"
                                class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                style="width:100%">
                                <thead>
                                    <th>No. </th>
                                    <!-- <th>Kode</th> -->
                                    <!-- <th class="d-none">Merk Produk</th>
                                    <th class="d-none">Detail Produk</th> -->
                                    <th>Nama Perusahaan</th>
                                    <th>Alamat Perusahaan</th>
                                    <!-- <th>Email</th> -->
                                    <th>No. Kontak</th>
                                    <th>Sub Kategori Produk</th>
                                    <th>Status (CL/ NC)</th>
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


<!-- Add Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="{{ url('perusahaan/store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Perusahaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Perusahaan</label>
                        <input type="text" name="nama_perusahaan" class="form-control form-control-sm"
                            placeholder="John Doe" required="required">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="{{ url('perusahaan/update') }}" enctype="multipart/form-data">
                @csrf
                <input type="text" class="form-control" id="id" name="id">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Perusahaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Perusahaan</label>
                        <input type="text" name="nama_perusahaan" class="form-control form-control-sm nama_perusahaan"
                            required="required">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Detail Modal -->
<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Perusahaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Perusahaan</label>
                    <input type="text" name="nama_perusahaan" class="form-control form-control-sm nama_perusahaan"
                        disabled readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>

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
            searching: false,
            ajax: {
                url: base_url + "laporan/perusahaan",
                type: "GET",
                data: function (data) {
                    if ($(".in").val() != "") data.in = $(".in").val();
                    if ($('.province_id').val() != '') data.province_id = $('.province_id').val();
                    if ($('.select_k_produk').val() != '') data.id_kategori_produk = $('.select_k_produk').val();
                    if ($('.cities_id').val() != '') data.cities_id = $('.cities_id').val();
                    if ($('.searchbox').val() != '') data.searchbox = $('.searchbox').val();
                    if ($('.select_sub_produk').val() != '') {
                        data.id_sub_kategori = $('.select_sub_produk').val();
                    } else {
                        data.id_sub_kategori = [];
                    }
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
                // {
                //     data: 'merek_produk',
                //     name: 'merek_produk',
                //     visible: false,
                // },
                // {
                //     data: 'detail_produk_utama',
                //     name: 'detail_produk_utama',
                //     visible: false,
                // },
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
                    render: function (data, type, row, meta) {
                        if (data == null) {
                            str = "";
                        } else {
                            str = data;
                        }
                        return str + "<br>" + row.detail_produk_utama;
                    }
                },
                {
                    data: 'status_data',
                    name: 'status_data',
                    orderable: true,
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

        $(".province_id").select2({
            placeholder: "Pilih Provinsi",
            width: '100%',
            allowClear: true,
            ajax: {
                url: base_url + 'perusahaan/provinces',
                dataType: 'json',
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                id: item.code,
                                text: item.name,
                            }
                        })
                    };
                },
            }
        }).on('select2:select', function (e) {
            var data = e.params.data;
        });

        $('.cities_id').select2({
            placeholder: 'Pilih Kota',
            width: '100%',
            allowClear: true,
            ajax: {
                url: base_url + "perusahaan/cities",
                dataType: 'json',
                data: function (params) {
                    params.province_id = $('.province_id').val();
                    return params
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                id: item.code,
                                text: item.name,
                            }
                        })
                    };
                },
            }
        }).on('select2:select', function (e) {
            var data = e.params.data;
        });

        $(".select_k_produk").select2({
            placeholder: "Pilih Kategori Produk",
            width: '100%',
            allowClear: true,
            ajax: {
                url: base_url + 'select/k_produk',
                dataType: 'json',
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                id: item.id,
                                text: item.nama_kategori_produk,
                            }
                        })
                    };
                },
            }
        }).on('select2:select', function (e) {
            var data = e.params.data;
            console.log(data);
        });

        $(".select_sub_produk").select2({
            placeholder: "Pilih Sub Kategori Produk",
            width: '100%',
            allowClear: true,
            ajax: {
                url: base_url + 'select/sub_produk2',
                dataType: 'json',
                data: function (params) {
                    params.id_kategori = $('.select_k_produk').val();
                    return params
                },
                processResults: function (data) {
                    return {
                        results: data.map(function (item) {
                            item.id = item.id;
                            item.text = item.nama_sub_kategori;
                            item.perusahaan = item.id_perusahaan;
                            return item;
                        })
                    };
                },
            }
        }).on('select2:select', function (e) {
            var data = e.params.data;
            console.log(data);
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
