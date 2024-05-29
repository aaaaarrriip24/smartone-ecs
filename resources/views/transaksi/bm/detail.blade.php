@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Detail Business Matching</div>
    <div class="card-body">
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-0 labelInput">Kode BM</label>
                    <input type="text" name="kode_bm" class="form-control form-control-sm" value="{{ $data->kode_bm }}"
                        required disabled>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-0 labelInput">Tanggal BM</label>
                    <input type="date" name="tanggal_bm" class="form-control form-control-sm"
                        value="{{ $data->tanggal_bm }}" required disabled>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-0 labelInput">Negara Buyer</label>
                    <select name="id_negara_buyer" class="form-control form-control-sm select_negara" required disabled>
                        <option value="{{ $data->id_negara_buyer }}">{{ $data->en_short_name }}</option>
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-0 labelInput">Nama Buyer</label>
                    <input type="text" name="nama_buyer" class="form-control form-control-sm"
                        value="{{ $data->nama_buyer }}" required disabled>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Produk BM</label>
                    <input type="text" name="produk_bm" class="form-control form-control-sm"
                        value="{{ $data->produk_bm }}" disabled>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Pelaksanaan BM</label>
                    <input type="text" name="pelaksanaan_bm" class="form-control form-control-sm"
                        value="{{ $data->pelaksanaan_bm }}" disabled>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput" class="form-label mb-1 mt-2 labelInput">Info Asal
                        Buyer</label>
                    <select name="info_asal_buyer" class="form-select select_info" required disabled>
                        <option value="{{ $data->info_asal_buyer }}" selected>{{ $data->info_asal_buyer }}</option>
                        <option value="Buyer Langsung">Buyer Langsung</option>
                        <option value="Perwadag">Perwadag</option>
                        <option value="KBRI">KBRI</option>
                        <option value="Konjen">Konjen</option>
                        <option value="Buying Agent">Buying Agent</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Email Buyer</label>
                    <input type="email" name="email_buyer" class="form-control form-control-sm"
                        value="{{ $data->email_buyer }}" disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Catatan</label>
                    <textarea class="form-control" name="catatan" placeholder="Catatan" id="floatingTextarea"
                        rows="3" disabled>{{ $data->catatan }}"</textarea>
                    <!-- <input type="text" name="catatan" class="form-control form-control-sm"
                            value="{{ $data->catatan }}"> -->
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Telfon Buyer</label>
                    <input type="number" name="telp_buyer" class="form-control form-control-sm"
                        value="{{ $data->telp_buyer }}" disabled>
                </div>
            </div>
            <div class="col-3">
                <div class="card mt-4" style="max-width: 18rem;">
                    <div class="card-header">
                        <h5 class="card-title labelInput">Foto BM</h5>
                    </div>
                    <img src="{{ $file }}" class="card-img-bottom" alt="..." style="max-width: 540px;">
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer gap-2">
        <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">Kembali</a>
    </div>
</div>
@endsection
