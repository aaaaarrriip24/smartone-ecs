@extends('layouts.app')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Transaksi Business Matching</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Transaksi</a></li>
                    <li class="breadcrumb-item active">Business Matching</li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('bm/add') }}" type="text">Add</a>
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
                <h5 class="card-title mb-0">Business Matching</h5>
            </div>
            <div class="card-body">
                <table id="dt_bm" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                    style="width:100%">
                    <thead>
                        <th>No. </th>
                        <th>Kode BM</th>
                        <th>Pelaksanaan BM</th>
                        <th>Negara Buyer</th>
                        <th>Tanggal BM</th>
                        <th>Action</th>
                    </thead>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    let table;
    $(document).ready(function () {
        
        table = $('#dt_bm').DataTable({
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
            ajax: base_url + "transaksi/bm",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    className: 'text-center',
                    width: '5%'
                },
                {
                    data: 'kode_bm',
                    name: 'kode_bm',
                    orderable: true,
                },
                {
                    data: 'pelaksanaan_bm',
                    name: 'pelaksanaan_bm',
                    orderable: true,
                },
                {
                    data: 'en_short_name',
                    name: 'en_short_name',
                    orderable: true,
                },
                {
                    data: 'tanggal_bm',
                    name: 'tanggal_bm',
                    orderable: true,
                    render: function (data, type, row) {
                        return moment(row.tanggal_bm).format('DD-MMMM-YYYY');
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