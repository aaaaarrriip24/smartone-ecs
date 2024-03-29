@extends('layouts.app')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Master Petugas</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Master</a></li>
                    <li class="breadcrumb-item active">Petugas</li>
                    <li class="breadcrumb-item">
                        <a href="#">Add</a>
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
                <h5 class="card-title mb-0">Petugas</h5>
            </div>
            <div class="card-body">
                <table id="dt_petugas" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                    style="width:100%">
                    <thead>
                        <th>No. </th>
                        <th>Nama Petugas</th>
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
$(function() {
    $('#dt_petugas').DataTable({
        "autoWidth": false,
		"responsive": false,
		"scrollCollapse": true,
		"processing": true,
		"serverSide": true,
		"displayLength": 5,
		"paginate": true,
		"lengthChange": true,
		"filter": true,
		"sort": true,
		"info": true,
        ajax: base_url + "master/petugas",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, className: 'text-center', width: '5%'},
            {data: 'nama_petugas', name: 'nama_petugas'},
            {data: 'action', name: 'action', orderable: false, searchable: false, width: '10%'},
        ]
    });
});
</script>
@endsection
