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
        <a href="https://exportcenter.id/laporan/partisipasi">Export Center</a>
    </footer>
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
                <tr>
                    <td width="3%" style="font-size: 12px !important; text-align: center;"><b>No.</b></td>
                    <td width="15%" style="font-size: 12px !important; text-align: center;"><b>Nama Perusahaan <br>Skala Perusahaan</b></td>
                    <td width="25%" style="font-size: 12px !important; text-align: center;"><b>Alamat</b></td>
                    <td width="15%" style="font-size: 12px !important; text-align: center;"><b>Produk</b></td>
                    <td width="12%" style="font-size: 12px !important; text-align: center;"><b>PIC</b></td>
                    <td width="10%" style="font-size: 12px !important; text-align: center;"><b>Email/ <br>Telephone</b></td>
                </tr>

                @foreach( collect($tb)->where("id_partisipasi", $d->id)->toArray() as $k)
                <tr>
                    <td style="font-size: 12px !important; text-align: center;">{{ $loop->iteration }}</td>
                    <td>{{ $k->nama_perusahaan }}{{ empty($k->nama_tipe) ? "" : ", " .$k->nama_tipe }} <br>{{ empty($k->skala_perusahaan) ? " " : $k->skala_perusahaan}}</td>
                    <td>{{ empty($k->alamat_perusahaan) ? $k->alamat_pabrik : $k->alamat_perusahaan }} <br> {{ $k->kabkota }}<br> {{ $k->provinsi }} </td>
                    <td>{{ empty($k->nama_kategori_produk) ? "" : $k->nama_kategori_produk }}<br> {{ !empty($k->sub_kategori) ? $k->sub_kategori : "" }} <br> {{ empty($k->detail_produk_utama) ? "-" : $k->detail_produk_utama }} </td>
                    <td>{{ empty($k->nama_contact_person) ? "-" : $k->nama_contact_person }}</td>
                    <td>{{ empty($k->email) ? "-" : $k->email }} <br>{{ empty($k->telp_kantor) ? $k->telp_contact_person : $k->telp_kantor }}</td>
                </tr>
                @endforeach
                <tr>
                    <td width="3%" style="border: none;"></td>
                    <td width="15%" style="border: none;"></td>
                    <td width="25%" style="border: none;"></td>
                    <td width="15%" style="border: none;"></td>
                    <td width="12%" style="border: none;"></td>
                    <td width="10%" style="border: none;"></td>
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
