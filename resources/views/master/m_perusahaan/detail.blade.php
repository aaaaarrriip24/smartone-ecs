@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <b>Detail Perusahaan</b>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-0 labelInput">Kode Perusahaan</label>
                    <input type="text" name="kode_perusahaan" class="form-control form-control-sm"
                        value="{{ $data->kode_perusahaan }}" disabled>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-0 labelInput">Tipe Perusahaan</label>
                    <select name="id_tipe" class="form-control form-control-sm select_tipe" disabled>
                        <option value="{{ $data->id_tipe }}">{{ $data->nama_tipe }}</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label class="form-label mb-1 mt-0 labelInput">Nama Perusahaan</label>
                    <input type="text" name="nama_perusahaan" class="form-control form-control-sm"
                        value="{{ strtoupper($data->nama_perusahaan) }}" disabled>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Provinsi</label>
                    <select name="id_provinsi" class="form-control form-control-sm province_id" disabled>
                        <option value="{{ $data->id_provinsi }}">{{ $data->provinsi }}</option>
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Kabupaten/Kota</label>
                    <select name="id_kabkota" class="form-control form-control-sm cities_id" disabled>
                        <option value="{{ $data->id_kabkota }}">{{ $data->cities }}</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Alamat Perusahaan</label>
                    <input type="text" name="alamat_perusahaan" class="form-control form-control-sm"
                        value="{{ $data->alamat_perusahaan }}" disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Alamat Pabrik</label>
                    <input type="text" name="alamat_pabrik" class="form-control form-control-sm"
                        value="{{ $data->alamat_pabrik }}" disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Kode Pos</label>
                    <input type="text" name="kode_pos" class="form-control form-control-sm" disabled
                        value="{{ $data->kode_pos }}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Nama Contact Person</label>
                    <input type="text" name="nama_contact_person" class="form-control form-control-sm"
                        value="{{ $data->nama_contact_person }}" disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Jabatan</label>
                    <input type="text" name="jabatan" class="form-control form-control-sm" value="{{ $data->jabatan }}"
                        disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Telpon Contact Person</label>
                    <input type="number" name="telp_contact_person" class="form-control form-control-sm"
                        value="{{ $data->telp_contact_person }}" disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Telpon Kantor</label>
                    <input type="number" name="telp_kantor" class="form-control form-control-sm"
                        value="{{ $data->telp_kantor }}" disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Email Perusahaan</label>
                    <input type="email" name="email" class="form-control form-control-sm" value="{{ $data->email }}"
                        disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Website Perusahaan</label>
                    <input type="text" name="website" class="form-control form-control-sm" value="{{ $data->website }}"
                        disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Status Kepemilikan</label>
                    <select name="status_kepemilikan" class="form-control form-control-sm form-select" disabled>
                        <option value="{{ $data->status_kepemilikan }}" selected>{{ $data->status_kepemilikan }}
                        </option>
                        <option value="PMDN">PMDN</option>
                        <option value="PMA">PMA</option>
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Jumlah Karyawan</label>
                    <input type="number" class="form-control form-control-sm jumlah_karyawan" name="jumlah_karyawan"
                        value="{{ $data->jumlah_karyawan }}" disabled>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Skala Perusahaan</label>
                    <select name="skala_perusahaan" class="form-control form-control-sm form-select" disabled>
                        <option value="{{ $data->skala_perusahaan }}" selected>{{ $data->skala_perusahaan }}
                        </option>
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
                    <select name="id_kategori_produk" class="form-control form-control-sm select_k_produk" disabled>
                        <option value="{{ $data->id_kategori_produk }}" selected>{{ $data->nama_kategori_produk }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Sub Kategori Produk</label>
                    <select name="id_sub_kategori" class="form-control form-control-sm select_sub_produk" disabled>
                        <option value="{{ $data->id_sub_kategori }}" selected>{{ $data->nama_sub_kategori }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Detail Produk Utama</label>
                    <input type="text" name="detail_produk_utama" class="form-control form-control-sm"
                        value="{{ $data->detail_produk_utama }}" disabled>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Merek Produk</label>
                    <input type="text" name="merek_produk" class="form-control form-control-sm"
                        value="{{ $data->merek_produk }}" disabled>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">HS Code</label>
                    <input type="text" name="hs_code" class="form-control form-control-sm" value="{{ $data->hs_code }}"
                        disabled>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Kapasitas Produksi/ Bulan</label>
                    <input type="number" name="kapasitas_produksi" class="form-control form-control-sm"
                        value="{{ $data->kapasitas_produksi }}" disabled>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Satuan Kapasitas Produksi</label>
                    <select name="satuan_kapasitas_produksi" class="form-control form-control-sm form-select" disabled>
                        <option value="{{ $data->satuan_kapasitas_produksi }}" selected>
                            {{ $data->satuan_kapasitas_produksi }}</option>
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
                    <label class="form-label mb-1 mt-2 labelInput">Sertifikat Legalitas</label>
                    <input type="text" name="kepemilikan_legalitas" class="form-control form-control-sm"
                        value="{{ $data->kepemilikan_legalitas }}" disabled>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Kepemilikan Sertifikat</label>
                    <input type="text" name="kepemilikan_sertifikat" class="form-control form-control-sm"
                        value="{{ $data->kepemilikan_sertifikat }}" disabled>
                </div>
            </div>
            <div class="col-9">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Negara Ekspor</label>
                    <select name="status_ekspor[]" class="form-control form-control-sm form-select select_negara_ekspor"
                        multiple="multiple" disabled>
                        @foreach($negara_ekspor as $n)
                        <option value="{{ $n->id_negara }}" selected>{{ $n->en_short_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Foto Produk 1</label>
                    <input type="file" name="foto_produk_1" class="form-control form-control-sm" disabled>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Foto Produk 2</label>
                    <input type="file" name="foto_produk_2" class="form-control form-control-sm" disabled>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Tanggal Registrasi</label>
                    <input type="text" name="tanggal_registrasi" class="form-control form-control-sm"
                        value="{{ date('d-m-Y', strtotime($data->tanggal_registrasi)) }}" disabled>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Petugas Verifikator</label>
                    <select name="id_petugas" class="form-control form-control-sm select_petugas" disabled>
                        <option value="{{ $data->id_petugas }}" selected>{{ $data->nama_petugas }}</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer gap-2">
        <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">Kembali</a>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
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
    });

</script>
@endsection
