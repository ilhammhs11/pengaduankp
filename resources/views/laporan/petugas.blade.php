<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Petugas</title>
</head>
<body onload="window.print();">
	<center>
		<h1>LAPORAN DATA PETUGAS</h1>
	</center>
	<table border="1" cellspacing="0px" width="100%">
		<thead>
			<tr style="height: 50px;">
				<th>ID PETUGAS</th>
				<th>ID USER</th>
				<th>USERNAME</th>
				<th>FOTO</th>
				<th>EMAIL</th>
				<th>TELP</th>
			</tr>
		</thead>
		<tbody>
			@foreach($petugas as $row)
			<tr>
				<td style="padding: 20px;">{{$row->id_petugas}}</td>
				<td style="padding: 20px;">{{$row->user->id_user}}</td>
				<td style="padding: 20px;">{{$row->user->username}}</td>
				<td style="padding: 10px; text-align: center;">
					<img src="{{$row->user->getAvatar()}}" width="100px">
				</td>
				<td style="padding: 20px;">{{$row->user->email}}</td>
				<td style="padding: 20px;">{{$row->user->telp}}</td>
			</tr>
			@endforeach
			<tr style="height: 30px; text-align: center;">
				<td colspan="5"><label>Jumlah</label></td>
				<td>{{$petugas->count()}} Petugas</td>
			</tr>
		</tbody>
	</table>
</body>
</html>