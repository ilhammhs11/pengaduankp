@extends('layout.master')
@section('title')
Petugas
@endsection
@section('content')
<div class="container-fluid">
	<!-- OVERVIEW -->
	<div class="panel panel-headline">
		<div class="panel-heading">
			<h3 class="panel-title">Data Petugas</h3>
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
									<th>ID PETUGAS</th>
									<th>ID USER</th>
									<th>USERNAME</th>
									<th>FOTO</th>
									<th>EMAIL</th>
									<th>TELP</th>
									<th>ACTION</th>
								</tr>
							</thead>
							<tbody>
								@foreach($petugas as $row)
								<tr>
									<td>{{$row->id_petugas}}</td>
									<td>{{$row->user->id_user}}</td>
									<td>{{$row->user->username}}</td>
									<td>
										<img src="{{$row->user->getAvatar()}}" width="100px">
									</td>
									<td>{{$row->user->email}}</td>
									<td>{{$row->user->telp}}</td>
									<td>
										<a class="btn btn-warning edit" data-toggle="modal" id="{{$row->id_petugas}}" href='#' data-target='edit'><i class="fa fa-edit"></i></a> <a class="btn btn-info editpass" data-toggle="modal" id="{{$row->id_user}}" href='#' data-target='editpass'><i class="fa fa-edit"></i> <i class="fa fa-lock"></i></a> <a class="btn btn-danger delete" id="{{$row->id_petugas}}"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-6"><span class="panel-note"><i class="fa fa-bookmark"></i> Data Petugas</span></div>
						<div class="col-md-6 text-right">
							<span class="panel-note"><i class="fa fa-users"></i> Total - {{$petugas->count()}}</span>
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
				<h4 class="modal-title">Tambah Data Petugas</h4>
			</div>
			<div class="modal-body">
				<form action="/petugas/create" method="POST" role="form" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group">
						<label for="">ID PETUGAS</label>
						<input type="text" class="form-control" id="" placeholder="Input field" value="{{autonumber('petugas', 'id_petugas', 3, 'PT')}}" name="id_petugas" readonly>
					</div>
					<div class="form-group">
						<label for="">ID USER</label>
						<input type="text" class="form-control" id="" placeholder="Input field" value="{{autonumber('users', 'id_user', 3, 'U')}}" name="id_user" readonly>
					</div>
					<div class="form-group">
						<label for="">NAMA LENGKAP</label>
						<input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap ..." required>
					</div>
					<div class="form-group">
						<label>JABATAN</label>
						<input type="text" name="jabatan" class="form-control" placeholder="Jabatan ..." required>
					</div>
					<div class="form-group">
						<label for="">EMAIL</label>
						<input type="email" class="form-control" name="email" placeholder="Email ..." required>
					</div>
					<div class="form-group">
						<label>PASSWORD</label>
						<input type="password" name="password" class="form-control" id="pass" placeholder="Password ..." required>
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
			url: "/petugas/"+id+"/edit", 
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
					url: "/petugas/"+m+"/edit",
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
				url: "/petugas/"+id+"/editpass",
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
						url: "/petugas/"+m+"/editpass",
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
					var id_petugas = $(this).attr("id");
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
							window.location="/petugas/"+id_petugas+"/delete";
						}
					});
				});
			});
		</script>
		@endsection