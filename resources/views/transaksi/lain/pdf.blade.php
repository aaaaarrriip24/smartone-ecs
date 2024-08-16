<!DOCTYPE html>
<html>

<head>
    <title>Daftar Layanan Lainnya</title>
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

    </style>
</head>

<body>
    <div>
        <center>
            <h5>Daftar Layanan Lainnya</h5>
            <h6>Periode: {{ $tglawal }} s/d {{ $tglakhir }}</h6>
        </center>
        <br />
        <table class="table table-bordered">
            <thead style="background: #4BC0C0; font-size: 14px !important; text-align: center;" class="align-middle">
                <tr>
                    <th>No.</th>
                    <th>Bentuk Layanan</th>
                    <th>Tanggal Layanan</th>
                    <th>Nama Perusahaan</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $data as $d )
                <tr style="background: #9BDCDC;">
                    <td style="font-size: 12px !important; text-align: center;">{{ $loop->iteration }}</td>
                    <td>{{ $d->bentuk_layanan }}</td>
                    <td>{{ date('d-M-Y', strtotime($d->tanggal_transaksi)) }}</td>
                    <td>{{ $d->nama_perusahaan }}{{ !empty($d->nama_tipe) ? ', '. $d->nama_tipe: '' }}</td>
                    <td>{{ strip_tags($d->keterangan) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

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
