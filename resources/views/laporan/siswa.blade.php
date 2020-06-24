<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Staf</title>
</head>
<body onload="window.print();">
	<center>
		<h1>LAPORAN DATA STAF</h1>
	</center>
	<table border="1" cellspacing="0px" width="100%">
		<thead>
			<tr style="height: 50px;">
				<th>NIS</th>
				<th>FOTO</th>
				<th>NAMA LENGKAP</th>
				<th>EMAIL</th>
				<th>JENIS KELAMIN</th>
				<th>KELAS</th>
			</tr>
		</thead>
		<tbody>
			@foreach($siswa as $row)
			<tr>
				<td style="padding: 20px;">{{$row->nis}}</td>
				<td style="padding: 10px; text-align: center;">
					<img src="{{$row->user->getAvatar()}}" width="100px">
				</td>
				<td style="padding: 20px;">{{$row->nama_lengkap}}</td>
				<td style="padding: 20px;">{{$row->user->email}}</td>
				<td style="padding: 20px;">
					@if($row->jk== 'L')
					Laki-laki
					@endif
					@if($row->jk== 'P')
					Perempuan
					@endif
				</td>
				<td style="padding: 20px;">{{$row->kelas->nama_kelas}}</td>
			</tr>
			@endforeach
			<tr style="height: 30px; text-align: center;">
				<td colspan="5"><label>Jumlah</label></td>
				<td>{{$siswa->count()}} Siswa</td>
			</tr>
		</tbody>
	</table>
</body>
</html>