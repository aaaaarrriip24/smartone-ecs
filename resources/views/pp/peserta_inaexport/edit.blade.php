@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Edit Peserta Inaexport</div>
    <form method="post" action="{{ url('p_inaexport/update') }}" enctype="multipart/form-data">
        @csrf
        <input hidden type="text" name="id" value="{{ $data->id }}">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Kode Perusahaan</label>
                        <select name="id_perusahaan" class="form-control form-control-sm select_perusahaan" required="required">
                            <option value="{{ $data->id_perusahaan }}">{{ $data->kode_perusahaan }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Tanggal Registrasi</label>
                        <input type="date" name="tanggal_registrasi_inaexport" class="form-control form-control-sm"
                            value="{{ $data->tanggal_registrasi_inaexport }}" required="required">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Petugas Verifikator</label>
                        <select name="id_petugas" class="form-control form-control-sm select_petugas" required="required">
                            <option value="{{ $data->id_petugas }}">{{ $data->nama_petugas }}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer gap-2">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        // Select
        $(".select_petugas").select2({
            placeholder: "Pilih Petugas",
            width: '100%',
            allowClear: true,
            ajax: {
                url: base_url + 'select/petugas',
                dataType: 'json',
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                id: item.id,
                                text: item.nama_petugas,
                            }
                        })
                    };
                },
            }
        }).on('select2:select', function (e) {
            var data = e.params.data;
        });

        $(".select_perusahaan").select2({
            placeholder: "Pilih Perusahaan",
            width: '100%',
            allowClear: true,
            ajax: {
                url: base_url + 'select/perusahaan',
                dataType: 'json',
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                id: item.id,
                                text: item.kode_perusahaan,
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