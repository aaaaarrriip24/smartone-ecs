@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Detail Partisipasi Perusahaan</div>
    <div class="card-body">
        <div class="row">
            <div class="col-2">
                <div class="form-group">
                    <label class="form-label mb-1 mt-0 labelInput">Kode Partisipasi</label>
                    <input type="text" name="kode_partisipasi" class="form-control form-control-sm"
                        value="{{ $data->kode_partisipasi }}" required disabled>
                    <input hidden type="text" name="kode_partisipasi_old" class="form-control form-control-sm"
                        value="{{ $data->kode_partisipasi }}" required disabled>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label class="form-label mb-1 mt-0 labelInput">Tanggal Partisipasi</label>
                    <input type="text" name="tgl_partisipasi" autocomplete="off"
                        class="form-control form-control-sm datepicker"
                        value="{{ date('d-m-Y', strtotime($data->tgl_partisipasi)) }}" disabled>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-0 labelInput">Nama Kegiatan</label>
                    <input type="text" name="kegiatan" class="form-control form-control-sm"
                        value="{{ $data->kegiatan }}" disabled>
                </div>
            </div>
            <div class="col-5">
                <div class="form-group">
                    <label class="form-label mb-1 labelInput">Peserta Business Matching</label>
                    <select name="id_perusahaan[]" class="form-control form-control-sm form-select select_perusahaan"
                        disabled multiple="multiple">
                        @foreach( $peserta as $p )
                        <option value="{{ $p->id }}" selected>{{ $p->nama_tipe }}, {{ $p->nama_perusahaan }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer gap-2">
        <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">Kembali</a>
    </div>
</div>
@endsection
@section('js')
<script>
    $(".datepicker").datepicker({
        format: 'dd-mm-yyyy'
    });

    $(".select_perusahaan").select2({});

    $('#summernote').summernote('disable');

</script>
@endsection
