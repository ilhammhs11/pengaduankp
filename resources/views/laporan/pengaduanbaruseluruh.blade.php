<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data {{$title}}</title>
</head>
<body onload="window.print();">
	<center>
		<h1>LAPORAN DATA {{$judul}}</h1>
	</center>
	<table border="1" cellspacing="0px" width="100%">
		<thead>
			<tr style="height: 50px;">
				<th>ID PENGADUAN</th>
				<th>JUDUL</th>
				<th>PELAPOR</th>
				<th>FOTO</th>
				<th>TANGGAL PENGADUAN</th>
				<th>STATUS</th>
			</tr>
		</thead>
		<tbody>
			@foreach($pengaduan as $row)
			<tr>
				<td style="padding: 20px;">{{$row->id_pengaduan}}</td>
				<td style="padding: 20px;">{{$row->judul}}</td>
				<td style="padding: 20px;">
					@if($row->user->level == '1')
					{{$row->user->staf->id_staf}} - {{$row->user->staf->nama_lengkap}}
					@endif
					@if($row->user->level == '2')
					{{$row->user->siswa->nis}} - {{$row->user->siswa->nama_lengkap}}
					@endif
				</td style="padding: 20px;">
				<td style="padding: 10px; text-align: center;">
					<img src="{{$row->getFoto()}}" width="100px">
				</td>
				<td style="padding: 20px;">{{$row->tgl_pengaduan}}</td>
				<td style="padding: 20px;">Baru</td>
			</tr>
			@endforeach
			<tr style="height: 30px; text-align: center;">
				<td colspan="5"><label>Jumlah</label></td>
				<td>{{$pengaduan->count()}} Pengaduan</td>
			</tr>
		</tbody>
	</table>
</body>
</html>