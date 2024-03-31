@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Add Business Matching</div>
    <form method="post" action="{{ url('bm/store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Kode BM</label>
                        <input type="text" name="kode_bm" class="form-control form-control-sm" placeholder="BM-xxxx" required="required">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Tanggal BM</label>
                        <input type="date" name="tanggal_bm" class="form-control form-control-sm" placeholder="John Doe" required="required">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Negara Buyer</label>
                        <select name="id_negara_buyer" class="form-control form-control-sm select_negara" required="required"></select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Pelaksanaan BM</label>
                        <input type="text" name="pelaksanaan_bm" class="form-control form-control-sm" required="required">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Info Asal Buyer</label>
                        <input type="text" name="info_asal_buyer" class="form-control form-control-sm" required="required">
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
                        <label>Catatan</label>
                        <input type="text" name="catatan" class="form-control form-control-sm" required="required">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto_bm" class="form-control form-control-sm" required="required">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer gap-2">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        // Select
        $(".select_negara").select2({
            placeholder: "Pilih Negara Asal",
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
