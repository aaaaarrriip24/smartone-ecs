@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Edit Realisasi Export</div>
    <form method="post" action="{{ url('export/update') }}" enctype="multipart/form-data">
        @csrf
        <input hidden type="text" name="id" class="form-control form-control-sm" value="{{ $data->id }}" required>
        <input hidden type="text" name="dok_pendukung_lama" class="form-control form-control-sm" value="{{ $data->dok_pendukung }}">
        <input hidden type="text" name="bukti_dok_lama" class="form-control form-control-sm" value="{{ $data->bukti_dok }}">
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Kode Transaksi</label>
                        <input type="text" name="kode_export_display" class="form-control form-control-sm" value="{{ $data->kode_export }}" required disabled>
                        <input hidden type="text" name="kode_export" class="form-control form-control-sm" value="{{ $data->kode_export }}" required >
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Nama Perusahaan</label>
                        <select name="id_perusahaan" class="form-control form-control-sm select_perusahaan" required>
                            <option value="{{ $data->id_perusahaan }}">{{ strtoupper($data->nama_perusahaan) }}, {{ $data->nama_tipe }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Tanggal Transaksi</label>
                        <input type="text" name="tanggal_export" class="form-control form-control-sm datepicker" value="{{ date('d-m-Y', strtotime($data->tanggal_export)) }}" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Produk</label>
                        <input type="text" name="produk_display" class="form-control form-control-sm" value="{{ $data->produk }}" required disabled>
                        <input hidden type="text" name="produk" class="form-control form-control-sm" value="{{ $data->produk }}" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Nilai Transaksi</label>
                        <input type="number" name="nilai_transaksi" class="form-control form-control-sm" value="{{ $data->nilai_transaksi }}" required="required">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Negara Tujuan</label>
                        <select name="id_negara_tujuan" class="form-control form-control-sm select_negara" required="required">
                            <option value="{{ $data->id_negara_tujuan }}">{{ $data->en_short_name }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Nama Buyer</label>
                        <input type="text" name="nama_buyer" class="form-control form-control-sm" value="{{ $data->nama_buyer }}" placeholder="John Doe" required="required">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Email</label>
                        <input type="email" name="email_buyer" class="form-control form-control-sm" value="{{ $data->email_buyer }}" placeholder="john@email.com" required="required">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Telfon</label>
                        <input type="number" name="telp_buyer" class="form-control form-control-sm" value="{{ $data->telp_buyer }}" required="required">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Dokumen Pendukung</label>
                        <input type="file" name="dok_pendukung" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Bukti Dokumen</label>
                        <input type="file" name="bukti_dok" class="form-control form-control-sm">
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
        $(".datepicker").datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
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
                                text: item.nama_perusahaan.toUpperCase() + ', ' + item.nama_tipe,
                            }
                        })
                    };
                },
            }
        }).on('select2:select', function (e) {
            var data = e.params.data;
        });

        $(".select_negara").select2({
            placeholder: "Pilih Negara Tujuan",
            width: '100%',
            allowClear: true,
            ajax: {
                url: base_url + 'select/negara',
                dataType: 'json',
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                id: item.id,
                                text: item.en_short_name,
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
