<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Edit Status Pengaduan</h4>
		</div>
		<div class="modal-body">
			<form action="pengaduan/updatestatus" method="POST" role="form">
				{{csrf_field()}}
				<input type="hidden" name="id_pengaduan" value="{{$pengaduan->id_pengaduan}}">
				<div class="form-group">
					<label for="">STATUS PENGADUAN</label>
					<select class="form-control" name="status">
						<option value="1" @if($pengaduan->status == '1') selected 
							@endif>Sedang Diproses</option>
						<option value="2" @if($pengaduan->status == '2') selected 
							@endif>Selesai</option>
					</select>
				</div>
			
				
			
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>