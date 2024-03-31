@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Add Realisasi Export</div>
    <form method="post" action="{{ url('export/store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Kode Transaksi</label>
                        <input type="text" name="kode_export" class="form-control form-control-sm" placeholder="EX-xxxx" required="required">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Kode Perusahaan</label>
                        <select name="id_perusahaan" class="form-control form-control-sm select_perusahaan"
                            required="required"></select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Tanggal Transaksi</label>
                        <input type="date" name="tanggal_export" class="form-control form-control-sm" required="required">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Produk</label>
                        <input type="text" name="produk" class="form-control form-control-sm" required="required">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Nilai Transaksi</label>
                        <input type="number" name="nilai_transaksi" class="form-control form-control-sm" required="required">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Negara Tujuan</label>
                        <select name="id_negara_tujuan" class="form-control form-control-sm select_negara" required="required"></select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Nama Buyer</label>
                        <input type="text" name="nama_buyer" class="form-control form-control-sm" placeholder="John Doe" required="required">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email_buyer" class="form-control form-control-sm" placeholder="john@email.com" required="required">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Telfon</label>
                        <input type="number" name="telp_buyer" class="form-control form-control-sm" required="required">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Dokumen Pendukung</label>
                        <input type="file" name="dok_pendukung" class="form-control form-control-sm" required="required">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Bukti Dokumen</label>
                        <input type="file" name="bukti_dok" class="form-control form-control-sm" required="required">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer gap-2">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Tutup</a>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        // Select
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
                                text: item.kode_perusahaan,
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
                url: base_url + 'select/bm',
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
