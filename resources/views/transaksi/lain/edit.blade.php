@extends('layouts.app')
@section('content')
<style>
    .datepicker {
        top: 290px !important;
    }

</style>
<div class="card">
    <div class="card-header">Edit Partisipasi Perusahaan</div>
    <form method="post" action="{{ url('lain/update') }}" enctype="multipart/form-data">
        @csrf
        <input hidden type="text" name="id" class="form-control form-control-sm" value="{{ $data->id }}" required="required">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Kode Transaksi Layanan</label>
                        <input type="text" name="kode_kode_transaksi_layanan_lainnya"
                            class="form-control form-control-sm" value="{{ $data->kode_transaksi_layanan_lainnya }}"
                            required disabled>
                        <input hidden type="text" name="kode_transaksi_layanan_lainnya"
                            class="form-control form-control-sm" value="{{ $data->kode_transaksi_layanan_lainnya }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label mb-1 labelInput">Pilih Layanan</label>
                        <select name="id_transaksi_lain"
                            class="form-control form-control-sm form-select select_layanan">
                            <option value="{{ $data->id_transaksi_lain }}">{{ $data->bentuk_layanan }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label mb-1 labelInput">Pilih Perusahaan</label>
                        <select name="id_perusahaan" class="form-control form-control-sm form-select select_perusahaan">
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
                            class="form-control form-control-sm datepicker"
                            value="{{ date('d-m-Y', strtotime($data->tanggal_transaksi)) }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Keterangan</label>
                        <textarea id="summernote" class="form-control" name="keterangan" placeholder="Keterangan"
                            id="floatingTextarea" rows="3">{{ $data->keterangan }}</textarea>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Lampiran</label>
                        <input type="file" name="lampiran" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-3">
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
            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        // Select
        $('#summernote').summernote({
            placeholder: 'Saran dan Solusi yang Diberikan',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['view', ['help']]
            ]
        });

        $(".datepicker").datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
        });

        $(".select_layanan").select2({
            placeholder: "Pilih Layanan",
            width: '100%',
            allowClear: true,
            ajax: {
                url: base_url + 'select/layanan',
                dataType: 'json',
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                id: item.id,
                                text: item.bentuk_layanan,
                            }
                        })
                    };
                },
            }
        }).on('select2:select', function (e) {
            var data = e.params.data;
        });

        $(".select_perusahaan").select2({
            placeholder: "Pilih Perusahaan",
            width: '100%',
            allowClear: true,
            ajax: {
                url: base_url + 'ppbm/show',
                dataType: 'json',
                data: function (params) {
                    params.id_bm = $('.get_id_bm').val();
                    return params
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                id: item.id,
                                text: item.nama_perusahaan +
                                    ', ' + item.nama_tipe,
                            }
                        })
                    };
                },
            }
        }).on('select2:select', function (e) {
            var data = e.params.data;
        });
    });

</script>
@endsection
