@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Detail Konsultasi</div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <div class="form-group mb-2">
                    <label>Kode Konsultasi</label>
                    <input type="text" name="kode_konsultasi" class="form-control form-control-sm"
                        value="{{ $data->kode_konsultasi }}" disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-2">
                    <label>Kode Perusahaan</label>
                    <select name="id_perusahaan" class="form-control form-control-sm select_perusahaan" disabled>
                        <option value="{{ $data->kode_perusahaan }}" selected disabled>{{ $data->kode_perusahaan }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-2">
                    <label>Tanggal Konsultasi</label>
                    <input type="date" name="tanggal_konsultasi" class="form-control form-control-sm"
                        value="{{ $data->tanggal_konsultasi }}" disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-2">
                    <label>Cara Konsultasi</label>
                    <select name="cara_konsultasi" class="form-control form-control-sm" required="required" disabled>
                        <option value="{{ $data->cara_konsultasi }}" selected disabled>{{ $data->cara_konsultasi }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-2">
                    <label>Tempat Pertemuan</label>
                    <input type="text" name="tempat_pertemuan" class="form-control form-control-sm"
                        value="{{ $data->tempat_pertemuan }}" disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-2">
                    <label>Topik</label>
                    <select name="id_topik" class="form-control form-control-sm" disabled>
                        <option value="{{ $data->id_topik }}" selected disabled>{{ $data->nama_topik }}</option>

                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-2">
                    <label>Isi Topik</label>
                    <input type="text" name="isi_konsultasi" class="form-control form-control-sm"
                        value="{{ $data->isi_konsultasi }}" disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-2">
                    <label>Petugas</label>
                    <select name="id_petugas" class="form-control form-control-sm" disabled>
                        <option value="{{ $data->id_petugas }}" selected disabled>{{ $data->id_petugas }}</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="card" style="max-width: 18rem;">
                    <div class="card-header">
                        <h5 class="card-title">Foto Pertemuan</h5>
                    </div>
                    <img src="{{ $file }}" class="card-img-bottom" alt="..." style="max-width: 540px;">
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer gap-2">
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
