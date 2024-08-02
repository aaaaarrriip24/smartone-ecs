@extends('layouts.app')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Management User</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Master</a></li>
                    <li class="breadcrumb-item active">User</li>
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0);" class="btn btn-sm btn-primary text-white" type="text" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                <h5 class="card-title mb-0">User</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 table-responsive">
                        <table id="dt_user"
                            class="table table-bordered dt-responsive nowrap table-striped align-middle"
                            style="width:100%">
                            <thead>
                                <th>No. </th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roleuser</th>
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
            <form method="post" action="{{ url('user/store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control form-control-sm" placeholder="John Doe"
                            required>
                    </div>
                    <div class="form-group mb-2">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control form-control-sm"
                            placeholder="john@example.com" required>
                    </div>
                    <div class="form-group mb-2">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control form-control-sm">
                    </div>
                    <div class="form-group mb-2">
                        <label>Roleuser</label>
                        <select name="roleuser" class="form-control form-control-sm form-select selectrole" id=""
                            required>
                            <option value="" selected disabled>Pilih Roleuser</option>
                            <option value="Superadmin">Superadmin</option>
                            <option value="Admin">Admin</option>
                            <option value="User">User</option>
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
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="{{ url('user/update') }}" enctype="multipart/form-data">
                @csrf
                <input hidden type="text" class="form-control" id="id" name="id">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label>Name</label>
                        <input type="text" name="name" class="name form-control form-control-sm" placeholder="John Doe"
                            required>
                    </div>
                    <div class="form-group mb-2">
                        <label>Email</label>
                        <input type="email" name="email" class="email form-control form-control-sm"
                            placeholder="john@example.com" required>
                    </div>
                    <div class="form-group mb-2">
                        <label>Phone</label>
                        <input type="text" name="phone" class="phone form-control form-control-sm">
                    </div>
                    <div class="form-group mb-2">
                        <label>Roleuser</label>
                        <select name="roleuser" class="roleuser form-control form-control-sm form-select selectroleedit"
                            id="" required>
                            <option value="" selected disabled>Pilih Roleuser</option>
                            <option value="Superadmin">Superadmin</option>
                            <option value="Admin">Admin</option>
                            <option value="User">User</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Detail User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group mb-2">
                    <label>Name</label>
                    <input type="text" disabled name="name" class="name form-control form-control-sm" placeholder="John Doe"
                        required>
                </div>
                <div class="form-group mb-2">
                    <label>Email</label>
                    <input type="email" disabled name="email" class="email form-control form-control-sm"
                        placeholder="john@example.com" required>
                </div>
                <div class="form-group mb-2">
                    <label>Phone</label>
                    <input type="text" disabled name="phone" class="phone form-control form-control-sm">
                </div>
                <div class="form-group mb-2">
                    <label>Roleuser</label>
                    <select name="roleuser" disabled class="roleuser form-control form-control-sm form-select selectroledetail"
                        id="" required>
                        <option value="" selected disabled>Pilih Roleuser</option>
                        <option value="Superadmin">Superadmin</option>
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>

        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    let table;
    $(document).ready(function () {
        $('.selectrole').select2({
            dropdownParent: $('#exampleModal')
        });
        table = $('#dt_user').DataTable({
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
            ajax: base_url + "setting/user",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    className: 'text-center',
                    width: '5%'
                },
                {
                    data: 'name',
                    name: 'name',
                    orderable: true,
                },
                {
                    data: 'email',
                    name: 'email',
                    orderable: true,
                },
                {
                    data: 'roleuser',
                    name: 'roleuser',
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
                url: base_url + "user/show/" + id,
                success: function (response) {
                    console.log(response);
                    $('#id').val(id);
                    $('.name').val(response.data.name);
                    $('.email').val(response.data.email);
                    $('.phone').val(response.data.phone);
                    $('.roleuser').val(response.data.roleuser);
                }
            });
        });

        $(document).on('click', '.btn-detail', function () {
            var id = $(this).val();
            // alert(id);
            $('#modalDetail').modal('show');

            $.ajax({
                type: "GET",
                url: base_url + "user/show/" + id,
                success: function (response) {
                    console.log(response);
                    $('#id').val(id);
                    $('.name').val(response.data.name);
                    $('.email').val(response.data.email);
                    $('.phone').val(response.data.phone);
                    $('.roleuser').val(response.data.roleuser);
                }
            });
        });
        $(document).on('click', '.btn-send', function () {
            var url = $(this).attr('data-href');
            Swal.fire({
                title: "Send Password?",
                text: "You want to send Password to this User!",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Send it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "GET",
                        url: url,
                        success: function (response) {
                            table.ajax.reload(null, true);
                            Swal.fire({
                                title: "Sended!",
                                text: "User has received password email.",
                                icon: "success"
                            });
                        }
                    });
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
