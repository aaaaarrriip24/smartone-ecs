@extends('layouts.app')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Transaksi Realisasi Export</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Transaksi</a></li>
                    <li class="breadcrumb-item active">Realisasi Export</li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('export/add') }}" type="text">Add</a>
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
                <h5 class="card-title mb-0">Realisasi Export</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 table-responsive">
                        <table id="dt_export"
                            class="table table-bordered dt-responsive nowrap table-striped align-middle"
                            style="width:100%">
                            <thead>
                                <th>No. </th>
                                <th>Nama Perusahaan</th>
                                <th>Produk Detail</th>
                                <th>Tanggal Realisasi</th>
                                <th>Tanggal Lapor</th>
                                <th>Nilai Transaksi</th>
                                <th>Negara Tujuan</th>
                                <th>Nama Buyer</th>
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
    const formatter = new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',

    // These options are needed to round to whole numbers if that's what you want.
    //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
    //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
    });
    $(document).ready(function () {

        table = $('#dt_export').DataTable({
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
            ajax: base_url + "transaksi/export",
            columns: [{
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
                    render: function (data, type, row) {
                        let text = row.nama_perusahaan;
                        let result = text.toUpperCase();
                        return result + ", " + row.nama_tipe;
                    }
                },
                {
                    data: 'detail_produk_utama',
                    name: 'detail_produk_utama',
                    orderable: true,
                },
                {
                    data: 'tanggal_export',
                    name: 'tanggal_export',
                    orderable: true,
                    render: function (data, type, row) {
                        var tanggal = row.tanggal_export;
                        if(tanggal == null) {
                            tanggal = "-";
                            return tanggal;
                        } else {
                            return moment(tanggal).format('DD-MMM-YYYY');
                        }
                    }
                },
                {
                    data: 'tanggal_lapor',
                    name: 'tanggal_lapor',
                    orderable: true,
                    render: function (data, type, row) {
                        return moment(row.tanggal_lapor).format('DD-MMM-YYYY');
                    }
                },
                {
                    data: 'nilai_transaksi',
                    name: 'nilai_transaksi',
                    className: 'text-end',
                    orderable: true,
                    render: function (data, type, row) {
                        return new Intl.NumberFormat().format(row.nilai_transaksi);
                    }
                },
                {
                    data: 'en_short_name',
                    name: 'en_short_name',
                    orderable: true,
                },
                {
                    data: 'nama_buyer',
                    name: 'nama_buyer',
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
