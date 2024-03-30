@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Detail Konsultasi</div>
    <div class="card-body">
        @foreach($data as $d)
        <div class="form-group">
            <label>Kode Konsultasi</label>
            <input type="text" name="kode_konsultasi" class="form-control form-control-sm" value="{{ $d->kode_perusahaan }}"
                disabled>
        </div>
        <div class="form-group">
            <label>Kode Perusahaan</label>
            <select name="id_perusahaan" class="form-control form-control-sm select_perusahaan" disabled>
                <option value="{{ $d->kode_perusahaan }}" selected disabled>{{ $d->kode_perusahaan }}</option>
            </select>
        </div>
        <div class="form-group">
            <label>Tanggal Konsultasi</label>
            <input type="date" name="tanggal_konsultasi" class="form-control form-control-sm" value="{{ $d->tanggal_konsultasi }}" disabled>
        </div>
        <div class="form-group">
            <label>Cara Konsultasi</label>
            <select name="cara_konsultasi" class="form-control form-control-sm" required="required" disabled>
                <option value="{{ $d->cara_konsultasi }}" selected disabled>{{ $d->cara_konsultasi }}</option>
            </select>
        </div>
        <div class="form-group">
            <label>Tempat Pertemuan</label>
            <input type="text" name="tempat_pertemuan" class="form-control form-control-sm" value="{{ $d->tempat_pertemuan }}" disabled>
        </div>
        <div class="form-group">
            <label>Topik</label>
            <select name="id_topik" class="form-control form-control-sm" disabled>
                <option value="{{ $d->id_topik }}" selected disabled>{{ $d->id_topik }}</option>

            </select>
        </div>
        <div class="form-group">
            <label>Isi Topik</label>
            <input type="text" name="isi_konsultasi" class="form-control form-control-sm" value="{{ $d->isi_konsultasi }}" disabled>
        </div>
        <div class="form-group">
            <label>Foto</label>
            <input type="file" name="foto_pertemuan" class="form-control form-control-sm" value="{{ $d->foto_pertemuan }}" disabled>
        </div>
        <div class="form-group">
            <label>Petugas</label>
            <select name="id_petugas" class="form-control form-control-sm" disabled>
                <option value="{{ $d->id_petugas }}" selected disabled>{{ $d->id_petugas }}</option>
            </select>
        </div>
    @endforeach
    </div>
    <div class="card-footer gap-2">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
    </div>
</div>
@endsection
