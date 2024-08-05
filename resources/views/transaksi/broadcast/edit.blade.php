@extends('layouts.app')
@section('content')
<div class="card">
    <form method="post" action="{{ url('broadcast/update') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <h5 class="modal-title">Broadcast Email</h5>
            <div class="row">
                <div class="col-sm-6 step-1">
                    <div class="form-group mb-2">
                        <label class="form-label labelInput">Subject Email</label>
                        <input hidden type="text" name="id_template" class="form-control form-control-sm"
                            value="{{ $template->id }}">
                        <input type="text" name="subject_email" class="form-control form-control-sm"
                            value="{{ $template->subject_email }}">
                    </div>
                </div>
                @if(empty($fileAttach))
                <div class="col-sm-6 step-1">
                    <div class="form-group mb-2">
                        <label class="form-label labelInput">Attachment</label>
                        <input type="file" class="form-control" name="sfiles[]" multiple="multiple">
                    </div>
                </div>
                @else
                <div class="col-sm-4 step-1">
                    <div class="form-group mb-2">
                        <label class="form-label labelInput">Attachment</label>
                        <input type="file" class="form-control" name="sfiles[]" multiple="multiple">
                    </div>
                </div>
                <div class="col-sm-2 step-1">
                    <div class="form-group mb-2">
                        <label class="form-label labelInput">Lihat File Attachment</label>
                        <div class="d-grid">
                            <button type="button" class="btn btn-sm btn-success btn-file" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Lihat File</button>
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-sm-2 step-1">
                    <div class="form-group mb-2">
                        <label class="form-label labelInput">Tambahkan ke Inquiry?</label>
                        <br>
                        <div class="form-check-inline">
                            <input class="form-check-input is_inquiry" type="radio" name="is_inquiry" value="1"
                                {{ ($template->is_inquiry=="1") ? "checked" : "" }} id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Ya
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <input class="form-check-input is_inquiry" type="radio" name="is_inquiry" value="0"
                                {{ ($template->is_inquiry=="0") ? "checked" : "" }} id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 step-1">
                    <div class="form-group mb-2 div_kategori">
                        <label class="form-label labelInput">Kategori Produk</label>
                        <select name="id_kategori_produk" class="form-control form-control-sm select_k_produk">
                            <option value="{{ $kategori->id_kategori }}">{{ $kategori->nama_kategori_produk }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 step-1">
                    <div class="form-group mb-2 div_sub_kategori">
                        <label class="form-label labelInput">Sub Kategori Produk</label>
                        <select name="id_sub_kategori[]"
                            class="form-control form-control-sm select_sub_produk typeFilter" multiple="multiple">
                            @foreach($subKategori as $s)
                            <option value="{{ $s->id_sub_kategori }}" selected>{{ $s->nama_sub_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 step-1">
                    <div class="form-group mb-2">
                        <label class="form-label labelInput">Body Email</label>
                        <textarea class="form-control" name="body_email" placeholder="Catatan" id="summernote"
                            rows="4">{{ strip_tags($template->body_email) }}</textarea>
                    </div>
                </div>
                <div class="card-body inquiry_tab step-1 d-none">
                    <h5 class="modal-title" id="exampleModalLabel">Inquiry</h5>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label mb-1 mt-0 labelInput">Kode Inquiry</label>
                                <input hidden type="text" name="id_inquiry"
                                    class="form-control form-control-sm id_inquiry"
                                    value="{{ !empty($data->id_inquiry) ? $data->id_inquiry : null}}">
                                <input type="text" name="kode_inquiry_disabled"
                                    value="{{ !empty($data->kode_inquiry) ? $data->kode_inquiry : $kode_inq }}"
                                    class="form-control form-control-sm" required disabled>
                                <input hidden type="text" name="kode_inquiry"
                                    value="{{ !empty($data->kode_inquiry) ? $data->kode_inquiry : $kode_inq }}"
                                    class="form-control form-control-sm kode_inquiry" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label mb-1 mt-0 labelInput">Tanggal Inquiry</label>
                                <input type="text" name="tanggal_inquiry" autocomplete="off"
                                    class="form-control form-control-sm datepicker tanggal_inquiry"
                                    placeholder="Contoh : {{ date('d-m-Y') }}"
                                    value="{{ date('d-m-Y', strtotime(!empty($data->tanggal_inquiry) ? $data->tanggal_inquiry : date('d-m-Y'))) }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label mb-1 mt-0 labelInput">Produk Yang Diminta</label>
                                <input type="text" name="produk_yang_diminta"
                                    value="{{ !empty($data->produk_yang_diminta) ? $data->produk_yang_diminta : ''}}"
                                    class="form-control form-control-sm produk_diminta" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label mb-1 mt-0 labelInput">Quantity</label>
                                <input type="text" name="qty"
                                    class="form-control form-control-sm text-end input-mask quantity"
                                    value="{{ !empty($data->qty) ? $data->qty : '' }}"
                                    data-inputmask="'alias': 'currency', 'prefix': '','digits': '0'" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label mb-1 mt-2 labelInput">Satuan Quantity</label>
                                <select name="satuan_qty" class="form-control form-control-sm select_satuan" required>
                                    @if(!empty($data->satuan_qty))
                                    <option value="{{ $data->satuan_qty }}" selected>{{ $data->satuan_qty }}</option>
                                    @else
                                    <option disabled selected>Pilih Satuan Quantity</option>
                                    @endif
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
                                    required>
                                    @if(!empty($data->id_negara_asal_inquiry))
                                    <option value="{{ $data->id_negara_asal_inquiry }}" selected>
                                        {{ $data->en_short_name }}</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label mb-1 mt-2 labelInput">Pihak Buyer</label>
                                <select name="pihak_buyer" class="form-control form-control-sm select_pihak" required>
                                    @if(!empty($data->pihak_buyer))
                                    <option value="{{ $data->pihak_buyer }}" selected>{{ $data->pihak_buyer }}</option>
                                    @else
                                    <option disabled selected>Pilih Pihak Buyer</option>
                                    @endif

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
                                <input type="text" name="nama_buyer"
                                    value="{{ !empty($data->nama_buyer) ? $data->nama_buyer : '' }}"
                                    class="form-control form-control-sm nama_buyer" placeholder="John Doe" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label mb-1 mt-2 labelInput">Email Buyer</label>
                                <input type="email" name="email_buyer"
                                    value="{{ !empty($data->email_buyer) ? $data->email_buyer : '' }}"
                                    class="form-control form-control-sm email_buyer" placeholder="john@email.com"
                                    required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label mb-1 mt-2 labelInput">Telfon Buyer</label>
                                <input type="number" autocomplete="off" name="telp_buyer"
                                    value="{{ !empty($data->telp_buyer) ? $data->telp_buyer : '' }}"
                                    class="form-control form-control-sm telfon_buyer" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 step-2 d-none table-responsive">
                    <table id="dt_perusahaan"
                        class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                        <thead>
                            <th># </th>
                            <th>No. </th>
                            <th>Nama Perusahaan</th>
                            <th>Nama CP</th>
                            <th>Email</th>
                            <th>Detail Produk Utama</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ url('transaksi/broadcast') }}" class="btn btn-md btn-secondary text-white">View</a>
            <button type="button" class="btn btn-md btn-danger btn-back text-white d-none">Back</button>
            <button type="button" class="btn btn-md btn-primary btn-next text-white">Next</button>
            <button type="submit" class="btn btn-md btn-success btn-send text-send d-none">Simpan</button>
        </div>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">File Attachment</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @foreach($fileAttach as $f)
                <div class="form-group">
                    <label>File</label>
                    <a href="{{ asset('file_email/'.$f->file) }}" target="_blank">{{ $f->file }}</a>
                </div>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    let table;
    $(document).ready(function () {
        $(document).on('change', '.typeFilter', function (e) {
            table.ajax.reload(null, false);
        });

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

        table = $('#dt_perusahaan').DataTable({
            autoWidth: false,
            responsive: false,
            scrollCollapse: true,
            processing: true,
            serverSide: true,
            paginate: true,
            lengthChange: true,
            filter: true,
            sort: true,
            info: true,
            ajax: {
                url: base_url + "select/perusahaan/sub_kategori",
                type: "POST",
                data: function (data) {
                    if ($('.select_sub_produk').val() != '') {
                        data.id_sub_kategori = $('.select_sub_produk').val();
                    } else {
                        data.id_sub_kategori = [0];
                    }
                    data._token = "{{ csrf_token() }}";
                    return data;
                }
            },
            columns: [{
                    data: 'checkbox',
                    name: 'checkbox',
                    orderable: false,
                    searchable: false,
                    className: 'text-center',
                    width: '5%'
                },
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    className: 'text-center',
                    width: '5%'
                },
                // {
                //     data: 'kode_perusahaan',
                //     name: 'kode_perusahaan',
                //     orderable: true,
                // },
                {
                    data: 'nama_perusahaan',
                    name: 'nama_perusahaan',
                    orderable: true,
                    render: function (data, type, row, meta) {
                        let text = row.nama_perusahaan;
                        let result = text.toUpperCase();
                        let str = row.nama_tipe;
                        if (str == null) {
                            str = "";
                        } else {
                            str = ", " + row.nama_tipe;
                        }

                        return result + str;
                    }
                },
                {
                    data: 'nama_contact_person',
                    name: 'nama_contact_person',
                    orderable: true,
                },
                {
                    data: 'email',
                    name: 'email',
                    orderable: true,
                },
                {
                    data: 'detail_produk_utama',
                    name: 'detail_produk_utama',
                    orderable: true,
                },
            ]
        });

        if ($('#flexRadioDefault1').is(':checked')) {
            $(".inquiry_tab").removeClass("d-none");
        }
        if ($('#flexRadioDefault2').is(':checked')) {
            $(".inquiry_tab").addClass("d-none");
            $(".kode_inquiry").removeAttr("required");
            $(".tanggal_inquiry").removeAttr("required");
            $(".produk_diminta").removeAttr("required");
            $(".quantity").removeAttr("required");
            $(".select_satuan").removeAttr("required");
            $(".select_negara").removeAttr("required");
            $(".select_pihak").removeAttr("required");
            $(".nama_buyer").removeAttr("required");
            $(".email_buyer").removeAttr("required");
            $(".telfon_buyer").removeAttr("required");
        }


        $('input:radio[name="is_inquiry"]').change(
            function () {
                if ($(this).val() == 1) {
                    $(".inquiry_tab").removeClass("d-none");
                } else {
                    $(".inquiry_tab").addClass("d-none");
                    $(".kode_inquiry").removeAttr("required");
                    $(".tanggal_inquiry").removeAttr("required");
                    $(".produk_diminta").removeAttr("required");
                    $(".quantity").removeAttr("required");
                    $(".select_satuan").removeAttr("required");
                    $(".select_negara").removeAttr("required");
                    $(".select_pihak").removeAttr("required");
                    $(".nama_buyer").removeAttr("required");
                    $(".email_buyer").removeAttr("required");
                    $(".telfon_buyer").removeAttr("required");
                }
            });
        $(".btn-back").on("click", function () {
            $(".step-1").removeClass("d-none");
            $(".btn-next").removeClass("d-none");
            $(".step-2").addClass("d-none");
            $(".btn-back").addClass("d-none");
        });

        $(".btn-next").on("click", function () {
            $(".step-1").addClass("d-none");
            $(".btn-next").addClass("d-none");
            $(".step-2").removeClass("d-none");
            $(".btn-back").removeClass("d-none");
            $(".btn-send").removeClass("d-none");
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
            console.log(data);
        });

        $(".select_sub_produk").select2({
            placeholder: "Pilih Sub Kategori Produk",
            width: '100%',
            allowClear: true,
            ajax: {
                url: base_url + 'select/sub_produk2',
                dataType: 'json',
                data: function (params) {
                    params.id_kategori = $('.select_k_produk').val();
                    return params
                },
                processResults: function (data) {
                    return {
                        results: data.map(function (item) {
                            item.id = item.id;
                            item.text = item.nama_sub_kategori;
                            item.perusahaan = item.id_perusahaan;
                            return item;
                        })
                    };
                },
            }
        }).on('select2:select', function (e) {
            var data = e.params.data;
            console.log(data);
        });

        $(".select_perusahaan").select2({
            placeholder: "Pilih Perusahaan",
            width: '100%',
            allowClear: true,
            ajax: {
                url: base_url + 'select/perusahaan/sub_kategori',
                dataType: 'json',
                data: function (params) {
                    params.id_sub_kategori = $('.select_sub_produk').val();
                    return params
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                id: item.id,
                                text: item.nama_perusahaan + ', ' + item.nama_tipe,
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
