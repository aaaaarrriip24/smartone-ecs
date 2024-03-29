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
                        <a href="javascript:void(0);" type="text" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add
                        </a>
                    </li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Header
            </div>
            <div class="card-body">
                @foreach($data as $d)
                <form action="{{ url('perusahaan/edit/'.$d->id) }}" method="post" multipart...>
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <h6 class="fw-semibold">Provinsi</h6>
                            <select class="select_provinsi" name="provinsi" id="test_select">
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <h6 class="fw-semibold">Kabupaten/Kota</h6>
                            <select class="select_kabkota" name="kabkota"></select>
                        </div>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- end page title -->
@endsection

@section('js')
<!-- <script>
    function onChangeSelect(url, id, name) {
        // send ajax request to get the cities of the selected province and append to the select tag
        $.ajax({
            url: url,
            type: 'GET',
            data: {
                id: id
            },
            success: function (data) {
                console.log(data);
                $('#' + name).empty();
                $('#' + name).append('<option>Pilih Salah Satu</option>');
                $.each(data, function (key, value) {
                    $('#' + name).append('<option value="' + key + '">' + value + '</option>');
                });
            }
        });
    }
    $(function () {
        $('.select_kabkota').on('change', function () {
            onChangeSelect('{{ url("cities") }}', $(this).val(), 'kota');
        });
    });

</script> -->

<script>
    $(document).ready(function (url, id, name) {
        $('.select_provinsi').select2({
            placeholder: 'Pilih Provinsi',
            ajax: {
                url: base_url + "provinces",
                data: {
                    id: id
                },
                processResults: data => {
                    return {
                        results: data.data.map((item) => {
                            return {
                                text: item.name,
                                id: item.id
                            };
                        }),
                    };
                },
            }
        });

        $('.select_kabkota').select2({
            placeholder: 'Select an item',
            ajax: {
                url: base_url + "cities",
                dataType: 'json',
                processResults: data => {
                    return {
                        results: data.data.map((item) => {
                            return {
                                text: item.name,
                                id: item.id
                            };
                        }),
                    };
                },
            }
        })
    });

</script>
@endsection
