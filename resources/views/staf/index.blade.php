@extends('layout.master')
@section('title')
Staf
@endsection
@section('content')
<div class="container-fluid">
	<!-- OVERVIEW -->
	<div class="panel panel-headline">
		<div class="panel-heading">
			<h3 class="panel-title">Data Staf</h3>
			<div class="right">
				<a class="btn btn-primary" data-toggle="modal" href='#modal-id'><i class="fa fa-plus"></i> Tambah</a>
			</div>
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
									<th>ID STAF</th>
									<th>ID USER</th>
									<th>FOTO</th>
									<th>NAMA LENGKAP</th>
									<th>EMAIL</th>
									<th>BAGIAN</th>
									<th>ACTION</th>
								</tr>
							</thead>
							<tbody>
								@foreach($staf as $row)
								<tr>
									<td>{{$row->id_staf}}</td>
									<td>{{$row->id_user}}</td>
									<td>
										<img src="{{$row->user->getAvatar()}}" width="100px">
									</td>
									<td>{{$row->nama_lengkap}}</td>
									<td>{{$row->user->email}}</td>
									<td>{{$row->bagian}}</td>
									<td>
										<a class="btn btn-warning edit" data-toggle="modal" id="{{$row->id_staf}}" href='#' data-target='edit'><i class="fa fa-edit"></i></a> <a class="btn btn-info editpass" data-toggle="modal" id="{{$row->id_user}}" href='#' data-target='editpass'><i class="fa fa-edit"></i> <i class="fa fa-lock"></i></a> <a class="btn btn-danger delete" id="{{$row->id_staf}}"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-6"><span class="panel-note"><i class="fa fa-bookmark"></i> Data Staf</span></div>
						<div class="col-md-6 text-right">
							<span class="panel-note"><i class="fa fa-users"></i> Total - {{$staf->count()}}</span>
						</div>
					</div>
				</div>
			</div>
			<!-- END RECENT PURCHASES -->
		</div>
		
	</div>

</div>
<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Data Staf</h4>
			</div>
			<div class="modal-body">
				<form action="/staf/create" method="POST" role="form" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group">
						<label for="">ID STAF</label>
						<input type="text" class="form-control" id="" placeholder="Input field" value="{{autonumber('staf', 'id_staf', 3, 'S')}}" readonly name="id_staf">
					</div>
					<div class="form-group">
						<label>ID USER</label>
						<input type="text" name="id_user" class="form-control" value="{{autonumber('users', 'id_user', 3, 'U')}}" readonly>
					</div>
					<div class="form-group">
						<label>NAMA LENGKAP</label>
						<input type="text" name="nama_lengkap" placeholder="Nama Lengkap ..." class="form-control" required>
					</div>
					<div class="form-group">
						<label>BAGIAN</label>
						<input type="text" name="bagian" placeholder="Bagian ..." class="form-control" required>
					</div>
					<div class="form-group">
						<label>EMAIL</label>
						<input type="email" name="email" class="form-control" placeholder="Email ..." required>
					</div>
					<div class="form-group">
						<label>PASSWORD</label>
						<input type="password" name="password" class="form-control" placeholder="Password ..." id="pass" required>
					</div>
					<div class="form-group">
						<input type="checkbox" onclick="ShowPass()">
						<label>Show Password</label>
					</div>
					<div class="form-group">
						<label>NOMOR TELEPON</label>
						<input type="text" name="telp" class="form-control" placeholder="Nomor Telepon ..." required>
					</div>
					<div class="form-group">
						<label for="">FOTO</label>
						<input type="file" class="form-control" name="foto">
					</div>
					<div class="form-group">
						<input type="checkbox" name="cek" value="cek">
						<label>Ceklis Jika Tidak Ada</label>
					</div>

					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="edit">

</div>
<div class="modal fade" id="editpass">

</div>
@endsection
@section('footer')
<script>
	function ShowPass() {
		var x = document.getElementById('pass');
		if (x.type === "password") {
			x.type = "text";
		}
		else{
			x.type = "password";
		}
	}
</script>
<script type="text/javascript">
	function ShowPass2() {
		var x = document.getElementById('x');
		var y = document.getElementById('y');

		if (x.type === 'password' && y.type === 'password') {
			x.type = 'text';
			y.type = 'text';
		}
		else {
			x.type = 'password';
			y.type = 'password';
		}
	}
</script>
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
			url: "/staf/"+id+"/edit",
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
					url: "/staf/"+m+"/edit",
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
				url: "/staf/"+id+"/editpass",
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
						url: "/staf/"+m+"/editpass",
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
					var id_staf = $(this).attr("id");
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
							window.location="/staf/"+id_staf+"/delete";
						}
					});
				});
			});
		</script>
		@endsection