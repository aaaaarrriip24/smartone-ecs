<!DOCTYPE html>
<html>

<head>
    <title>LAYANAN/ KOMUNIKASI ECS DENGAN
        {{ $perusahaan->nama_perusahaan }}{{ !empty($perusahaan->nama_tipe) ? ', ' . $perusahaan->nama_tipe : '' }}
    </title>
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
            margin-bottom: 2cm;
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
            <p style="font-size: 16px !important;"><b>LAYANAN/ KOMUNIKASI ECS DENGAN
                    <a href="https://exportcenter.id/">
                        {{ $perusahaan->nama_perusahaan }}{{ !empty($perusahaan->nama_tipe) ? ', ' . $perusahaan->nama_tipe : '' }}
                    </a>
                </b>
            </p>
        </center>
        <br />
        <table class="table table-bordered">
            <thead style="font-size: 14px !important;" class="align-middle">
                <tr>
                    <th>Nama&nbsp;Perusahaan</th>
                    <th>:</th>
                    <td>{{ $perusahaan->nama_perusahaan }}{{ !empty($perusahaan->nama_tipe) ? ', ' . $perusahaan->nama_tipe : '' }}
                    </td>
                </tr>
                <tr>
                    <th class="align-top">Alamat Perusahaan</th>
                    <th class="align-top">:</th>
                    <td>{{ $perusahaan->alamat_perusahaan }} <br>
                        {{ Str::title($perusahaan->cities) }} <br>
                        {{ Str::title($perusahaan->provinsi) }} </td>
                </tr>
                <tr>
                    <th>Skala Perusahaan</th>
                    <th>:</th>
                    <td>{{ $perusahaan->skala_perusahaan }}</td>
                </tr>
                <tr>
                    <th class="align-top">Produk</th>
                    <th class="align-top">:</th>
                    <td>
                        {{ $perusahaan->nama_kategori_produk }}
                        <br> 
                        {{ $perusahaan->sub_kategori }} 
                        <br> 
                        {{ $perusahaan->detail_produk_utama }} 
                    </td>
                </tr>
            </thead>
        </table>
        <br>
        @if($konsultasi->isEmpty())
        @else
        <h6>KONSULTASI : </h6>
        <table class="table table-bordered">
            <thead style="background: #FF9F40; font-size: 12px !important; text-align: center;" class="align-middle">
                <tr>
                    <th width="5%">No</th>
                    <th>Tanggal</th>
                    <th>Topik</th>
                    <th>Saran/ Masukan</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $konsultasi as $d )
                <tr style="background: #FF9F40;">
                    <td width="5%">{{ $loop->iteration }}</td>
                    <td width="15%">{{ date('d-M-Y', strtotime($d->tanggal_konsultasi)) }}</td>
                    <td width="25%">{{ $d->nama_topik }}</td>
                    <td>{{ str_replace("&nbsp;", "", strip_tags($d->isi_konsultasi)) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        @if($inquiry->isEmpty())
        @else
        <br>
        <h6>INQUIRY :</h6>
        <table class="table table-bordered">
            <thead style="background: #BD9CFF; font-size: 14px !important; text-align: center;" class="align-middle">
                <tr>
                    <th width="5%">No.</th>
                    <th width="15%">Tanggal</th>
                    <th>Negara Asal</th>
                    <th>Produk</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $inquiry as $d )
                <tr style="background: #BD9CFF;">
                    <td width="5%">{{ $loop->iteration }}</td>
                    <td width="15%">{{ date('d-M-Y', strtotime($d->tanggal_inquiry)) }}</td>
                    <td>{{ $d->en_short_name }}</td>
                    <td>{{ $d->produk_yang_diminta }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif


        @if($bm->isEmpty())
        @else
        <br>
        <h6>BUSINESS MATCHING :</h6>
        <table class="table table-bordered">
            <thead style="background: #4BC0C0; font-size: 14px !important; text-align: center;" class="align-middle">
                <tr>
                    <th width="5%">No.</th>
                    <th width="15%">Tanggal</th>
                    <th>Negara Asal</th>
                    <th>Produk</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $bm as $d )
                <tr style="background: #4BC0C0;">
                    <td width="5%">{{ $loop->iteration }}</td>
                    <td width="15%">{{ date('d-M-Y', strtotime($d->tanggal_bm)) }}</td>
                    <td>{{ $d->en_short_name }}</td>
                    <td>{{ $d->produk_bm }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif


        @if($texport->isEmpty())
        @else
        <br>
        <h6>TRANSAKSI EKSPOR :</h6>
        <table class="table table-bordered">
            <thead style="background: #FFCD56; font-size: 14px !important; text-align: center;" class="align-middle">
                <tr>
                    <th width="5%">No</th>
                    <th width="15%">Tanggal</th>
                    <th>Negara Tujuan</th>
                    <th>Nilai (USD)</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $texport as $d )
                <tr style="background: #FFCD56;">
                    <td width="5%">{{ $loop->iteration }}</td>
                    <td width="15%">{{ date('d-M-Y', strtotime($d->tanggal_lapor)) }}</td>
                    <td>{{ $d->en_short_name }}</td>
                    <td style="text-align: right;">{{ number_format($d->nilai_transaksi, 0) }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot style="background: #FFCD56;">
                <tr>
                    <td colspan="3" style="text-align: right; font-size: 14px;"><b>Total</b></td>
                    <td style="text-align: right;">{{ number_format($countTotal->summary, 0) }}</td>
                </tr>
            </tfoot>
        </table>
        @endif

        @if($inaexport->isEmpty())
        @else
        <br>
        <h6>INAEXPORT :</h6>
        <table class="table table-bordered">
            <thead style="background: #7CC2F2; font-size: 14px !important;" class="align-middle">
                <tr>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $inaexport as $d )
                <tr style="background: #7CC2F2;">
                    <td>{{ date('d-M-Y', strtotime($d->tanggal_registrasi_inaexport)) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        @if($tlain->isEmpty())
        @else
        <br>
        <h6>TRANSAKSI LAIN :</h6>
        <table class="table table-bordered">
            <thead style="background: #D8D9DC; font-size: 14px !important; text-align: center;" class="align-middle">
                <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Bentuk Layanan</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $tlain as $d )
                <tr style="background: #D8D9DC;">
                    <td style="font-size: 12px !important; text-align: center;">{{ $loop->iteration }}</td>
                    <td>{{ date('d-M-Y', strtotime($d->tanggal_transaksi)) }}</td>
                    <td>{{ $d->bentuk_layanan }}</td>
                    <td>{{ strip_tags($d->keterangan) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
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
