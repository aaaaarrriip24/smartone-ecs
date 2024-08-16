@extends('layouts.app')
@section('content')
<style>
    .datepicker {
        top: 290px !important;
    }

</style>
<div class="card">
    <div class="card-header">Edit Business Matching</div>
    <form method="post" action="{{ url('bm/update') }}" enctype="multipart/form-data">
        @csrf
        <input hidden type="text" name="id" class="form-control form-control-sm" value="{{ $data->id }}"
            required="required">
        <input hidden type="text" name="foto_bm_lama" class="form-control form-control-sm" value="{{ $data->foto_bm }}">
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Kode BM</label>
                        <input type="text" name="kode_bm" class="form-control form-control-sm"
                            value="{{ $data->kode_bm }}" required disabled>
                        <input hidden type="text" name="kode_bm_old" class="form-control form-control-sm"
                            value="{{ $data->kode_bm }}" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Tanggal BM</label>
                        <input type="text" name="tanggal_bm" autocomplete="off"
                            class="form-control form-control-sm datepicker"
                            value="{{ date('d-m-Y', strtotime($data->tanggal_bm)) }}" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Negara Buyer</label>
                        <select name="id_negara_buyer" class="form-control form-control-sm select_negara" required>
                            <option value="{{ $data->id_negara_buyer }}">{{ $data->en_short_name }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Nama Buyer</label>
                        <input type="text" name="nama_buyer" class="form-control form-control-sm"
                            value="{{ $data->nama_buyer }}" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Produk BM</label>
                        <input type="text" name="produk_bm" class="form-control form-control-sm"
                            value="{{ $data->produk_bm }}">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Pelaksanaan BM</label>
                        <select name="pelaksanaan_bm" class="form-select select_pelaksanaan" required>
                            <option value="{{ $data->pelaksanaan_bm }}" selected>{{ $data->pelaksanaan_bm }}</option>
                            <option value="Hybrid">Hybrid</option>
                            <option value="Offline">Offline</option>
                            <option value="Online">Online</option>
                        </select>
                        <!-- <input type="text" name="pelaksanaan_bm" class="form-control form-control-sm"
                            value="{{ $data->pelaksanaan_bm }}"> -->
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput" class="form-label mb-1 mt-2 labelInput">Info Asal
                            Buyer</label>
                        <select name="info_asal_buyer" class="form-select select_info" required>
                            <option value="{{ $data->info_asal_buyer }}" selected>{{ $data->info_asal_buyer }}</option>
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
                        <input type="email" name="email_buyer" class="form-control form-control-sm"
                            value="{{ $data->email_buyer }}">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Telfon Buyer</label>
                        <input type="number" name="telp_buyer" class="form-control form-control-sm"
                            value="{{ $data->telp_buyer }}">
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
                        <label class="form-label mb-1 labelInput">Peserta Business Matching</label>
                        <select name="id_perusahaan[]"
                            class="form-control form-control-sm form-select select_perusahaan" required
                            multiple="multiple">
                            @foreach( $peserta as $p )
                            <option value="{{ $p->id }}" selected>{{ $p->nama_perusahaan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Catatan</label>
                        <textarea class="form-control" name="catatan" placeholder="Catatan" id="summernote"
                            rows="4">{{ $data->catatan }}</textarea>
                        <!-- <input type="text" name="catatan" class="form-control form-control-sm"
                            value="{{ $data->catatan }}"> -->
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
                                text: item.kode_perusahaan + ', ' + item.nama_perusahaan +
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
