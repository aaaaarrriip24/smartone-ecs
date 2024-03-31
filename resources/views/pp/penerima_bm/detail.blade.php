@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Detail Business Matching</div>
    <div class="card-body">
        <div class="row">
            <div class="col-6 mb-2">
                <div class="form-group">
                    <label>Kode BM</label>
                    <input type="text" name="kode_bm" class="form-control form-control-sm" value="{{ $data->kode_bm }}" disabled>
                </div>
            </div>
            <div class="col-6 mb-2">
                <div class="form-group">
                    <label>Tanggal BM</label>
                    <input type="date" name="tanggal_bm" class="form-control form-control-sm" value="{{ $data->tanggal_bm }}" disabled>
                </div>
            </div>
            <div class="col-6 mb-2">
                <div class="form-group">
                    <label>Negara Buyer</label>
                    <select name="id_negara_buyer" class="form-control form-control-sm select_negara" disabled>
                        <option value="{{ $data->id_negara_buyer }}">{{ $data->en_short_name }}</option>
                    </select>
                </div>
            </div>
            <div class="col-6 mb-2">
                <div class="form-group">
                    <label>Pelaksanaan BM</label>
                    <input type="text" name="pelaksanaan_bm" class="form-control form-control-sm" value="{{ $data->pelaksanaan_bm }}" disabled>
                </div>
            </div>
            <div class="col-6 mb-2">
                <div class="form-group">
                    <label>Info Asal Buyer</label>
                    <input type="text" name="info_asal_buyer" class="form-control form-control-sm" value="{{ $data->info_asal_buyer }}" disabled>
                </div>
            </div>
            <div class="col-6 mb-2">
                <div class="form-group">
                    <label>Nama Buyer</label>
                    <input type="text" name="nama_buyer" class="form-control form-control-sm" value="{{ $data->nama_buyer }}" disabled>
                </div>
            </div>
            <div class="col-6 mb-2">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email_buyer" class="form-control form-control-sm" value="{{ $data->email_buyer }}" disabled>
                </div>
            </div>
            <div class="col-6 mb-2">
                <div class="form-group">
                    <label>Telfon</label>
                    <input type="text" name="telp_buyer" class="form-control form-control-sm" value="{{ $data->telp_buyer }}" disabled>
                </div>
            </div>
            <div class="col-6 mb-2">
                <div class="form-group">
                    <label>Catatan</label>
                    <input type="text" name="catatan" class="form-control form-control-sm" value="{{ $data->catatan }}" disabled>
                </div>
            </div>
            <div class="col-12">
            <div class="card m-0" style="max-width: 18rem;">
                    <div class="card-header">
                        <h5 class="card-title">Foto BM</h5>
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
