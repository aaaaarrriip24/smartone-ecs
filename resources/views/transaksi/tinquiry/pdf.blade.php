pa
<!DOCTYPE html>
<html>

<head>
    <title>Daftar Perusahaan Penerima Inquiry</title>
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

        footer {
            position: fixed; 
            bottom: -60px; 
            left: 0px; 
            right: 0px;
            height: 75px;
            text-align: center;
            line-height: 35px;
        }
    </style>
</head>

<body>
    <footer>
        <a href="https://exportcenter.id/laporan/inquiry">Export Center</a>
    </footer>
    <div>
        <center>
            <h5>Daftar Perusahaan Penerima Inquiry</h5>
            <h6>Periode: {{ $tglawal }} s/d {{ $tglakhir }}</h6>
        </center>
        <br />
        <table class="table table-bordered">
            <thead style="background: #4BC0C0; font-size: 14px !important; text-align: center;" class="align-middle">
                <tr>
                    <th width="5%">No.</th>
                    <th>Tanggal</th>
                    <th>Nama Buyer</th>
                    <th>Produk</th>
                    <th>Negara Asal</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $data as $d )
                <tr style="background: #4BC0C0;">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ date('d-M-Y', strtotime($d->tanggal_inquiry)) }}</td>
                    <td>{{ $d->nama_buyer }}</td>
                    <td>{{ $d->produk_yang_diminta }}</td>
                    <td>{{ $d->en_short_name }}</td>
                </tr>
                <tr style="background: #9BDCDC;">
                    <td colspan="5" style="font-size: 14px !important;"><b>Peserta</b></td>
                </tr>
                <tr style="background: #DBF2F2;">
                    <td width="5%" style="font-size: 12px !important; text-align: center;"><b>No.</b></td>
                    <td colspan="2" style="font-size: 12px !important; text-align: center;"><b>Nama Perusahaan</b></td>
                    <td colspan="2" style="font-size: 12px !important; text-align: center;"><b>Produk</b></td>
                </tr>
                @foreach( collect($tq)->where("id_inquiry", $d->id)->toArray() as $k)
                <tr style="background: #DBF2F2;">
                    <td>{{ $loop->iteration }}</td>
                    <td colspan="2">{{ $k->nama_perusahaan }}{{ empty($k->nama_tipe) ? "" : ", " .$k->nama_tipe }}</td>
                    <td colspan="2">{{ empty($k->detail_produk_utama) ? "-" : $k->detail_produk_utama }}</td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
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
