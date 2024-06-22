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
                        <a href="{{ url('perusahaan/add') }}" type="text">Add</a>
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
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 table-responsive">
                        <table id="dt_perusahaan" class="table table-bordered dt-responsive nowrap table-striped align-middle"
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
                                <th>Action</th>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

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
            ajax: base_url + "master/perusahaan",
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
                        if(str == null) {
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
                        if(str_prov == null) {
                            str_prov = "-";
                        }
                        if(str == null) {
                            str = "-";
                        }
                        if(alamat == null) {
                            alamat = "-";
                        }

                        function titleCase(str) {
                            var splitStr = str.toLowerCase().split(' ');
                            for (var i = 0; i < splitStr.length; i++) {
                                // You do not need to check if i is larger than splitStr length, as your for does that for you
                                // Assign it back to the array
                                splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].substring(1);     
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
