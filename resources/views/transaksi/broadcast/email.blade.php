@extends('layouts.app')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Broadcast Email</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Transaksi</a></li>
                    <li class="breadcrumb-item active">Broadcast Email</li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('broadcast/add') }}" type="text">Add</a>
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
                        <table id="dt_perusahaan"
                            class="table table-bordered dt-responsive nowrap table-striped align-middle"
                            style="width:100%">
                            <thead>
                                <button class="btn btn-sm btn-success btn-send-all">Send Email</button>
                                <th># </th>
                                <th>No. </th>
                                <th>Nama Perusahaan</th>
                                <th>Email</th>
                                <th>Action</th>
                            </thead>
                        </table>
                    </div>
                </div>
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
            ajax: base_url + "transaksi/broadcast",
            columns: [{
                    data: 'checkbox',
                    name: 'checkbox',
                    orderable: false,
                    searchable: false,
                    className: 'text-center',
                    width: '5%'
                },
                {
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
                    data: 'email',
                    name: 'email',
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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $(".btn-send-all").click(function () {
            var selectRowsCount = $("input[class='perusahaan-checkbox']:checked").length;

            if (selectRowsCount > 0) {

                var ids = $.map($("input[class='perusahaan-checkbox']:checked"), function (c) {
                    return c.value;
                });

                $.ajax({
                    type: 'POST',
                    url: base_url + "broadcast/send_email",
                    data: {
                        ids: ids
                    },
                    success: function (data) {
                        Swal.fire({
                            title: "Success!",
                            text: "Send email successfully!",
                            icon: "success"
                        });
                    }
                });

            } else {
                Swal.fire({
                    title: "Error!",
                    text: "Silahkan Pilih Setidaknya 1 Perusahaan",
                    icon: "error"
                });
            }
            console.log(selectRowsCount);
        });
    });

</script>
@endsection
