@extends('layouts.app')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Master Sub Kategori Produk</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Master</a></li>
                    <li class="breadcrumb-item active">Sub Kategori Produk</li>
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0);" type="text" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add
                        </a>
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
                <h5 class="card-title mb-0">Sub Kategori Produk</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 table-responsive">
                        <table id="dt_sub_kategori"
                            class="table table-bordered dt-responsive nowrap table-striped align-middle"
                            style="width:100%">
                            <thead>
                                <th>No. </th>
                                <th>Nama Kategori</th>
                                <th>Nama Sub Kategori</th>
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
            <form method="post" action="{{ url('m_sub_kategori/store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Sub Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Nama Kategori Produk</label>
                        <select name="id_kategori" class="form-control form-control-sm form-select select_kategori"></select>
                    </div>
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Nama Sub Kategori Produk</label>
                        <input type="text" name="nama_sub_kategori" class="form-control form-control-sm"
                            required="required">
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
            <form method="post" action="{{ url('m_sub_kategori/update') }}" enctype="multipart/form-data">
                @csrf
                <input hidden type="text" class="form-control" id="id" name="id">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Sub Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Nama Kategori Produk</label>
                        <select name="id_kategori" id="id_kategori" class="form-control form-control-sm form-select edit_select_kategori">
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Nama Sub Kategori Produk</label>
                        <input type="text" name="nama_sub_kategori"
                            class="form-control form-control-sm nama_sub_kategori" required="required">
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
                <h5 class="modal-title" id="exampleModalLabel">Detail Sub Kategori Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Nama Kategori Produk</label>
                    <select name="id_kategori" id="id_kategori" class="form-control form-control-sm form-select detail_select_kategori" disabled readonly></select>
                </div>
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Nama Sub Kategori</label>
                    <input type="text" name="nama_sub_kategori"
                        class="form-control form-control-sm nama_sub_kategori" disabled readonly>
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
        table = $('#dt_sub_kategori').DataTable({
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
            ajax: base_url + "master/m_sub_kategori",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    className: 'text-center',
                    width: '5%'
                },
                {
                    data: 'nama_kategori_produk',
                    name: 'nama_kategori_produk',
                    orderable: true,
                },
                {
                    data: 'nama_sub_kategori',
                    name: 'nama_sub_kategori',
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
        
        $(document).on('click', '.btn-edit', function () {
            var id = $(this).val();
            // alert(id);
            $('#modalEdit').modal('show');

            $.ajax({
                type: "GET",
                url: base_url + "m_sub_kategori/show/" + id,
                success: function (response) {
                    console.log(response);
                    $('#id').val(id);
                    if (response.data.id_kategori != null) {
                        $('#id_kategori').append("<option value='" + response.data.id_kategori +
                            "' selected>" + response.data.nama_kategori_produk + "</option>");
                    } else {
                        $('#id_kategori').empty();
                    }
                    $('.nama_sub_kategori').val(response.data.nama_sub_kategori);
                }
            });
        });

        $(document).on('click', '.btn-detail', function () {
            var id = $(this).val();
            // alert(id);
            $('#modalDetail').modal('show');

            $.ajax({
                type: "GET",
                url: base_url + "m_sub_kategori/show/" + id,
                success: function (response) {
                    console.log(response);
                    $('#id').val(id);
                    if (response.data.id_kategori != null) {
                        $('#id_kategori').append("<option value='" + response.data.id_kategori +
                            "' selected>" + response.data.nama_kategori_produk + "</option>");
                    } else {
                        $('#id_kategori').empty();
                    }
                    $('.nama_sub_kategori').val(response.data.nama_sub_kategori);
                }
            });
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

        $(".select_kategori").select2({
            placeholder: "Pilih Kategori Produk",
            width: '100%',
            dropdownParent: $('#exampleModal'),
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
        });

        $(".edit_select_kategori").select2({
            placeholder: "Pilih Kategori Produk",
            width: '100%',
            dropdownParent: $('#modalEdit'),
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
        });
    });

</script>
@endsection
