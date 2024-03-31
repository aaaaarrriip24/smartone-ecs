@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Detail Penerima Inquiry</div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Kode Inquiry</label>
                    <select name="id_inquiry" class="form-control form-control-sm select_inquiry" disabled>
                        <option value="{{ $data->id_inquiry }}">{{ $data->kode_inquiry }}</option>
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
