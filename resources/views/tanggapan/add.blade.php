<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Tanggapan Pengaduan - {{$pengaduan->id_pengaduan}}</h4>
		</div>
		<div class="modal-body">
			<center>
				<img src="{{$pengaduan->getFoto()}}" width="100">
			</center>
			<table class="table" border="1" cellpadding="0px" cellspacing="0px">
				<tr>
					<td>JENIS PENGADUAN</td>
					<td>{{$pengaduan->jenis}}</td>
				</tr>
				<tr>
					<td>JUDUL</td>
					<td>{{$pengaduan->judul}}</td>
				</tr>
				<tr>
					<td>PELAPOR</td>
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
					<td>ISI PENGADUAN</td>
					<td>{{$pengaduan->isi_laporan}}</td>
				</tr>
			</table>
			<form action="tanggapan/create" method="POST" role="form">
				{{csrf_field()}}
				<input type="hidden" name="id_pengaduan" value="{{$pengaduan->id_pengaduan}}">
				<div class="form-group">
					<label for="">ID TANGGAPAN</label>
					<input type="text" class="form-control" name="id_tanggapan" value="{{autonumber('tanggapan', 'id_tanggapan', 3, 'T')}}" readonly>
				</div>
				<div class="form-group">
					<label for="">ID PETUGAS</label>
					<input type="text" class="form-control" name="id_petugas" value="{{auth()->user()->petugas->id_petugas}}" readonly>
				</div>
				<div class="form-group">
					<label for="">TANGGAPAN</label>
					<textarea class="form-control" name="tanggapan" required></textarea>
				</div>
				
			
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>