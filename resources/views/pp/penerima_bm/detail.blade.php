@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Detail Peserta Business Matching</div>
    <input hidden type="text" name="id" value="{{ $data->id }}">
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Kode BM</label>
                    <select name="id_bm" class="form-control form-control-sm select_bm" disabled>
                        <option value="{{ $data->id_bm }}">{{ $data->kode_bm }}</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Kode Perusahaan</label>
                    <select name="id_perusahaan" class="form-control form-control-sm select_perusahaan" disabled>
                        <option value="{{ $data->id_perusahaan }}">{{ $data->kode_perusahaan }}</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer gap-2">
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
