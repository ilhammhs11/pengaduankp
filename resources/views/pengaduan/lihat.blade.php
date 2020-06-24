<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Pengaduan {{$pengaduan->id_pengaduan}}</h4>
		</div>
		<div class="modal-body">
			<center>
				<img src="{{$pengaduan->getFoto()}}" width="100px">
			</center>
			<br>
			<table class="table" border="1" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td>JENIS PENGADUAN</td>
					<td>{{$pengaduan->jenis}}</td>
				</tr>
				<tr>
					<td>JUDUL</td>
					<td>{{$pengaduan->judul}}</td>
				</tr>
				<tr>
					<td>ID USER</td>
					<td>
						@if($pengaduan->user->level == '1')
							{{$pengaduan->user->staf->id_staf}} - {{$pengaduan->user->staf->nama_lengkap}}
						@endif
						@if($pengaduan->user->level == '2')
							{{$pengaduan->user->siswa->nis}} - {{$pengaduan->user->siswa->nama_lengkap}}
						@endif
					</td>
				</tr>
				<tr>
					<td>TANGGAL PENGADUAN</td>
					<td>{{$pengaduan->tgl_pengaduan}}</td>
				</tr>
				<tr>
					<td>ISI LAPORAN</td>
					<td>{{$pengaduan->isi_laporan}}</td>
				</tr>
				<tr>
					<td>STATUS PENGADUAN</td>
					<td>
						@if($pengaduan->status == '0')
						<label class="label label-warning">Baru</label>
						@endif
						@if($pengaduan->status == '1')
						<label class="label label-info">Sedang Diproses</label>
						@endif
						@if($pengaduan->status == '2')
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