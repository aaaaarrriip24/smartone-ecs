@extends('layouts.app')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Broadcast Email</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Transaksi</a></li>
                    <li class="breadcrumb-item active">Broadcast Email</li>
                    <li class="breadcrumb-item">
                        <!-- <a href="javascript:void(0);" class="btn btn-sm btn-primary" type="text" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add
                        </a> -->
                        <a href="{{ url('broadcast/add') }}" class="btn btn-sm btn-primary text-white" type="text">
                            Add
                        </a>
                    </li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Perusahaan</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 table-responsive">
                        <table id="dt_perusahaan"
                            class="table table-bordered dt-responsive nowrap table-striped align-middle"
                            style="width:100%">
                            <thead>
                                <!-- <button class="btn btn-sm btn-success btn-send-all">Send Email</button> -->
                                <!-- <th># </th> -->
                                <th>No. </th>
                                <th>Subject</th>
                                <th>Body</th>
                                <!-- <th>Perusahaan</th> -->
                                <th>Action</th>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="penerimaEmail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="{{ url('penerima/store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Penerima Email</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Perusahaan</label>
                        <input hidden type="text" name="id_bm" class="get_id_template">
                        <select name="id_perusahaan[]" class="form-control form-control-sm select_perusahaan" required
                            multiple="multiple"></select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="{{ url('broadcast/draft') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Broadcast Email</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- <div class="form-group">
                        <label class="form-label mb-1 mt-2 labelInput">Filter Penerima</label>
                        <select name="filter_penerima" class="form-control form-control-sm filter_penerima">
                            <option value="" selected></option>
                            <option value="byID">Per Perusahaan</option>
                            <option value="byKategori">Per Kategori Perusahaan</option>
                            <option value="bySubKategori">Per Sub Kategori Perusahaan</option>
                        </select>
                    </div> -->
                    <div class="form-group div_kategori">
                        <label class="form-label mb-1 mt-2 labelInput">Kategori Produk</label>
                        <select name="id_kategori_produk" class="form-control form-control-sm select_k_produk"></select>
                    </div>
                    <div class="form-group div_sub_kategori">
                        <label class="form-label mb-1 mt-2 labelInput">Sub Kategori Produk</label>
                        <select name="id_sub_kategori[]" class="form-control form-control-sm select_sub_produk"
                        multiple="multiple"></select>
                    </div>
                    <!-- <div class="form-group div_perusahaan">
                        <label class="form-label mb-1 mt-2 labelInput">Pilih Perusahaan</label>
                        <select name="id_perusahaan[]" class="form-control form-control-sm form-select select_perusahaan" multiple="multiple"></select>
                    </div> -->
                    <div class="form-group">
                        <label>Subject Email</label>
                        <input type="text" name="subject_email" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <label>Body Email</label>
                        <textarea class="form-control" name="body_email" placeholder="Catatan" id="summernote"
                        rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Attachment</label>
                        <input type="file" class="form-control" name="files[]" multiple="multiple">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    let table;
    $(document).ready(function () {
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
            ajax: base_url + "transaksi/broadcast",
            columns: [
                // {
                //     data: 'checkbox',
                //     name: 'checkbox',
                //     orderable: false,
                //     searchable: false,
                //     className: 'text-center',
                //     width: '5%'
                // },
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    className: 'text-center',
                    width: '5%'
                },
                // {
                //     data: 'nama_perusahaan',
                //     name: 'nama_perusahaan',
                //     orderable: true,
                //     render: function (data, type, row, meta) {
                //         let text = row.nama_perusahaan;
                //         let result = text.toUpperCase();
                //         let str = row.nama_tipe;
                //         if (str == null) {
                //             str = "";
                //         } else {
                //             str = ", " + row.nama_tipe;
                //         }

                //         return result + str;
                //     }
                // },
                {
                    data: 'subject_email',
                    name: 'subject_email',
                    orderable: true,
                },
                {
                    data: 'body_email',
                    name: 'body_email',
                    orderable: true,
                    render: function (data, type, row, meta) {
                        var html = row.body_email;
                        var div = document.createElement("div");
                        div.innerHTML = html;
                        var text = div.textContent || div.innerText || "";

                        var str = text;
                        if (str.length > 30) str = str.substring(0, 30);
                        return str;
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '10%'
                },
            ]
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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

        $(document).on("click", ".btn-penerima", function () {
            let data = table.row($(this).closest('tr')).data();
            let penerima = data.penerima_email;
            $('.select_perusahaan').empty();
            for (let index = 0; index < penerima.length; index++) {
                const element = penerima[index];
                $('.select_perusahaan').append(
                    `<option value="${element.id}" selected>${element.nama_perusahaan} - ${element.nama_tipe}</option>`
                )

            }
            $('#penerimaEmail').modal('show');

            console.log(data);
            $(".get_id_template").val(data.id);
        })

        $(".select_k_produk").select2({
            placeholder: "Pilih Kategori Produk",
            dropdownParent: $('#exampleModal'),
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
            dropdownParent: $('#exampleModal'),
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
						return item;
					})
				};
                },
            }
        }).on('select2:select', function (e) {
            var data = e.params.data;
            console.log(data);

            // var perusahaanSelect = $('.select_sub_produk');
            // $.ajax({
            //     type: 'GET',
            //     url: base_url + 'select/perusahaan2/' + data.id
            // }).then(function (data) {
            //     // create the option and append to Select2
            //     var option = new Option(data.nama_perusahaan, data.id, true, true);
            //     perusahaanSelect.append(option).trigger('change');

            //     // manually trigger the `select2:select` event
            //     perusahaanSelect.trigger({
            //         type: 'select2:select',
            //         params: {
            //             data: data
            //         }
            //     });
            // });
        });

        $(".select_perusahaan").select2({
            placeholder: "Pilih Perusahaan",
            dropdownParent: $('#penerimaEmail'),
            width: '100%',
            allowClear: true,
            ajax: {
                url: base_url + 'penerima/show',
                dataType: 'json',
                data: function (params) {
                    params.id_template = $('.get_id_template').val();
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

        
        // Fetch the preselected item, and add to the control

        $(".btn-send-all").click(function () {
            var selectRowsCount = $("input[class='perusahaan-checkbox']:checked").length;

            if (selectRowsCount > 0) {

                var ids = $.map($("input[class='perusahaan-checkbox']:checked"), function (c) {
                    return c.value;
                });

                $.ajax({
                    type: 'POST',
                    url: base_url + "broadcast/send_email",
                    data: {
                        ids: ids
                    },
                    success: function (data) {
                        Swal.fire({
                            title: "Success!",
                            text: "Send email successfully!",
                            icon: "success"
                        });
                    }
                });

            } else {
                Swal.fire({
                    title: "Error!",
                    text: "Silahkan Pilih Setidaknya 1 Perusahaan",
                    icon: "error"
                });
            }
            console.log(selectRowsCount);
        });
    });

</script>
@endsection
