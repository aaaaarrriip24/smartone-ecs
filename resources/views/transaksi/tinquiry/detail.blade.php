@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Add Profile Inquiry</div>
    <form method="post" action="{{ url('inquiry/store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Kode BM</label>
                        <input type="text" name="kode_inquiry" class="form-control form-control-sm" value="{{ $data->kode_inquiry }}" disabled>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Tanggal BM</label>
                        <input type="date" name="tanggal_inquiry" class="form-control form-control-sm" value="{{ $data->tanggal_inquiry }}" disabled>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Produk Yang Diminta</label>
                        <input type="text" name="produk_yang_diminta" class="form-control form-control-sm" value="{{ $data->produk_yang_diminta }}" disabled>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Quantity</label>
                        <input type="text" name="qty" class="form-control form-control-sm" value="{{ $data->qty }}" disabled>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Satuan Quantity</label>
                        <select name="satuan_qty" class="form-control form-control-sm" disabled>
                            <option disabled selected>{{ $data->satuan_qty }}</option>
                            <option value="KG">KG</option>
                            <option value="Ton">Ton</option>
                            <option value="Pasang">Pasang</option>
                            <option value="Kontainer">Kontainer</option>
                            <option value="Kodi">Kodi</option>
                            <option value="Pcs">Pcs</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Negara Buyer</label>
                        <select name="id_negara_asal_inquiry" class="form-control form-control-sm select_negara" disabled>
                            <option value="{{ $data->id_negara_asal_inquiry }}">{{ $data->en_short_name }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Nama Buyer</label>
                        <select name="pihak_buyer" class="form-control form-control-sm" disabled>
                            <option disabled selected>{{ $data->pihak_buyer }}</option>
                            <option value="Buyer">Buyer</option>
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
                        <label class="form-label mb-1 mt-2 labelInput">Nama Buyer</label>
                        <input type="text" name="nama_buyer" class="form-control form-control-sm" value="{{ $data->nama_buyer }}" disabled>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Email Buyer</label>
                        <input type="email" name="email_buyer" class="form-control form-control-sm" value="{{ $data->email_buyer }}" disabled>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Telfon Buyer</label>
                        <input type="text" name="telp_buyer" class="form-control form-control-sm" value="{{ $data->telp_buyer }}" disabled>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer gap-2">
            <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection