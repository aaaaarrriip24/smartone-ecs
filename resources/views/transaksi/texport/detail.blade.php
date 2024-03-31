@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Detail Realisasi Export</div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Kode Transaksi</label>
                        <input type="text" name="kode_export" class="form-control form-control-sm" value="{{ $data->kode_export }}" required="required">
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
                <div class="col-6">
                    <div class="form-group">
                        <label>Tanggal Transaksi</label>
                        <input type="date" name="tanggal_export" class="form-control form-control-sm" value="{{ $data->tanggal_export }}" required="required">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Produk</label>
                        <input type="text" name="produk" class="form-control form-control-sm" value="{{ $data->produk }}" required="required">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Nilai Transaksi</label>
                        <input type="number" name="nilai_transaksi" class="form-control form-control-sm" value="{{ $data->nilai_transaksi }}" required="required">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Negara Tujuan</label>
                        <select name="id_negara_tujuan" class="form-control form-control-sm select_negara" required="required">
                            <option value="{{ $data->id_negara_tujuan }}">{{ $data->en_short_name }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Nama Buyer</label>
                        <input type="text" name="nama_buyer" class="form-control form-control-sm" value="{{ $data->nama_buyer }}" placeholder="John Doe" required="required">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email_buyer" class="form-control form-control-sm" value="{{ $data->email_buyer }}" placeholder="john@email.com" required="required">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Telfon</label>
                        <input type="number" name="telp_buyer" class="form-control form-control-sm" value="{{ $data->telp_buyer }}" required="required">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Dokumen Pendukung</label>
                        <input type="file" name="dok_pendukung" class="form-control form-control-sm" value="{{ $data->dok_pendukung }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Bukti Dokumen</label>
                        <input type="file" name="bukti_dok" class="form-control form-control-sm" value="{{ $data->bukti_dok }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer gap-2">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
        </div>
</div>
@endsection