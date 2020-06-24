@extends('layout.master')
@section('title')
Pengaduan Baru
@endsection
@section('content')
<div class="container-fluid">
	<!-- OVERVIEW -->
	<div class="panel panel-headline">
		<div class="panel-heading">
			<h3 class="panel-title">Pengaduan Baru</h3>
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
									<th>STATUS</th>
									<th>ACTION</th>
								</tr>
							</thead>
							<tbody>
								@foreach($pengaduan as $row)
								<tr>
									<td>{{$row->id_pengaduan}}</td>
									<td>{{$row->jenis}}</td>
									<td>{{$row->judul}}</td>
									<td>
										<img src="{{$row->getFoto()}}" width="100px">
									</td>
									<td>{{$row->tgl_pengaduan}}</td>
									<td>
										<label class="label label-warning">Baru</label>
									</td>
									<td>
										<a class="btn btn-info lihat" data-toggle="modal" id="{{$row->id_pengaduan}}" href='#' data-target='lihat'>Lihat >></a>
										@if(auth()->user()->level == '1' || auth()->user()->level == '2')
										<a class="btn btn-warning edit" data-toggle="modal" id="{{$row->id_pengaduan}}" href='#' data-target='edit'><i class="fa fa-edit"></i></a> <a class="btn btn-danger delete" id="{{$row->id_pengaduan}}"><i class="fa fa-trash"></i></a>
										@endif
										@if(auth()->user()->level == '0')
											<a class="btn btn-primary tambah" data-toggle="modal" id="{{$row->id_pengaduan}}" href='#' data-target='edit'><i class="fa fa-comments-o"></i></a>
										@endif
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-6"><span class="panel-note"><i class="fa fa-bookmark"></i> Data Pengaduan Baru</span></div>
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

<div class="modal fade" id="tambah">

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
			url: "/pengaduan/"+id+"/edit",
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
					url: "/pengaduan/"+m+"/edit",
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
			url: "/tanggapan/"+id+"/add",
			type: "GET",
			data : {id: id,},
			success: function (ajaxData){
				$("#tambah").html(ajaxData);
				$("#tambah").modal('show',{backdrop: 'true'});
			}
		});
	}

	$(document).ready(function (){
		/*$(".mapeledit").click(function (e){*/
			$("#dataTable").on("click",".tambah",function(){
				var m = $(this).attr("id");
				$.ajax({
					url: "/tanggapan/"+m+"/add",
					type: "GET",
					data : {id: m,},
					success: function (ajaxData){
						$("#tambah").html(ajaxData);
						$("#tambah").modal('show',{backdrop: 'true'});
					}
				});
			});
		});
	</script>
	<script type="text/javascript">
		function getUpdate(id){
			var id = id;
			$.ajax({
				url: "/pengaduan/"+id+"/lihat",
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
						url: "/pengaduan/"+m+"/lihat",
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
					var id_pengaduan = $(this).attr("id");
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
							window.location="/pengaduan/"+id_pengaduan+"/delete";
						}
					});
				});
			});
		</script>
		@endsection