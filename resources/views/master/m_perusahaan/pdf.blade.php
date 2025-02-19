<!DOCTYPE html>
<html>

<head>
    <title>Laporan Daftar Perusahaan Anggota ECS</title>
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
        <a href="https://exportcenter.id/laporan/perusahaan">Export Center</a>
    </footer>
    
    <div>
        <center>
            <h5>Daftar Perusahaan Anggota ECS</h5>
        </center>
        <br />
        <table class="table table-bordered">
            <thead style="font-size: 14px !important; text-align: center;" class="align-middle">
                <tr>
                    <th width="3%">No</th>
                    <th width="15%">Nama&nbsp;Perusahaan/ <br>Skala</th>
                    <th width="25%">Alamat</th>
                    <th width="15%">Produk</th>
                    <th width="10%">PIC</th>
                    <th width="10%">Email/ <br>Telephone</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $data as $d )
                <tr>
                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                    <td>{{ $d->nama_perusahaan }}, {{ $d->nama_tipe }} <br>{{ $d->skala_perusahaan }}</td>
                    <td>{{ $d->alamat_perusahaan }} <br> {{ Str::title($d->cities) }} <br> {{ Str::title($d->provinsi) }} </td>
                    <td>{{ empty($d->nama_kategori_produk) ? "" : $d->nama_kategori_produk }} <br>{{ !empty($d->sub_kategori) ? $d->sub_kategori : "-" }} <br> {{ $d->detail_produk_utama }}</td>
                    <td>{{ $d->nama_contact_person }}</td>
                    <td>{{ strtolower($d->email) }} <br>{{ str_replace('`', '', $d->telp_contact_person) }}</td>
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
