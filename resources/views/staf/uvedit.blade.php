<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Edit Data Staf</h4>
		</div>
		<div class="modal-body">
			<form action="/staf/update" method="POST" role="form" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="form-group">
					<label for="">ID STAF</label>
					<input type="text" class="form-control" id="" placeholder="Input field" value="{{$staf->id_staf}}" readonly name="id_staf">
				</div>
				<div class="form-group">
					<label>ID USER</label>
					<input type="text" name="id_user" class="form-control" value="{{$staf->id_user}}" readonly>
				</div>
				<div class="form-group">
					<label>NAMA LENGKAP</label>
					<input type="text" name="nama_lengkap" placeholder="Nama Lengkap ..." class="form-control" value="{{$staf->nama_lengkap}}" required>
				</div>
				<div class="form-group">
					<label>BAGIAN</label>
					<input type="text" name="bagian" placeholder="Bagian ..." class="form-control" value="{{$staf->bagian}}" required>
				</div>
				<div class="form-group">
					<label>EMAIL</label>
					<input type="email" name="email" class="form-control" placeholder="Email ..." value="{{$staf->user->email}}" required>
				</div>
				<div class="form-group">
					<label>NOMOR TELEPON</label>
					<input type="text" name="telp" class="form-control" placeholder="Nomor Telepon ..." value="{{$staf->user->telp}}" required>
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