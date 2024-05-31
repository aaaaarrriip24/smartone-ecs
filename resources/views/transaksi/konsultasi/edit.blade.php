@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Edit Konsultasi</div>
    <form method="post" action="{{ url('konsultasi/update') }}" enctype="multipart/form-data">
        @csrf
        <input hidden type="text" name="id" class="form-control form-control-sm" value="{{ $data->id }}" required="required">
        <input hidden type="text" name="foto_pertemuan_lama" class="form-control form-control-sm" value="{{ $data->foto_pertemuan }}">
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Kode Konsultasi</label>
                        <input type="text" name="kode_konsultasi" class="form-control form-control-sm"
                            value="{{ $data->kode_konsultasi }}" disabled>
                        <input hidden type="text" name="kode_kon" class="form-control form-control-sm"
                            value="{{ $data->kode_konsultasi }}">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group mb-2">
                        <label class="form-label mb-1 mt-0 labelInput">Nama Perusahaan</label>
                        <select name="id_perusahaan" class="form-control form-control-sm select_perusahaan">
                            <option value="{{ $data->id_perusahaan }}" selected>{{ strtoupper($data->nama_perusahaan) }}, {{ strtoupper($data->nama_tipe) }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Tanggal Konsultasi</label>
                        <input type="text" name="tanggal_konsultasi" class="form-control form-control-sm datepicker"
                            value="{{ date('d-m-Y', strtotime($data->tanggal_konsultasi)) }}" required="required">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-0 labelInput">Cara Konsultasi</label>
                        <select name="cara_konsultasi" class="form-control form-control-sm cara_konsultasi" required="required">
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
                        <label class="form-label mb-1 mt-2 labelInput">Tempat Pertemuan</label>
                        <input type="text" name="tempat_pertemuan" class="form-control form-control-sm" value="{{ $data->tempat_pertemuan }}"
                            required="required">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Topik</label>
                        <select name="id_topik" class="form-control form-control-sm select_topik"
                            required="required">
                            <option value="{{ $data->id_topik }}" selected>{{ $data->nama_topik }}</option>
                        </select>
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
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Saran dan Solusi yang Diberikan</label>
                        <!-- <input type="text" name="isi_konsultasi" class="form-control form-control-sm" value="{{ $data->isi_konsultasi }}" required="required"> -->
                        <textarea class="form-control" name="isi_konsultasi" placeholder="Saran dan Solusi yang Diberikan" id="floatingTextarea" rows="3" required>{{ $data->isi_konsultasi }}</textarea>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Foto</label>
                        <input type="file" name="foto_pertemuan" class="form-control form-control-sm">
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
