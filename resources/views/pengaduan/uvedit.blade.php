<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Edit Pengaduan {{$pengaduan->id_pengaduan}}</h4>
		</div>
		<div class="modal-body">
			<form action="/pengaduan/update" method="POST" role="form" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="form-group">
					<label for="">ID PENGADUAN</label>
					<input type="text" class="form-control" id="" placeholder="Input field" name="id_pengaduan" value="{{$pengaduan->id_pengaduan}}" readonly>
				</div>
				<div class="form-group">
					<label for="">ID USER</label>
					<input type="text" class="form-control" id="" placeholder="Input field" value="{{$pengaduan->id_user}}" name="id_user" readonly>
				</div>
				<div class="form-group">
					<label>JENIS PENGADUAN</label>
					<select class="form-control" name="jenis">
						<option value="Keluhan Pembelajaran" @if($pengaduan->jenis == 'Keluhan Pembelajaran') selected @endif>Keluhan Pembelajaran</option>
						<option value="Keluhan Pelayanan Sekolah" @if($pengaduan->jenis == 'Keluhan Pelayanan Sekolah') selected @endif>Keluhan Pelayanan Sekolah</option>
						<option value="Keluhan Fasilitas Sekolah" @if($pengaduan->jenis == 'Keluhan Fasilitas Sekolah') selected @endif>Keluhan Fasilitas Sekolah</option>
						<option value="Tindakan Penindasan / Kekerasan" @if($pengaduan->jenis == 'Tindakan Penindasan / Kekerasan') selected @endif>Tindakan Penindasan / Kekerasan</option>
					</select>
				</div>
				<div class="form-group">
					<label for="">JUDUL</label>
					<input type="text" name="judul" class="form-control" id="" placeholder="Judul ..." value="{{$pengaduan->judul}}" required>
				</div>
				<div class="form-group">
					<label for="">ISI LAPORAN</label>
					<textarea class="form-control" name="isi_laporan" required>{{$pengaduan->isi_laporan}}</textarea>
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