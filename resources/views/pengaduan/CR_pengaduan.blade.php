@extends('layout.master')
@section('title')
Buat Pengaduan
@endsection
@section('content')
<div class="container-fluid">
	<!-- OVERVIEW -->
	<div class="panel panel-headline">
		<div class="panel-heading">
			<h3 class="panel-title">Buat Pengaduan</h3>
		</div>
		
	</div>
	<!-- END OVERVIEW -->
	<div class="row">
		<div class="col-md-12">
			<!-- RECENT PURCHASES -->
			<div class="panel">
				<div class="panel-heading">
					
				</div>
				<div class="panel-body no-padding">
					<div class="container-fluid">
						<form action="/pengaduan/create" method="POST" role="form" enctype="multipart/form-data">
							{{csrf_field()}}
							<div class="form-group">
								<label for="">ID PENGADUAN</label>
								<input type="text" class="form-control" id="" placeholder="Input field" name="id_pengaduan" value="{{autonumber('pengaduan', 'id_pengaduan', 3, 'P')}}" readonly>
							</div>
							<div class="form-group">
								<label for="">ID USER</label>
								<input type="text" class="form-control" id="" placeholder="Input field" value="{{auth()->user()->id_user}}" name="id_user" readonly>
							</div>
							<div class="form-group">
								<label>JENIS PENGADUAN</label>
								<select class="form-control" name="jenis">
									<option value="Keluhan Pembelajaran">Keluhan Pembelajaran</option>
									<option value="Keluhan Pelayanan Sekolah">Keluhan Pelayanan Sekolah</option>
									<option value="Keluhan Fasilitas Sekolah">Keluhan Fasilitas Sekolah</option>
									<option value="Tindakan Penindasan / Kekerasan">Tindakan Penindasan / Kekerasan</option>
								</select>
							</div>
							<div class="form-group">
								<label for="">JUDUL</label>
								<input type="text" name="judul" class="form-control" id="" placeholder="Judul ..." required autofocus>
							</div>
							<div class="form-group">
								<label for="">ISI LAPORAN</label>
								<textarea class="form-control" name="isi_laporan" required></textarea>
							</div>
							<div class="form-group">
								<label for="">FOTO</label>
								<input type="file" class="form-control" name="foto" required>
							</div>

							
						</div>
					</div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-md-6"><span class="panel-note"><i class="fa fa-bookmark"></i> Form Pengaduan</span></div>
							<div class="col-md-6 text-right">
								<button type="submit" class="btn btn-primary">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- END RECENT PURCHASES -->
		</div>
		
	</div>

</div>

<div class="modal fade" id="edit">

</div>
<div class="modal fade" id="editpass">

</div>
@endsection
@section('footer')
@if(session('sukses'))
<script type="text/javascript">
	swal('Berhasil', '{{session("sukses")}}', 'success');
</script>
@endif
@if(session('gagal'))
<script type="text/javascript">
	swal('Gagal', '{{session("gagal")}}', 'error');
</script>
@endif
<script type="text/javascript">
	function getUpdate(id){
		var id = id;
		$.ajax({
			url: "/user/"+id+"/edit",
			type: "GET",
			data : {id: id,},
			success: function (ajaxData){
				$("#edit").html(ajaxData);
				$("#edit").modal('show',{backdrop: 'true'});
			}
		});
	}

	$(document).ready(function (){
		/*$(".mapeledit").click(function (e){*/
			$("#dataTable").on("click",".edit",function(){
				var m = $(this).attr("id");
				$.ajax({
					url: "/user/"+m+"/edit",
					type: "GET",
					data : {id: m,},
					success: function (ajaxData){
						$("#edit").html(ajaxData);
						$("#edit").modal('show',{backdrop: 'true'});
					}
				});
			});
		});
	</script>
	<script type="text/javascript">
		function getUpdate(id){
			var id = id;
			$.ajax({
				url: "/user/"+id+"/editpass",
				type: "GET",
				data : {id: id,},
				success: function (ajaxData){
					$("#editpass").html(ajaxData);
					$("#editpass").modal('show',{backdrop: 'true'});
				}
			});
		}

		$(document).ready(function (){
			/*$(".mapeledit").click(function (e){*/
				$("#dataTable").on("click",".editpass",function(){
					var m = $(this).attr("id");
					$.ajax({
						url: "/user/"+m+"/editpass",
						type: "GET",
						data : {id: m,},
						success: function (ajaxData){
							$("#editpass").html(ajaxData);
							$("#editpass").modal('show',{backdrop: 'true'});
						}
					});
				});
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#dataTable").on("click",".delete", function(){
					var id_user = $(this).attr("id");
					swal({
						title: "Yakin",
						text: "Akan Di Hapus??",
						icon: "warning",
						buttons: true,
						dangerMode: true,
					})
					.then((willDelete)=>{
						console.log(willDelete);
						if (willDelete) {
							window.location="/user/"+id_user+"/delete";
						}
					});
				});
			});
		</script>
		@endsection