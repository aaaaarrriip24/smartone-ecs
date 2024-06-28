<!DOCTYPE html>
<html>
<head>
	<title>Laporan Transaksi Ekspor</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
			<h5>Daftar Perusahaan Yang Melaporkan Transaksi Ekspor</h5>
			<h6>Periode: {{ date('d F', strtotime($tglawal)) }} s/d {{ date('d F Y', strtotime($tglakhir)) }}</h6>
		</center>
		<br/>
		<table class='table table-bordered'>
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
 
	</div>
 
</body>
</html>