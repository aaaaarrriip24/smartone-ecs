@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Edit Perusahaan</div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Kode Perusahaan</label>
                    <input type="text" name="kode_perusahaan" class="form-control form-control-sm"
                        value="{{ $data->kode_perusahaan }}" disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Nama Perusahaan</label>
                    <input type="text" name="nama_perusahaan" class="form-control form-control-sm"
                        value="{{ $data->nama_perusahaan }}" disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Tipe Perusahaan</label>
                    <select name="id_tipe" class="form-control form-control-sm select_tipe" disabled>
                        <option value="{{ $data->id_tipe }}">{{ $data->nama_tipe }}</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Provinsi</label>
                    <select name="id_provinsi" class="form-control form-control-sm province_id" disabled>
                        <option value="{{ $data->id_provinsi }}">{{ $data->provinsi }}</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Kabupaten/Kota</label>
                    <select name="id_kabkota" class="form-control form-control-sm cities_id" disabled>
                        <option value="{{ $data->id_kabkota }}">{{ $data->cities }}</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Alamat Perusahaan</label>
                    <input type="text" name="alamat_perusahaan" class="form-control form-control-sm"
                        value="{{ $data->alamat_perusahaan }}" disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Nama Contact Person</label>
                    <input type="text" name="nama_contact_person" class="form-control form-control-sm"
                        value="{{ $data->nama_contact_person }}" disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Telpon Contact Person</label>
                    <input type="number" name="telp_contact_person" class="form-control form-control-sm"
                        value="{{ $data->telp_contact_person }}" disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control form-control-sm" value="{{ $data->email }}"
                        disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Website Perusahaan</label>
                    <input type="text" name="website" class="form-control form-control-sm" value="{{ $data->website }}"
                        disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Status Kepemilikan</label>
                    <select name="status_kepemilikan" class="form-control form-control-sm form-select" disabled>
                        <option value="{{ $data->status_kepemilikan }}" selected>{{ $data->status_kepemilikan }}
                        </option>
                        <option value="PMDN">PMDN</option>
                        <option value="PMA">PMA</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Skala Perusahaan</label>
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
            <div class="col-6">
                <div class="form-group">
                    <label>Jumlah Karyawan</label>
                    <select name="jumlah_karyawan" class="form-control form-control-sm form-select" disabled>
                        <option value="{{ $data->jumlah_karyawan }}" selected>{{ $data->jumlah_karyawan }}</option>
                        <option value="< 5">
                            < 5</option> <option value="6 - 9">6 - 9
                        </option>
                        <option value="10 - 30">10 - 30</option>
                        <option value="> 30"> > 30</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Kategori Produk</label>
                    <select name="id_kategori_produk" class="form-control form-control-sm select_k_produk" disabled>
                        <option value="{{ $data->id_kategori_produk }}" selected>{{ $data->nama_kategori_produk }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Detail Produk Utama</label>
                    <input type="text" name="detail_produk_utama" class="form-control form-control-sm"
                        value="{{ $data->detail_produk_utama }}" disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Merek Produk</label>
                    <input type="text" name="merek_produk" class="form-control form-control-sm"
                        value="{{ $data->merek_produk }}" disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>HS Code</label>
                    <input type="text" name="hs_code" class="form-control form-control-sm" value="{{ $data->hs_code }}"
                        disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Kapasitas Produksi</label>
                    <input type="number" name="kapasitas_produksi" class="form-control form-control-sm"
                        value="{{ $data->kapasitas_produksi }}" disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Satuan Kapasitas Produksi</label>
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
            <div class="col-6">
                <div class="form-group">
                    <label>Sertifikat</label>
                    <select name="sertifikat" class="form-control form-control-sm form-select" disabled>
                        <option value="{{ $data->sertifikat }}" selected>{{ $data->sertifikat }}</option>
                        <option value="SPP-RT">SPP-RT</option>
                        <option value="BPOM">BPOM</option>
                        <option value="HACCP">HACCP</option>
                        <option value="SKP">SKP</option>
                        <option value="HALAL">HALAL</option>
                        <option value="SNI">SNI</option>
                        <option value="SVLK">SVLK</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control form-control-sm form-select" disabled>
                        <option value="{{ $data->status }}" selected>{{ $data->status }}</option>
                        <option value="Sudah Ekspor">Sudah Ekspor</option>
                        <option value="Belum Ekspor">Belum Ekspor</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Foto Produk 1</label>
                    <input type="file" name="foto_produk_1" class="form-control form-control-sm" disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Foto Produk 2</label>
                    <input type="file" name="foto_produk_2" class="form-control form-control-sm" disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Tanggal Registrasi</label>
                    <input type="date" name="tanggal_registrasi" class="form-control form-control-sm"
                        value="{{ $data->tanggal_registrasi }}" disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Petugas Verifikator</label>
                    <select name="id_petugas" class="form-control form-control-sm select_petugas" disabled>
                        <option value="{{ $data->id_petugas }}" selected>{{ $data->nama_petugas }}</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer gap-2">
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection