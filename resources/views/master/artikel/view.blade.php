@extends('layouts.app')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Master Artikel</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Master</a></li>
                    <li class="breadcrumb-item active">Artikel</li>
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
                <h5 class="card-title mb-0">Artikel</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 table-responsive">
                        <table id="dt_k_artikel"
                            class="table table-bordered dt-responsive nowrap table-striped align-middle"
                            style="width:100%">
                            <thead>
                                <th>No.</th>
                                <th>Judul Artikel</th>
                                <th>Deskripsi Artikel</th>
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
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="{{ url('artikel/store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAddLabel">Add Artikel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Judul Artikel</label>
                        <input type="text" name="judul" class="form-control form-control-sm" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Artikel</label>
                        <textarea name="deskripsi" class="form-control form-control-sm" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="gambar[]" class="form-control form-control-sm" accept="image/*" multiple required>
                        <div id="previewImages" class="mt-2"></div>
                    </div>
                    <div class="form-group">
                        <label>Penulis</label>
                        <select name="id_penulis" class="form-control form-control-sm selectPetugas" required>
                            <option value="">Pilih Penulis</option>
                            @foreach($penulis as $penulisItem)
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
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="{{ url('artikel/update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="editArtikelId">
                
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel">Edit Artikel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Judul Artikel</label>
                        <input type="text" name="judul" class="form-control form-control-sm" id="editJudul" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Artikel</label>
                        <textarea name="deskripsi" class="form-control form-control-sm" id="editDeskripsi" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="gambar[]" class="form-control form-control-sm" accept="image/*" multiple>
                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
                        <div id="existingImages" class="mt-2"></div>
                    </div>
                    <div class="form-group">
                        <label>Penulis</label>
                        <select name="id_penulis" class="form-control form-control-sm selectPetugas" id="editPenulis" required>
                            <option value="">Pilih Penulis</option>
                            @foreach($penulis as $penulisItem)
                                <option value="{{ $penulisItem->id }}">{{ $penulisItem->nama_petugas }}</option>
                            @endforeach
                        </select>
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
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetailLabel">Detail Artikel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Judul Artikel</label>
                    <input type="text" name="judul" class="form-control form-control-sm" id="detailJudul" disabled>
                </div>
                <div class="form-group">
                    <label>Deskripsi Artikel</label>
                    <textarea name="deskripsi" class="form-control form-control-sm" id="detailDeskripsi" disabled></textarea>
                </div>
                <div class="form-group">
                    <label>Gambar</label>
                    <div id="existingImagesDetail" class="mt-2"></div>
                </div>
                <div class="form-group">
                    <label>Penulis</label>
                    <select name="id_penulis" class="form-control form-control-sm selectPetugas" id="detailPenulis" disabled>
                        <option value="">Pilih Penulis</option>
                        @foreach($penulis as $penulisItem)
                            <option value="{{ $penulisItem->id }}">{{ $penulisItem->nama_petugas }}</option>
                        @endforeach
                    </select>
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
        table = $('#dt_k_artikel').DataTable({
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
            ajax: base_url + "master/artikel",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    className: 'text-center',
                    width: '5%'
                },
                {
                    data: 'judul',
                    name: 'judul',
                    orderable: true,
                },
                {
                    data: 'deskripsi',
                    name: 'deskripsi',
                    orderable: true,
                    render: function(data, type, row) {
                        if (type === 'display') {
                            var limit = 100;
                            if (data.length > limit) {
                                return data.substr(0, limit) + '...';
                            }
                        }
                        return data;
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    className: 'text-center'
                }
            ],
        });
    });

    // Load data for editing and detail modals
    function loadEditData(id) {
        $.get(base_url + 'artikel/' + id, function (data) {
            $('#editArtikelId').val(data.id);
            $('#editJudul').val(data.judul);
            $('#editDeskripsi').val(data.deskripsi);
            $('#editPenulis').val(data.id_penulis).change();

            let imagesHtml = '';
            data.gambar.forEach(function (image) {
                imagesHtml += `<img src="${base_url}storage/artikel/${image}" class="img-thumbnail m-1" width="100">`;
            });
            $('#existingImages').html(imagesHtml);
        });
    }

    function loadDetailData(id) {
        $.get(base_url + 'artikel/' + id, function (data) {
            $('#detailJudul').val(data.judul);
            $('#detailDeskripsi').val(data.deskripsi);
            $('#detailPenulis').val(data.id_penulis).change();

            let imagesHtml = '';
            data.gambar.forEach(function (image) {
                imagesHtml += `<img src="${base_url}storage/artikel/${image}" class="img-thumbnail m-1" width="100">`;
            });
            $('#existingImagesDetail').html(imagesHtml);
        });
    }

    function deleteData(id) {
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: base_url + 'artikel/delete/' + id,
                    type: "DELETE",
                    success: function (data) {
                        table.ajax.reload();
                        Swal.fire("Terhapus!", "Data berhasil dihapus.", "success");
                    },
                });
            }
        });
    }
</script>
@endsection
