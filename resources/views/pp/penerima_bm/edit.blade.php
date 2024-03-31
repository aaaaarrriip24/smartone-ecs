@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Edit Peserta Business Matching</div>
    <form method="post" action="{{ url('ppbm/update') }}" enctype="multipart/form-data">
        @csrf
        <input hidden type="text" name="id" value="{{ $data->id }}">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Kode BM</label>
                        <select name="id_bm" class="form-control form-control-sm select_bm" required="required">
                            <option value="{{ $data->id_bm }}">{{ $data->kode_bm }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Kode Perusahaan</label>
                        <select name="id_perusahaan" class="form-control form-control-sm select_perusahaan" required="required">
                            <option value="{{ $data->id_perusahaan }}">{{ $data->kode_perusahaan }}</option>
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
        $(".select_bm").select2({
            placeholder: "Pilih Kode BM",
            width: '100%',
            allowClear: true,
            ajax: {
                url: base_url + 'select/bm',
                dataType: 'json',
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                id: item.id,
                                text: item.kode_bm,
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
