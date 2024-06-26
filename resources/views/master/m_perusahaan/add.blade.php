@extends('layouts.app')
@section('content')
<style>
    .datepicker {
        top: 710px !important;
    }
</style>
<div class="card">
    <div class="card-header">
        <b>Add Perusahaan</b>
    </div>
    <form method="post" action="{{ url('perusahaan/store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Kode Perusahaan</label>
                        <input type="text" name="kode_perusahaan_display" class="form-control form-control-sm"
                            value="{{ $kode_pt }}" disabled required>
                        <input hidden type="text" name="kode_perusahaan" class="form-control form-control-sm"
                            value="{{ $kode_pt }}" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Tipe Perusahaan</label>
                        <select name="id_tipe" class="form-control form-control-sm select_tipe" required></select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Nama Perusahaan</label>
                        <input type="text" name="nama_perusahaan" class="form-control form-control-sm" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Provinsi</label>
                        <select name="id_provinsi" class="form-control form-control-sm province_id" required></select>
                        <input hidden type="text" name="province_code" class="province_code">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Kabupaten/Kota</label>
                        <select name="id_kabkota" class="form-control form-control-sm cities_id" required></select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Alamat Perusahaan</label>
                        <input type="text" name="alamat_perusahaan" class="form-control form-control-sm" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Alamat Pabrik</label>
                        <input type="text" name="alamat_pabrik" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Kode Pos</label>
                        <input class="form-control form-control-sm" name="kode_pos">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Nama Contact Person</label>
                        <input type="text" name="nama_contact_person" class="form-control form-control-sm" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Telpon Contact Person</label>
                        <input type="text" name="telp_contact_person" class="form-control form-control-sm" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Telpon Kantor</label>
                        <input type="text" name="telp_kantor" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Email Perusahaan</label>
                        <input type="email" name="email" class="form-control form-control-sm"
                            placeholder="john@email.com">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Website Perusahaan</label>
                        <input type="text" name="website" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Status Kepemilikan</label>
                        <select name="status_kepemilikan" class="form-control form-control-sm form-select">
                            <option disabled selected>Pilih Status Kepemilikan</option>
                            <option value="PMDN">PMDN</option>
                            <option value="PMA">PMA</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Jumlah Karyawan</label>
                        <input type="number" class="form-control form-control-sm jumlah_karyawan text-end" name="jumlah_karyawan">
                        <!-- <select name="jumlah_karyawan" class="form-control form-control-sm form-select jumlah_karyawan">
                            <option disabled selected>Pilih Jumlah Karyawan</option>
                            <option value="1">< 5</option>
                            <option value="2">6 - 9</option>
                            <option value="3">10 - 30</option>
                            <option value="4"> > 30</option>
                        </select> -->
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Skala Perusahaan</label>
                        <select name="skala_perusahaan_display" class="form-control form-control-sm form-select skala_perusahaan" disabled>
                            <option disabled selected>Pilih Skala Perusahaan</option>
                            <option value="Mikro">Mikro</option>
                            <option value="Kecil">Kecil</option>
                            <option value="Menengah">Menengah</option>
                            <option value="Besar">Besar</option>
                        </select>
                        <select hidden name="skala_perusahaan" class="form-control form-control-sm form-select skala_perusahaan">
                            <option disabled selected>Pilih Skala Perusahaan</option>
                            <option value="Mikro">Mikro</option>
                            <option value="Kecil">Kecil</option>
                            <option value="Menengah">Menengah</option>
                            <option value="Besar">Besar</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Kategori Produk</label>
                        <select name="id_kategori_produk" class="form-control form-control-sm select_k_produk"></select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Sub Kategori Produk</label>
                        <select name="id_sub_kategori[]" class="form-control form-control-sm select_sub_produk" multiple="multiple"></select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Detail Produk Utama</label>
                        <input type="text" name="detail_produk_utama" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Merek Produk</label>
                        <input type="text" name="merek_produk" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">HS Code</label>
                        <input type="text" name="hs_code" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Kapasitas Produksi/ Bulan</label>
                        <input type="number" name="kapasitas_produksi" class="form-control form-control-sm text-end">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Satuan Kapasitas Produksi</label>
                        <select name="satuan_kapasitas_produksi" class="form-control form-control-sm form-select">
                            <option disabled selected>Pilih Satuan Produksi</option>
                            <option value="KG">KG</option>
                            <option value="Kodi">Kodi</option>
                            <option value="Kontainer">Kontainer</option>
                            <option value="Pasang">Pasang</option>
                            <option value="Pcs">Pcs</option>
                            <option value="Ton">Ton</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Sertifikat Legalitas</label>
                        <input type="text" name="kepemilikan_legalitas" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Kepemilikan Sertifikat</label>
                        <input type="text" name="kepemilikan_sertifikat" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Foto Produk 1</label>
                        <input type="file" name="foto_produk_1" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Foto Produk 2</label>
                        <input type="file" name="foto_produk_2" class="form-control form-control-sm">
                    </div>
                </div>
                <!-- <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Status Data</label>
                        <select name="status_data" class="form-control form-control-sm form-select">
                            <option disabled selected>Pilih Status Data</option>
                            <option value="1">Belum Lengkap</option>
                            <option value="2">Lengkap</option>
                        </select>
                    </div>
                </div> -->
                <!-- <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Status Ekspor</label>
                        <select name="status_ekspor" class="form-control form-control-sm form-select">
                            <option disabled selected>Pilih Status Ekspor</option>
                            <option value="1">Belum Ekspor</option>
                            <option value="2">Sudah Ekspor</option>
                        </select>
                    </div>
                </div> -->
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Status Ekspor</label>
                        <select name="status_ekspor[]" class="form-control form-control-sm form-select select_negara_ekspor" multiple="multiple">
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Tanggal Registrasi</label>
                        <input type="text" value="{{ date('d-m-Y') }}" name="tanggal_registrasi" class="form-control form-control-sm datepicker" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Petugas Verifikator</label>
                        <select name="id_petugas" class="form-control form-control-sm select_petugas" required></select>
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

        $(".select_negara_ekspor").select2({
            placeholder: "Pilih Negara Ekspor",
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

        $(".select_tipe").select2({
            placeholder: "Pilih Tipe Perusahaan",
            width: '100%',
            allowClear: true,
            ajax: {
                url: base_url + 'select/tipe',
                dataType: 'json',
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                id: item.id,
                                text: item.nama_tipe,
                            }
                        })
                    };
                },
            }
        }).on('select2:select', function (e) {
            var data = e.params.data;
        });

        $(".select_k_produk").select2({
            placeholder: "Pilih Kategori Produk",
            width: '100%',
            allowClear: true,
            ajax: {
                url: base_url + 'select/k_produk',
                dataType: 'json',
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                id: item.id,
                                text: item.nama_kategori_produk,
                            }
                        })
                    };
                },
            }
        }).on('select2:select', function (e) {
            var data = e.params.data;
        });

        $(".select_sub_produk").select2({
            placeholder: "Pilih Sub Kategori Produk",
            width: '100%',
            allowClear: true,
            ajax: {
                url: base_url + 'select/sub_produk',
                dataType: 'json',
                data: function (params) {
                    params.id_kategori = $('.select_k_produk').val();
                    return params
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                id: item.id,
                                text: item.nama_sub_kategori,
                            }
                        })
                    };
                },
            }
        }).on('select2:select', function (e) {
            var data = e.params.data;
        });

        $(".province_id").select2({
            placeholder: "Pilih Provinsi",
            width: '100%',
            allowClear: true,
            ajax: {
                url: base_url + 'provinces',
                dataType: 'json',
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                id: item.code,
                                text: item.name,
                            }
                        })
                    };
                },
            }
        }).on('select2:select', function (e) {
            var data = e.params.data;
        });

        $('.cities_id').select2({
            placeholder: 'Pilih Kota',
            ajax: {
                url: base_url + "cities",
                dataType: 'json',
                data: function (params) {
                    params.province_id = $('.province_id').val();
                    return params
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                id: item.code,
                                text: item.name,
                            }
                        })
                    };
                },
            }
        }).on('select2:select', function (e) {
            var data = e.params.data;
        });
        
        $(".jumlah_karyawan").on("keyup", function (e) {
            var value_kar = $(".jumlah_karyawan").val();
            console.log(value_kar);
            if(value_kar <= 5) {
                $(".skala_perusahaan").val("Mikro");
            } else if (value_kar <= 6 || value_kar <= 9) {
                $(".skala_perusahaan").val("Kecil");
            } else if(value_kar <= 10 || value_kar <= 30) {
                $(".skala_perusahaan").val("Menengah");
            } else if(value_kar >= 30) {
                $(".skala_perusahaan").val("Besar");
            }
        });
        $(".skala_perusahaan").on("change", function (e) {
            var value_skala = $(".skala_perusahaan").val();
            console.log(value_skala);
            if(value_skala == "Mikro") {
                $(".jumlah_karyawan").val(1);
            } else if (value_skala == "Kecil") {
                $(".jumlah_karyawan").val(2);
            } else if(value_skala == "Menengah") {
                $(".jumlah_karyawan").val(3);
            } else if(value_skala == "Besar") {
                $(".jumlah_karyawan").val(4);
            }
        });
    });

</script>
@endsection
