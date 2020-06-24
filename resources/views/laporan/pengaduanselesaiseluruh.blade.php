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
				<th>TANGGAL TANGGAPAN</th>
				<th>STATUS</th>
			</tr>
		</thead>
		<tbody>
			@foreach($pengaduan as $row)
			<tr>
				<td style="padding: 20px;">{{$row->id_pengaduan}}</td>
				<td style="padding: 20px;">{{$row->pengaduan->judul}}</td>
				<td style="padding: 20px;">
					@if($row->pengaduan->user->level == '1')
					{{$row->pengaduan->user->staf->id_staf}} - {{$row->pengaduan->user->staf->nama_lengkap}}
					@endif
					@if($row->pengaduan->user->level == '2')
					{{$row->pengaduan->user->siswa->nis}} - {{$row->pengaduan->user->siswa->nama_lengkap}}
					@endif
				</td>
				<td style="padding: 10px; text-align: center;">
					<img src="{{$row->pengaduan->getFoto()}}" width="100px">
				</td>
				<td style="padding: 20px;">{{$row->pengaduan->tgl_pengaduan}}</td>
				<td style="padding: 20px;">{{$row->tgl_tanggapan}}</td>
				<td style="padding: 20px;">Selesai</td>
			</tr>
			@endforeach
			<tr style="height: 30px; text-align: center;">
				<td colspan="6"><label>Jumlah</label></td>
				<td>{{$pengaduan->count()}} Pengaduan</td>
			</tr>
		</tbody>
	</table>
</body>
</html>