pa
<!DOCTYPE html>
<html>

<head>
    <title>Laporan Transaksi Ekspor</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <meta name="base_url" content="{{ url('') }}" />
    <style>
        body {
            /* font-family: 'Courier New'; */
            margin-top: 0cm;
            margin-left: -15px;
            margin-right: 0cm;
            margin-bottom: 0cm;
            font-size: 11px;
        }

        .column {
            float: left;
            width: 25%;
            line-break: auto;
        }

    </style>
</head>

<body>
    <div>
        <center>
            <h5>Daftar Perusahaan Yang Melaporkan Transaksi Ekspor</h5>
            <h6>Periode: {{ $tglawal }} s/d {{ $tglakhir }}</h6>
        </center>
        <br />
        <table class="table table-bordered">
            <thead style="font-size: 14px !important; text-align: center;" class="align-middle">
                <tr>
                    <th>No</th>
                    <th>Nama Perusahaan</th>
                    <th>Produk</th>
                    <th width="13%">Tgl. Lapor</th>
                    <th>Negara Tujuan</th>
                    <th>Nilai (USD)</th>
                    <th>Doc. Pendukung</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $data as $d )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->nama_perusahaan }}, {{ $d->nama_tipe }}</td>
                    <td>{{ $d->detail_produk_utama }}</td>
                    <td>{{ date('d-m-Y', strtotime($d->tanggal_lapor)) }}</td>
                    <td>{{ $d->en_short_name }}</td>
                    <td>$ {{ number_format($d->nilai_transaksi, 0) }}</td>
                    <td>{{ $d->dok_pendukung }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" style="text-align: right; font-size: 14px;"><b>Total</b></td>
                    <td colspan="2">$ {{ number_format($countTotal->summary, 0) }}</td>
                </tr>
            </tfoot>
        </table>

        <!-- <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- <table class="table table-bordered" style="width: 100%">
            <tbody>
                <tr>
                    @foreach( $data as $d )
                    <td>
                        <img class="rounded border" src="{{ public_path('folder_bukti_dok/'. $d->bukti_dok) }}"
                            style="width: 150px; height: 150px" alt="">
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </td>
                    @endforeach
                </tr>
            </tbody>
        </table> -->

    </div>

    <!-- Base Url -->
    <script>
        var base_url = document.querySelector('meta[name="base_url"]').getAttribute('content') + '/';

    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
</body>

</html>