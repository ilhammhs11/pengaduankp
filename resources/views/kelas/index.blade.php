@extends('layout.master')
@section('title')
Kelas
@endsection
@section('content')
<div class="container-fluid">
	<!-- OVERVIEW -->
	<div class="panel panel-headline">
		<div class="panel-heading">
			<h3 class="panel-title">Data Kelas</h3>
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
									<th>ID KELAS</th>
									<th>NAMA KELAS</th>
									<th>KETERANGAN</th>
									<th>JUMLAH SISWA</th>
									<th>ACTION</th>
								</tr>
							</thead>
							<tbody>
								@foreach($kelas as $row)
								<tr>
									<td>{{$row->id_kelas}}</td>
									<td>{{$row->nama_kelas}}</td>
									<td>{{$row->keterangan}}</td>
									<td>{{$siswa->where('id_kelas', $row->id_kelas)->count()}} Orang</td>
									<td>
										<a class="btn btn-warning edit" data-toggle="modal" id="{{$row->id_kelas}}" href='#' data-target='edit'><i class="fa fa-edit"></i></a> <a class="btn btn-danger delete" id="{{$row->id_kelas}}"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-6"><span class="panel-note"><i class="fa fa-bookmark"></i> Data Kelas</span></div>
						<div class="col-md-6 text-right">
							<span class="panel-note"><i class="fa fa-th-large"></i> Total - {{$kelas->count()}}</span>
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
				<h4 class="modal-title">Tambah Data Kelas</h4>
			</div>
			<div class="modal-body">
				<form action="/kelas/create" method="POST" role="form">
					{{csrf_field()}}
					<div class="form-group">
						<label for="">ID KELAS</label>
						<input type="text" class="form-control" id="" placeholder="Input field" value="{{autonumber('kelas', 'id_kelas', 3, 'K')}}" readonly name="id_kelas">
					</div>
					<div class="form-group">
						<label>NAMA KELAS</label>
						<input type="text" name="nama_kelas" class="form-control" placeholder="Nama Kelas ..." required>
					</div>
					<div class="form-group">
						<label>KETERANGAN</label>
						<textarea class="form-control" name="keterangan" required></textarea>
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
			url: "/kelas/"+id+"/edit",
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
					url: "/kelas/"+m+"/edit",
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
		$(document).ready(function(){
			$("#dataTable").on("click",".delete", function(){
				var id_kelas = $(this).attr("id");
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
						window.location="/kelas/"+id_kelas+"/delete";
					}
				});
			});
		});
	</script>
	@endsection