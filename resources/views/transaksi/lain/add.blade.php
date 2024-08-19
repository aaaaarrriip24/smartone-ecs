@extends('layouts.app')
@section('content')
<style>
    .datepicker {
        top: 290px !important;
    }
</style>
<div class="card">
    <div class="card-header">Add Transaksi Layanan</div>
    <form method="post" action="{{ url('lain/store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Kode Transaksi Layanan</label>
                        <input type="text" name="kode_kode_transaksi_layanan_lainnya" class="form-control form-control-sm" value="{{ $kode_code }}"
                            required disabled>
                        <input hidden type="text" name="kode_transaksi_layanan_lainnya" class="form-control form-control-sm"
                            value="{{ $kode_code }}" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label mb-1 labelInput">Pilih Layanan</label>
                        <select name="id_transaksi_lain" class="form-control form-control-sm form-select select_layanan" required></select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label mb-1 labelInput">Pilih Perusahaan</label>
                        <select name="id_perusahaan" class="form-control form-control-sm form-select select_perusahaan" required></select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Tanggal Layanan</label>
                        <input type="text" name="tanggal_transaksi" autocomplete="off"
                            class="form-control form-control-sm datepicker" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Keterangan</label>
                        <textarea id="summernote" class="form-control" name="keterangan"
                            placeholder="Keterangan" id="floatingTextarea" rows="3"
                            required></textarea>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Lampiran</label>
                        <input type="file" name="lampiran" class="form-control form-control-sm">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer gap-2">
            <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
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
                url: base_url + 'select/perusahaan',
                dataType: 'json',
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                id: item.id,
                                text: item.nama_perusahaan + ', ' + item.nama_tipe,
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
