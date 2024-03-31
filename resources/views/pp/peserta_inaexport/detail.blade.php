@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Detail Peserta Inaexport</div>
    <input hidden type="text" name="id" value="{{ $data->id }}">
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Kode Perusahaan</label>
                    <select name="id_perusahaan" class="form-control form-control-sm" disabled>
                        <option value="{{ $data->id_perusahaan }}">{{ $data->kode_perusahaan }}</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Tanggal Registrasi</label>
                    <input type="date" name="tanggal_registrasi_inaexport" class="form-control form-control-sm" value="{{ $data->tanggal_registrasi_inaexport }}" disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Petugas Verifikator</label>
                    <select name="id_petugas" class="form-control form-control-sm" disabled>
                        <option value="{{ $data->id_petugas }}">{{ $data->nama_petugas }}</option>
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
