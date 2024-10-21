@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Detail Realisasi Export</div>
    <div class="card-body">
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-0 labelInput">Kode Transaksi</label>
                    <input type="text" name="kode_export" class="form-control form-control-sm"
                        value="{{ $data->kode_export }}" disabled>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-0 labelInput">Nama Perusahaan</label>
                    <select name="id_perusahaan" class="form-control form-control-sm select_perusahaan" disabled>
                        <option value="{{ $data->id_perusahaan }}">{{ $data->nama_perusahaan }}{{ !empty($data->nama_tipe) ? ', ' . $data->nama_tipe : "" }}</option>
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-0 labelInput">Tanggal Realisasi</label>
                    <input type="text" name="tanggal_export" class="form-control form-control-sm datepicker"
                        value="{{ date('d-m-Y', strtotime($data->tanggal_export))  }}" disabled>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-0 labelInput">Tanggal Lapor</label>
                    <input type="text" name="tanggal_lapor" class="form-control form-control-sm datepicker"
                        value="{{ date('d-m-Y', strtotime($data->tanggal_lapor)) }}" disabled>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-0 labelInput">Produk</label>
                    <input type="text" name="produk" class="form-control form-control-sm" value="{{ $data->detail_produk_utama }}"
                        disabled>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Nilai Transaksi</label>
                    <input type="text" name="nilai_transaksi" class="form-control form-control-sm input-mask"
                        value="{{ $data->nilai_transaksi }}"
                        data-inputmask="'alias': 'currency', 'prefix': '','digits': '0'" disabled>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Negara Tujuan</label>
                    <select name="id_negara_tujuan" class="form-control form-control-sm select_negara" disabled>
                        <option value="{{ $data->id_negara_tujuan }}">{{ $data->en_short_name }}</option>
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Nama Buyer</label>
                    <input type="text" name="nama_buyer" class="form-control form-control-sm"
                        value="{{ $data->nama_buyer }}" placeholder="John Doe" disabled>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Email</label>
                    <input type="email" name="email_buyer" class="form-control form-control-sm"
                        value="{{ $data->email_buyer }}" placeholder="john@email.com" disabled>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Telfon</label>
                    <input type="number" name="telp_buyer" class="form-control form-control-sm"
                        value="{{ $data->telp_buyer }}" disabled>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Dokumen Pendukung</label>
                    <input type="text" name="dok_pendukung" class="form-control form-control-sm"
                        value="{{ $data->dok_pendukung }}" disabled>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Bukti Dokumen</label>
                    @if( !empty($data->bukti_dok) )
                    <a href="{{ asset('folder_bukti_dok/'.$data->bukti_dok ) }}"
                        class="form-control btn btn-sm btn-primary" target="_blank">Lihat Dokumen</a>
                    @else
                    <button type="button" class="form-control btn btn-sm btn-warning" target="_blank" disabled>Belum ada
                        Dokumen</button>
                    @endif
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
    $(document).ready(function () {
        $(".input-mask").inputmask({
            removeMaskOnSubmit: true,
            autoUnmask: true,
            unmaskAsNumber: true
        });

        $(".datepicker").datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
        });
    });

</script>
@endsection
