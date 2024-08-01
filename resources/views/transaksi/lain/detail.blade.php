@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Detail Partisipasi Perusahaan</div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label class="form-label mb-1 mt-0 labelInput">Kode Transaksi Layanan</label>
                    <input type="text" name="kode_kode_transaksi_layanan_lainnya" class="form-control form-control-sm"
                        value="{{ $data->kode_transaksi_layanan_lainnya }}" required disabled>
                    <input hidden type="text" name="kode_transaksi_layanan_lainnya" class="form-control form-control-sm"
                        value="{{ $data->kode_transaksi_layanan_lainnya }}" disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label class="form-label mb-1 labelInput">Pilih Layanan</label>
                    <select name="id_transaksi_lain" class="form-control form-control-sm form-select select_layanan"
                        disabled>
                        <option value="{{ $data->id_transaksi_lain }}">{{ $data->bentuk_layanan }}</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label class="form-label mb-1 labelInput">Pilih Perusahaan</label>
                    <select name="id_perusahaan" class="form-control form-control-sm form-select select_perusahaan"
                        disabled>
                        <option value="{{ $data->id_perusahaan }}">
                            {{ $data->nama_perusahaan }}{{ !empty($data->nama_tipe) ? ', '.$data->nama_tipe : '' }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label class="form-label mb-1 mt-0 labelInput">Tanggal Layanan</label>
                    <input type="text" name="tanggal_transaksi" autocomplete="off"
                        class="form-control form-control-sm datepicker" disabled
                        value="{{ date('d-m-Y', strtotime($data->tanggal_transaksi)) }}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Keterangan</label>
                    <textarea id="summernote" class="form-control" name="keterangan" placeholder="Keterangan"
                        id="floatingTextarea" rows="3" disabled>{{ $data->keterangan }}</textarea>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label class="form-label mb-1 mt-0 labelInput">Lampiran</label>
                    @if(!empty($data->lampiran))
                    <a href="{{ asset('lampiran_lainnya/'.$data->lampiran ) }}"
                        class="form-control btn btn-sm btn-primary" target="_blank">Lihat Dokumen</a>
                    @else
                    <a href="javascript:void(0);" class="form-control btn btn-sm btn-warning" disabled>Dokumen Masih
                        Kosong</a>
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
    $(".datepicker").datepicker({
        format: 'dd-mm-yyyy'
    });

    $(".select_layanan").select2({});
    $(".select_perusahaan").select2({});

    $('#summernote').summernote('disable');

</script>
@endsection
