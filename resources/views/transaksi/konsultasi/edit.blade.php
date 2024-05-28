@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Add Konsultasi</div>
    <form method="post" action="{{ url('konsultasi/update') }}" enctype="multipart/form-data">
        @csrf
        <input hidden type="text" name="id" class="form-control form-control-sm" value="{{ $data->id }}" required="required">
        <input hidden type="text" name="foto_pertemuan_lama" class="form-control form-control-sm" value="{{ $data->foto_pertemuan }}" required="required">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Kode Konsultasi</label>
                        <input type="text" name="kode_konsultasi" class="form-control form-control-sm"
                            value="{{ $data->kode_konsultasi }}" disabled>
                        <input hidden type="text" name="kode_kon" class="form-control form-control-sm"
                            value="{{ $data->kode_konsultasi }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Kode Perusahaan</label>
                        <select name="id_perusahaan" class="form-control form-control-sm select_perusahaan"
                            required="required">
                            <option value="{{ $data->id_perusahaan }}" selected>{{ $data->kode_perusahaan }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Tanggal Konsultasi</label>
                        <input type="date" name="tanggal_konsultasi" class="form-control form-control-sm"
                            value="{{ $data->tanggal_konsultasi }}" required="required">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Cara Konsultasi</label>
                        <select name="cara_konsultasi" class="form-control form-control-sm" required="required">
                            <option value="{{ $data->cara_konsultasi }}">{{ $data->cara_konsultasi }}</option>
                            <option value="Offline">Offline</option>
                            <option value="Online">Online</option>
                            <option value="WA">WA</option>
                            <option value="Phone">Phone</option>
                            <option value="Email">Email</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Tempat Pertemuan</label>
                        <input type="text" name="tempat_pertemuan" class="form-control form-control-sm" value="{{ $data->tempat_pertemuan }}"
                            required="required">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Topik</label>
                        <select name="id_topik" class="form-control form-control-sm select_topik"
                            required="required">
                            <option value="{{ $data->id_topik }}" selected>{{ $data->nama_topik }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Isi Topik</label>
                        <input type="text" name="isi_konsultasi" class="form-control form-control-sm" value="{{ $data->isi_konsultasi }}" required="required">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Petugas</label>
                        <select name="id_petugas" class="form-control form-control-sm select_petugas"
                            required="required">
                        <option value="{{ $data->id_petugas }}" selected>{{ $data->nama_petugas }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto_pertemuan" class="form-control form-control-sm">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer gap-2">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
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
