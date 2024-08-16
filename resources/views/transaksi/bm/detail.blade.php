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
                    <input type="text" name="tanggal_bm" class="form-control form-control-sm datepicker"
                        value="{{ date('d-M-Y', strtotime($data->tanggal_bm)) }}" required disabled>
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
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Telfon Buyer</label>
                    <input type="number" name="telp_buyer" class="form-control form-control-sm"
                        value="{{ $data->telp_buyer }}" disabled>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group mb-2">
                    <label class="form-label mb-1 mt-2 labelInput">Foto Business Matching</label>
                    @if(!empty($data->foto_bm))
                    <a href="{{ asset('foto_bm/'.$data->foto_bm ) }}" class="form-control btn btn-sm btn-primary"
                        target="_blank">Lihat Foto</a>
                    @else
                    <a href="javascript:void(0);" class="form-control btn btn-sm btn-warning" disabled>Foto
                        Masih Kosong</a>
                    @endif
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Peserta Business Matching</label>
                    <select name="id_perusahaan[]" class="form-control form-control-sm form-select select_perusahaan"
                        required multiple="multiple" disabled>
                        @foreach( $peserta as $p )
                        <option value="{{ $p->id }}" selected disabled>{{ $p->nama_perusahaan }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Catatan</label>
                    <textarea class="form-control" name="catatan" placeholder="Catatan" id="summernote" rows="4"
                        disabled>{{ $data->catatan }}</textarea>
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
