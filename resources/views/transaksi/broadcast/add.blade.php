@extends('layouts.app')
@section('content')
<div class="card">
    <form method="post" action="{{ url('broadcast/draft') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <h5 class="modal-title" id="exampleModalLabel">Broadcast Email</h5>
            <div class="row">
                <div class="col-sm-6 step-1">
                    <div class="form-group mb-2">
                        <label class="form-label labelInput">Subject Email</label>
                        <input type="text" name="subject_email" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-sm-6 step-1">
                    <div class="form-group mb-2">
                        <label class="form-label labelInput">Attachment</label>
                        <input type="file" class="form-control" name="sfiles[]" multiple="multiple">
                    </div>
                </div>
                <div class="col-sm-6 step-1">
                    <div class="form-group mb-2 div_kategori">
                        <label class="form-label labelInput">Kategori Produk</label>
                        <select name="id_kategori_produk" class="form-control form-control-sm select_k_produk"></select>
                    </div>
                </div>
                <div class="col-sm-6 step-1">
                    <div class="form-group mb-2 div_sub_kategori">
                        <label class="form-label labelInput">Sub Kategori Produk</label>
                        <select name="id_sub_kategori[]" class="form-control form-control-sm select_sub_produk typeFilter"
                            multiple="multiple"></select>
                    </div>
                </div>
                <div class="col-sm-12 step-1">
                    <div class="form-group mb-2">
                        <label class="form-label labelInput">Body Email</label>
                        <textarea class="form-control" name="body_email" placeholder="Catatan" id="summernote"
                            rows="4"></textarea>
                    </div>
                </div>
                <div class="col-sm-12 step-2 d-none table-responsive">
                    <table id="dt_perusahaan"
                        class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                        <thead>
                            <th># </th>
                            <th>No. </th>
                            <th>Kode Perusahaan</th>
                            <th>Nama Perusahaan</th>
                            <th>Nama CP</th>
                            <th>Email</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ url('transaksi/broadcast') }}" class="btn btn-md btn-secondary text-white">View</a>
            <button type="button" class="btn btn-md btn-danger btn-back text-white d-none">Back</button>
            <button type="button" class="btn btn-md btn-primary btn-next text-white">Next</button>
            <button type="submit" class="btn btn-md btn-success btn-send text-send d-none">Send</button>
        </div>
    </form>
</div>
@endsection
@section('js')
<script>
    let table;
    $(document).ready(function () {
        $(document).on('change', '.typeFilter', function (e) {
            table.ajax.reload(null, false);
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
                {
                    data: 'kode_perusahaan',
                    name: 'kode_perusahaan',
                    orderable: true,
                },
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
            ]
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