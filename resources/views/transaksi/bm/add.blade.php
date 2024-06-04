@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Add Business Matching</div>
    <form method="post" action="{{ url('bm/store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Kode BM</label>
                        <input type="text" name="kode_bm" class="form-control form-control-sm" value="{{ $kode_bm }}" required disabled>
                        <input hidden type="text" name="kode_bm" class="form-control form-control-sm" value="{{ $kode_bm }}" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Tanggal BM</label>
                        <input type="text" name="tanggal_bm" autocomplete="off" class="form-control form-control-sm datepicker" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Negara Buyer</label>
                        <select name="id_negara_buyer" class="form-control form-control-sm select_negara" required></select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Nama Buyer</label>
                        <input type="text" name="nama_buyer" class="form-control form-control-sm" placeholder="John Doe" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Produk BM</label>
                        <input type="text" name="produk_bm" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Pelaksanaan BM</label>
                        <select name="pelaksanaan_bm" class="form-select select_pelaksanaan" required>
                            <option value="" selected disabled>Pilih Pelaksanaan</option>
                            <option value="Hybrid">Hybrid</option>
                            <option value="Offline">Offline</option>
                            <option value="Online">Online</option>
                        </select>
                        <!-- <input type="text" name="pelaksanaan_bm" class="form-control form-control-sm"> -->
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Info Asal Buyer</label>
                        <select name="info_asal_buyer" class="form-select select_info" required>
                            <option value="" selected disabled>Pilih Info Asal Buyer</option>
                            <option value="Buying Agent">Buying Agent</option>
                            <option value="Buyer Langsung">Buyer Langsung</option>
                            <option value="KBRI">KBRI</option>
                            <option value="Konjen">Konjen</option>
                            <option value="Perwadag">Perwadag</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Email Buyer</label>
                        <input type="email" name="email_buyer" class="form-control form-control-sm" placeholder="john@email.com">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Catatan</label>
                        <textarea class="form-control" name="catatan" placeholder="Catatan" id="floatingTextarea" rows="3"></textarea>
                        <!-- <input type="text" name="catatan" class="form-control form-control-sm"> -->
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Telfon Buyer</label>
                        <input type="number" name="telp_buyer" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Foto</label>
                        <input type="file" name="foto_bm" class="form-control form-control-sm">
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
        $(".datepicker").datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
        });

        $(".select_pelaksanaan").select2({});
        $(".select_info").select2({});

        $(".select_negara").select2({
            placeholder: "Pilih Negara Asal",
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
