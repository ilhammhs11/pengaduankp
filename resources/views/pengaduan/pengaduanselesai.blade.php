@extends('layout.master')
@section('title')
Pengaduan Selesai
@endsection
@section('content')
<div class="container-fluid">
	<!-- OVERVIEW -->
	<div class="panel panel-headline">
		<div class="panel-heading">
			<h3 class="panel-title">Pengaduan Selesai</h3>
		</div>
	</div>
	<!-- END OVERVIEW -->
	<div class="row">
		<div class="col-md-12">
			<!-- RECENT PURCHASES -->
			<div class="panel">
				<div class="panel-heading">
					<div class="right">
						<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
						<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
					</div>
				</div>
				<div class="panel-body no-padding">
					<div class="container-fluid">
						<table class="table table-striped" id="dataTable">
							<thead>
								<tr>
									<th>ID PENGADUAN</th>
									<th>JENIS PENGADUAN</th>
									<th>JUDUL</th>
									<th>FOTO</th>
									<th>TANGGAL PENGADUAN</th>
									<th>TANGGAL TANGGAPAN</th>
									<th>STATUS</th>
									<th>ACTION</th>
								</tr>
							</thead>
							<tbody>
								@foreach($pengaduan as $row)
								<tr>
									<td>{{$row->id_pengaduan}}</td>
									<td>{{$row->pengaduan->jenis}}</td>
									<td>{{$row->pengaduan->judul}}</td>
									<td>
										<img src="{{$row->pengaduan->getFoto()}}" width="100px">
									</td>
									<td>{{$row->pengaduan->tgl_pengaduan}}</td>
									<td>{{$row->tgl_tanggapan}}</td>
									<td>
										<label class="label label-success">Selesai</label>
									</td>
									<td>
										<a class="btn btn-info lihat" data-toggle="modal" id="{{$row->id_tanggapan}}" href='#' data-target='lihat'>Lihat >></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-6"><span class="panel-note"><i class="fa fa-bookmark"></i> Data Pengaduan Selesai</span></div>
						<div class="col-md-6 text-right">
							<span class="panel-note"><i class="fa fa-bullhorn"></i> Total - {{$pengaduan->count()}}</span>
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
<div class="modal fade" id="lihat">

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
			url: "/pengaduan/"+id+"/editstatus",
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
					url: "/pengaduan/"+m+"/editstatus",
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
				url: "/pengaduan/"+id+"/lihatpengaduan",
				type: "GET",
				data : {id: id,},
				success: function (ajaxData){
					$("#lihat").html(ajaxData);
					$("#lihat").modal('show',{backdrop: 'true'});
				}
			});
		}

		$(document).ready(function (){
			/*$(".mapeledit").click(function (e){*/
				$("#dataTable").on("click",".lihat",function(){
					var m = $(this).attr("id");
					$.ajax({
						url: "/pengaduan/"+m+"/lihatpengaduan",
						type: "GET",
						data : {id: m,},
						success: function (ajaxData){
							$("#lihat").html(ajaxData);
							$("#lihat").modal('show',{backdrop: 'true'});
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