<!DOCTYPE html>
<html>

<head>
    <title>Daftar Partisipasi Perusahaan</title>
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
            <h5>Daftar Perusahaan</h5>
        </center>
        <br />
        @foreach( $data as $d )
        <center>
            <h6>{{ $d->kegiatan }}</h6>
        </center>
        <table class="table table-bordered">
            <tbody>
                <tr style="background: #9BDCDC;">
                    <td colspan="5" style="font-size: 14px !important;"><b>Peserta</b></td>
                </tr>
                <tr style="background: #DBF2F2;">
                    <td style="font-size: 12px !important; text-align: center;"><b>No.</b></td>
                    <td colspan="2" style="font-size: 12px !important; text-align: center;"><b>Nama Perusahaan</b></td>
                    <td colspan="2" style="font-size: 12px !important; text-align: center;"><b>Produk</b></td>
                </tr>
                
                @foreach( collect($tb)->where("id_partisipasi", $d->id)->toArray() as $k)
                <tr style="background: #DBF2F2;">
                    <td style="font-size: 12px !important; text-align: center;">{{ $loop->iteration }}</td>
                    <td colspan="2">{{ $k->nama_perusahaan }}{{ empty($k->nama_tipe) ? "" : ", " .$k->nama_tipe }}</td>
                    <td colspan="2">{{ empty($k->detail_produk_utama) ? "-" : $k->detail_produk_utama }}</td>
                </tr>
                @endforeach
                <tr>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                </tr>
            </tbody>
        </table>
        @endforeach

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
