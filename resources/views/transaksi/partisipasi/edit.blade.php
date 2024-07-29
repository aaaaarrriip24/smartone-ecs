@extends('layouts.app')
@section('content')
<style>
    .datepicker {
        top: 290px !important;
    }

</style>
<div class="card">
    <div class="card-header">Edit Partisipasi Perusahaan</div>
    <form method="post" action="{{ url('partisipasi/update') }}" enctype="multipart/form-data">
        @csrf
        <input hidden type="text" name="id" class="form-control form-control-sm" value="{{ $data->id }}"
            required="required">
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Kode Partisipasi</label>
                        <input type="text" name="kode_partisipasi" class="form-control form-control-sm"
                            value="{{ $data->kode_partisipasi }}" required disabled>
                        <input hidden type="text" name="kode_partisipasi_old" class="form-control form-control-sm"
                            value="{{ $data->kode_partisipasi }}" required>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Tanggal Partisipasi</label>
                        <input type="text" name="tgl_partisipasi" autocomplete="off"
                            class="form-control form-control-sm datepicker"
                            value="{{ date('d-m-Y', strtotime($data->tgl_partisipasi)) }}" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Nama Kegiatan</label>
                        <input type="text" name="kegiatan" class="form-control form-control-sm"
                            value="{{ $data->kegiatan }}" required>
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <label class="form-label mb-1 labelInput">Peserta Business Matching</label>
                        <select name="id_perusahaan[]"
                            class="form-control form-control-sm form-select select_perusahaan" required
                            multiple="multiple">
                            @foreach( $peserta as $p )
                            <option value="{{ $p->id }}" selected>{{ $p->kode_perusahaan }}, {{ $p->nama_perusahaan }}{{ !empty($p->nama_tipe) ? ', ' . $p->nama_tipe : '' }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer gap-2">
            <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        // Select
        $('#summernote').summernote({
            placeholder: 'Saran dan Solusi yang Diberikan',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['view', ['help']]
            ]
        });

        $(".datepicker").datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
        });

        $(".select_perusahaan").select2({
            placeholder: "Pilih Perusahaan",
            width: '100%',
            allowClear: true,
            ajax: {
                url: base_url + 'ppbm/show',
                dataType: 'json',
                data: function (params) {
                    params.id_bm = $('.get_id_bm').val();
                    return params
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                id: item.id,
                                text: item.kode_perusahaan + ', ' + item.nama_perusahaan +
                                    ', ' + item.nama_tipe,
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
