@extends('layouts.app')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Master Berita</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Master</a></li>
                    <li class="breadcrumb-item active">Berita</li>
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0);" type="text" data-bs-toggle="modal" data-bs-target="#modalAdd">
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
                <h5 class="card-title mb-0">Berita</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 table-responsive">
                        <table id="dt_k_berita"
                            class="table table-bordered dt-responsive nowrap table-striped align-middle"
                            style="width:100%">
                            <thead>
                                <th>No.</th>
                                <th>Judul Berita</th>
                                <th>Isi Berita</th>
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
<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="{{ url('berita/store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAddLabel">Add Berita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Judul Berita</label>
                        <input type="text" name="judul" class="form-control form-control-sm" required="required">
                    </div>
                    <div class="form-group">
                        <label>Isi Berita</label>
                        <textarea name="isi" class="form-control form-control-sm" required="required"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="gambar" class="form-control form-control-sm" accept="image/*" required="required">
                    </div>
                    <div class="form-group">
                        <label>Penulis</label>
                        <select name="id_penulis" class="form-control form-control-sm selectPetugas" required="required">
                            <option value="">Pilih Penulis</option>
                            @foreach($penulis as $penulisItem) <!-- Pastikan $penulis sudah didefinisikan dalam controller -->
                                <option value="{{ $penulisItem->id }}">{{ $penulisItem->nama_petugas }}</option>
                            @endforeach
                        </select>
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
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="{{ url('berita/update') }}" enctype="multipart/form-data">
                @csrf
                <input hidden type="text" class="form-control" id="id" name="id">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel">Edit Berita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Judul Berita</label>
                        <input type="text" name="judul" class="form-control form-control-sm judul" required="required">
                    </div>
                    <div class="form-group">
                        <label>Isi Berita</label>
                        <textarea name="isi" class="form-control form-control-sm isi" required="required"></textarea>
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
<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetailLabel">Detail Berita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Judul Berita</label>
                    <input type="text" name="judul" class="form-control form-control-sm judul" disabled readonly>
                </div>
                <div class="form-group">
                    <label>Isi Berita</label>
                    <textarea name="isi" class="form-control form-control-sm isi" disabled readonly></textarea>
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
        table = $('#dt_k_berita').DataTable({
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
            ajax: base_url + "master/berita", // Ubah ke URL berita
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    className: 'text-center',
                    width: '5%'
                },
                {
                    data: 'judul', // Sesuaikan dengan nama kolom di database
                    name: 'judul',
                    orderable: true,
                },
                {
                    data: 'isi', // Sesuaikan dengan nama kolom di database
                    name: 'isi',
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
            $('#modalEdit').modal('show');

            $.ajax({
                type: "GET",
                url: base_url + "berita/show/" + id, // Ubah ke URL berita
                success: function (response) {
                    console.log(response);
                    $('#id').val(id);
                    $('.judul').val(response.data.judul); // Sesuaikan dengan nama kolom di database
                    $('.isi').val(response.data.isi); // Sesuaikan dengan nama kolom di database
                }
            });
        });

        // $('.select2').select2(
        //     dropdownParent: $('#modalAdd')
        // );
        
        $(document).on('click', '.btn-detail', function () {
            var id = $(this).val();
            $('#modalDetail').modal('show');

            $.ajax({
                type: "GET",
                url: base_url + "berita/show/" + id, // Ubah ke URL berita
                success: function (response) {
                    console.log(response);
                    $('#id').val(id);
                    $('.judul').val(response.data.judul); // Sesuaikan dengan nama kolom di database
                    $('.isi').val(response.data.isi); // Sesuaikan dengan nama kolom di database
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
    });
</script>
@endsection
