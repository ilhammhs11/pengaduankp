<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Pengaduan {{$tanggapan->id_pengaduan}}</h4>
		</div>
		<div class="modal-body">
			<center>
				<img src="{{$tanggapan->pengaduan->getFoto()}}" width="100px">
			</center>
			<br>
			<table class="table" border="1" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td>JENIS PENGADUAN</td>
					<td>{{$tanggapan->pengaduan->jenis}}</td>
				</tr>
				<tr>
					<td>JUDUL</td>
					<td>{{$tanggapan->pengaduan->judul}}</td>
				</tr>
				<tr>
					<td>ID USER</td>
					<td>
						@if($tanggapan->pengaduan->user->level == '1')
							{{$tanggapan->pengaduan->user->staf->id_staf}} - {{$tanggapan->pengaduan->user->staf->nama_lengkap}}
						@endif
						@if($tanggapan->pengaduan->user->level == '2')
							{{$tanggapan->pengaduan->user->siswa->nis}} - {{$tanggapan->pengaduan->user->siswa->nama_lengkap}}
						@endif
					</td>
				</tr>
				<tr>
					<td>TANGGAL PENGADUAN</td>
					<td>{{$tanggapan->pengaduan->tgl_pengaduan}}</td>
				</tr>
				<tr>
					<td>ISI LAPORAN</td>
					<td>{{$tanggapan->pengaduan->isi_laporan}}</td>
				</tr>
				<tr>
					<td>TANGGAL TANGGAPAN</td>
					<td>{{$tanggapan->tgl_tanggapan}}</td>
				</tr>
				<tr>
					<td>ISI TANGGAPAN</td>
					<td>{{$tanggapan->tanggapan}}</td>
				</tr>
				<tr>
					<td>PETUGAS</td>
					<td>{{$tanggapan->id_petugas}} - {{$tanggapan->petugas->nama_lengkap}}</td>
				</tr>
				<tr>
					<td>STATUS PENGADUAN</td>
					<td>
						@if($tanggapan->pengaduan->status == '1')
						<label class="label label-info">Sedang Diproses</label>
						@endif
						@if($tanggapan->pengaduan->status == '2')
						<label class="label label-success">Selesai</label>
						@endif
					</td>
				</tr>
			</table>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>
</div>