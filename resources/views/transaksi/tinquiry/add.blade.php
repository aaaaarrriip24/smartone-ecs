@extends('layouts.app')
@section('content')
<style>
    .datepicker {
        top: 290px !important;
    }
</style>
<div class="card">
    <div class="card-header">Add Profile Inquiry</div>
    <form method="post" action="{{ url('inquiry/store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Kode Inquiry</label>
                        <input type="text" name="kode_inquiry_disabled" value="{{ $kode_inq }}"
                            class="form-control form-control-sm" required disabled>
                        <input hidden type="text" name="kode_inquiry" value="{{ $kode_inq }}"
                            class="form-control form-control-sm" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Tanggal Inquiry</label>
                        <input type="text" name="tanggal_inquiry" autocomplete="off"
                            class="form-control form-control-sm datepicker" placeholder="Contoh : {{ date('d-m-Y') }}"
                            required="required">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Produk Yang Diminta</label>
                        <input type="text" name="produk_yang_diminta" class="form-control form-control-sm"
                            required="required">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Quantity</label>
                        <input type="text" name="qty" class="form-control form-control-sm text-end input-mask" data-inputmask="'alias': 'currency', 'prefix': '','digits': '0'"
                            required="required">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Satuan Quantity</label>
                        <select name="satuan_qty" class="form-control form-control-sm select_satuan"
                            required="required">
                            <option disabled selected>Pilih Satuan Quantity</option>
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
                        <select name="id_negara_asal_inquiry" class="form-control form-control-sm select_negara"
                            required="required"></select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Pihak Buyer</label>
                        <select name="pihak_buyer" class="form-control form-control-sm select_pihak"
                            required="required">
                            <option disabled selected>Pilih Pihak Buyer</option>
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
                        <input type="text" name="nama_buyer" class="form-control form-control-sm" placeholder="John Doe"
                            required="required">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Email Buyer</label>
                        <input type="email" name="email_buyer" class="form-control form-control-sm"
                            placeholder="john@email.com" required="required">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Telfon Buyer</label>
                        <input type="number" autocomplete="off" name="telp_buyer" class="form-control form-control-sm"
                            required="required">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Attached Dokumen</label>
                        <input type="file" name="file" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Perusahaan Penerima Inquiry</label>
                        <select name="id_perusahaan[]"
                            class="form-control form-control-sm form-select select_perusahaan" required
                            multiple="multiple"></select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer gap-2">
            <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">Tutup</a>
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

        $(".input-mask").inputmask({
            removeMaskOnSubmit: true,
            autoUnmask: true,
            unmaskAsNumber: true
        });

        $(".select_satuan").select2({});
        $(".select_pihak").select2({});

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
