@extends('layouts.app')
@section('content')
<style>
    .datepicker {
        top: 350px !important;
    }

</style>
<div class="card">
    <div class="card-header">Edit Konsultasi</div>
    <form method="post" action="{{ url('konsultasi/update') }}" enctype="multipart/form-data">
        @csrf
        <input hidden type="text" name="id" class="form-control form-control-sm" value="{{ $data->id }}"
            required="required">
        <input hidden type="text" name="foto_pertemuan_lama" class="form-control form-control-sm"
            value="{{ $data->foto_pertemuan }}">
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Kode Konsultasi</label>
                        <input type="text" name="kode_konsultasi_display" class="form-control form-control-sm"
                            value="{{ $data->kode_konsultasi }}" disabled>
                        <input hidden type="text" name="kode_konsultasi" class="form-control form-control-sm"
                            value="{{ $data->kode_konsultasi }}">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group mb-2">
                        <label class="form-label mb-1 mt-0 labelInput">Nama Perusahaan</label>
                        <select name="id_perusahaan" class="form-control form-control-sm select_perusahaan">
                            <option value="{{ $data->id_perusahaan }}" selected>
                                {{ strtoupper($data->nama_perusahaan) }}, {{ strtoupper($data->nama_tipe) }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Detail Produk Utama</label>
                        <input type="text" class="form-control form-control-sm detail_produk" value="{{ $data->detail_produk_utama }}" disabled>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Kategori Produk</label>
                        <input type="text" class="form-control form-control-sm kategori_produk" value="{{ $data->nama_kategori_produk }}" disabled>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Sub Kategori Produk</label>
                        <input type="text" class="form-control form-control-sm sub_produk" value="{{ $data->sub_kategori }}" disabled>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Tanggal Konsultasi</label>
                        <input type="text" name="tanggal_konsultasi" class="form-control form-control-sm datepicker"
                            value="{{ date('d-m-Y', strtotime($data->tanggal_konsultasi)) }}" required="required">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Cara Konsultasi</label>
                        <select name="cara_konsultasi" class="form-control form-control-sm cara_konsultasi"
                            required="required">
                            <option value="{{ $data->cara_konsultasi }}">{{ $data->cara_konsultasi }}</option>
                            <option value="Email">Email</option>
                            <option value="Offline">Offline</option>
                            <option value="Online">Online</option>
                            <option value="Phone">Phone</option>
                            <option value="WA">WA</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Tempat Pertemuan</label>
                        <input type="text" name="tempat_pertemuan" class="form-control form-control-sm"
                            value="{{ $data->tempat_pertemuan }}" required="required">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Upload File Foto Pertemuan</label>
                        <input type="file" name="foto_pertemuan" class="form-control form-control-sm" id="fotoInput">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Petugas</label>
                        <select name="id_petugas" class="form-control form-control-sm select_petugas"
                            required="required">
                            <option value="{{ $data->id_petugas }}" selected>{{ $data->nama_petugas }}</option>
                        </select>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group mb-2">
                        <label class="form-label mb-1 mt-2 labelInput">Topik</label>
                        <select name="id_topik[]" class="form-control form-control-sm select_topik" multiple="multiple">
                            @foreach( $topik as $t )
                            @if(!empty($t->id))
                            <option value="{{ $t->id }}" selected>{{ $t->nama_topik }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 labelInput">Foto Pertemuan</label>
                        @if(!empty($data->foto_pertemuan))
                        <img id="oldImage" src="{{ asset('foto_pertemuan/'.$data->foto_pertemuan ) }}" class="rounded" style="max-width: 100%; max-height: 540px; height: auto; object-fit: contain;" alt="Preview">
                        <img id="imagePreview" src="#" alt="Image Preview" class="rounded" style="display: none; max-width: 100%; max-height: 540px; height: auto; object-fit: contain;" />
                        @else
                        <a href="javascript:void(0);" class="form-control btn btn-sm btn-warning" disabled>Foto Masih
                            Kosong</a>
                        @endif
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Saran dan Solusi yang Diberikan</label>
                        <textarea id="summernote" class="form-control" name="isi_konsultasi"
                            placeholder="Saran dan Solusi yang Diberikan" id="floatingTextarea" rows="3"
                            required>{{ $data->isi_konsultasi }}</textarea>
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

        $('#fotoInput').on('change', function(event) {
            const input = this;
            const preview = $('#imagePreview');
            const old = $('#oldImage');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.attr('src', e.target.result);
                    preview.show();
                    old.hide();
                }

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.attr('src', '#');
                preview.hide();
            }
        });

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

        $(".cara_konsultasi").select2({});

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
                                detail_produk_utama: item.detail_produk_utama,
                                nama_kategori_produk: item.nama_kategori_produk,
                                sub_kategori: item.sub_kategori,
                            }
                        })
                    };
                },
            }
        }).on('select2:select', function (e) {
            var data = e.params.data;
            console.log(data);
            $(".detail_produk").val(data.detail_produk_utama);
            $(".kategori_produk").val(data.nama_kategori_produk);
            $(".sub_produk").val(data.sub_kategori);
        });

        $(".select_topik").select2({
            placeholder: "Pilih Topik",
            width: '100%',
            allowClear: true,
            ajax: {
                url: base_url + 'select/topik',
                dataType: 'json',
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                id: item.id,
                                text: item.nama_topik,
                            }
                        })
                    };
                },
            }
        }).on('select2:select', function (e) {
            var data = e.params.data;
        });

        $(".select_petugas").select2({
            placeholder: "Pilih Petugas",
            width: '100%',
            allowClear: true,
            ajax: {
                url: base_url + 'select/petugas',
                dataType: 'json',
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                id: item.id,
                                text: item.nama_petugas,
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
