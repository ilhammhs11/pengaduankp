<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Edit Data Kelas</h4>
		</div>
		<div class="modal-body">
			<form action="/kelas/update" method="POST" role="form">
				{{csrf_field()}}
				<div class="form-group">
					<label for="">ID KELAS</label>
					<input type="text" class="form-control" id="" placeholder="Input field" value="{{$kelas->id_kelas}}" readonly name="id_kelas">
				</div>
				<div class="form-group">
					<label>NAMA KELAS</label>
					<input type="text" name="nama_kelas" class="form-control" placeholder="Nama Kelas ..." value="{{$kelas->nama_kelas}}" required>
				</div>
				<div class="form-group">
					<label>KETERANGAN</label>
					<textarea class="form-control" name="keterangan" required>{{$kelas->keterangan}}</textarea>
				</div>

				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>