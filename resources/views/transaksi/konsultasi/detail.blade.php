@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Detail Konsultasi</div>
    <div class="card-body">
        <div class="row">
            <div class="col-3">
                <div class="form-group mb-2">
                    <label class="form-label mb-1 mt-0 labelInput">Kode Konsultasi</label>
                    <input type="text" name="kode_konsultasi" class="form-control form-control-sm"
                        value="{{ $data->kode_konsultasi }}" disabled>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group mb-2">
                    <label class="form-label mb-1 mt-0 labelInput">Nama Perusahaan</label>
                    <select name="id_perusahaan" class="form-control form-control-sm select_perusahaan" disabled>
                        <option value="{{ $data->id_perusahaan }}" selected disabled>
                            {{ strtoupper($data->nama_perusahaan) }}, {{ strtoupper($data->nama_tipe) }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group mb-2">
                    <label class="form-label mb-1 mt-0 labelInput">Tanggal Konsultasi</label>
                    <input type="date" name="tanggal_konsultasi" class="form-control form-control-sm"
                        value="{{ $data->tanggal_konsultasi }}" disabled>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group mb-2">
                    <label class="form-label mb-1 mt-0 labelInput">Cara Konsultasi</label>
                    <select name="cara_konsultasi" class="form-control form-control-sm" required="required" disabled>
                        <option value="{{ $data->cara_konsultasi }}" selected disabled>{{ $data->cara_konsultasi }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-2">
                    <label class="form-label mb-1 mt-2 labelInput">Tempat Pertemuan</label>
                    <input type="text" name="tempat_pertemuan" class="form-control form-control-sm"
                        value="{{ $data->tempat_pertemuan }}" disabled>
                </div>
            </div>

            <div class="col-3">
                <div class="form-group mb-2">
                    <label class="form-label mb-1 mt-2 labelInput">Foto Pertemuan</label>
                    <!-- <input type="text" name="foto_pertemuan" class="form-control form-control-sm"
                        value="{{ $data->tempat_pertemuan }}" disabled> -->
                    @if(!empty($data->foto_pertemuan))
                    <a href="{{ asset('foto_pertemuan/'.$data->foto_pertemuan ) }}" class="form-control btn btn-sm btn-primary" target="_blank">Lihat Foto</a>
                    @else
                    <a href="javascript:void(0);" class="form-control btn btn-sm btn-warning" disabled>Foto Masih Kosong</a>
                    @endif
                </div>
            </div>

            <!-- <div class="col-3 mt-2">
                <div class="card mb-0" style="max-width: 18rem;">
                    <div class="card-header">
                        <h5 class="card-title labelInput">Foto Pertemuan</h5>
                    </div>
                    <img src="{{ $file }}" class="card-img-bottom" alt="..." style="max-width: 540px;">
                </div>
            </div> -->

            <div class="col-3">
                <div class="form-group mb-2">
                    <label class="form-label mb-1 mt-2 labelInput">Petugas</label>
                    <select name="id_petugas" class="form-control form-control-sm" disabled>
                        <option value="{{ $data->id_petugas }}" selected disabled>{{ $data->nama_petugas }}</option>
                    </select>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group mb-2">
                    <label class="form-label mb-1 mt-2 labelInput">Topik</label>
                    <select name="id_topik[]" class="form-control form-control-sm select_topik" multiple="multiple"
                        disabled>
                        @foreach( $topik as $t )
                        @if(!empty($t->id))
                        <option value="{{ $t->id }}" selected disabled>{{ $t->nama_topik }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label mb-1 mt-2 labelInput">Saran dan Solusi yang Diberikan</label>
                    <textarea id="summernote" class="form-control" name="isi_konsultasi"
                        placeholder="Saran dan Solusi yang Diberikan" id="floatingTextarea" rows="3"
                        disabled>{{ $data->isi_konsultasi }}</textarea>
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
        // Select
        $('#summernote').summernote('disable');

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

    });

</script>
@endsection
