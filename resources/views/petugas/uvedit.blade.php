<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Edit Data Petugas</h4>
		</div>
		<div class="modal-body">
			<form action="/petugas/update" method="POST" role="form" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="form-group">
					<label for="">ID PETUGAS</label>
					<input type="text" class="form-control" id="" placeholder="Input field" value="{{$petugas->id_petugas}}" name="id_petugas" readonly>
				</div>
				<div class="form-group">
					<label for="">ID USER</label>
					<input type="text" class="form-control" id="" placeholder="Input field" value="{{$petugas->id_user}}" name="id_user" readonly>
				</div>
				<div class="form-group">
					<label for="">NAMA LENGKAP</label>
					<input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap ..." value="{{$petugas->nama_lengkap}}" required>
				</div>
				<div class="form-group">
					<label>JABATAN</label>
					<input type="text" name="jabatan" class="form-control" placeholder="Jabatan ..." value="{{$petugas->jabatan}}" required>
				</div>
				<div class="form-group">
					<label for="">EMAIL</label>
					<input type="email" class="form-control" name="email" placeholder="Email ..." value="{{$petugas->user->email}}" required>
				</div>
				<div class="form-group">
					<label>NOMOR TELEPON</label>
					<input type="text" name="telp" class="form-control" placeholder="Nomor Telepon ..." value="{{$petugas->user->telp}}" required>
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