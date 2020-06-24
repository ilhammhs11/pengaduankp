<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Edit Data Siswa</h4>
		</div>
		<div class="modal-body">
			<form action="/siswa/update" method="POST" role="form" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="form-group">
					<label for="">ID USER</label>
					<input type="text" class="form-control" id="" placeholder="Input field" value="{{$siswa->id_user}}" readonly name="id_user">
				</div>
				<div class="form-group">
					<label>NIS</label>
					<input type="text" name="nis" class="form-control" placeholder="NIS ..." value="{{$siswa->nis}}" readonly>
				</div>
				<div class="form-group">
					<label>NAMA LENGKAP</label>
					<input type="text" name="nama_lengkap" placeholder="Nama Lengkap ..." class="form-control" value="{{$siswa->nama_lengkap}}" required>
				</div>
				<div class="form-group">
					<label>EMAIL</label>
					<input type="email" name="email" class="form-control" placeholder="Email ..." value="{{$siswa->user->email}}" required>
				</div>
				<div class="form-group">
					<label>NOMOR TELEPON</label>
					<input type="text" name="telp" class="form-control" placeholder="Nomor Telepon ..." value="{{$siswa->user->telp}}" required>
				</div>
				<div class="form-group">
					<label>JENIS KELAMIN</label>
					<select class="form-control" name="jk">
						<option value="L" @if($siswa->jk == 'L') selected @endif>Laki-laki</option>
						<option value="P" @if($siswa->jk == 'P') selected @endif>Perempuan</option>
					</select>
				</div>
				<div class="form-group">
					<label>ALAMAT</label>
					<textarea class="form-control" name="alamat" required>{{$siswa->alamat}}</textarea>
				</div>
				<div class="form-group">
					<label>KELAS</label>
					<select class="form-control" name="id_kelas">
						@foreach($kelas as $row)
						<option value="{{$row->id_kelas}}" @if($row->id_kelas == $siswa->id_kelas) selected @endif>{{$row->id_kelas}} - {{$row->nama_kelas}}</option>
						@endforeach
					</select>

				</div>
				<div class="form-group">
					<label for="">FOTO</label>
					<input type="file" class="form-control" name="foto">
				</div>
				<div class="form-group">
					<input type="checkbox" name="cek" value="cek">
					<label>Ceklis Jika Ingin Mengubah</label>
				</div>

				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>