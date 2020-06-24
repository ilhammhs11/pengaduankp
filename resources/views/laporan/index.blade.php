@extends('layout.master')
@section('title')
User
@endsection
@section('content')
<div class="container-fluid">
	<!-- OVERVIEW -->
	<div class="panel panel-headline">
		<div class="panel-heading">
			<h3 class="panel-title">Data User</h3>
			<div class="right">
				<i class="fa fa-users" style="font-size: 25px;"></i>
			</div>
		</div>
		
	</div>
	<!-- END OVERVIEW -->
	<div class="row">
		<div class="col-md-4">
			<!-- RECENT PURCHASES -->
			<div class="panel">
				<div class="panel-body no-padding">
					<div class="container-fluid" style="height: 130px; background-image: linear-gradient(45deg, #dd4b39 30%, #d33724 30%); color: white;">
						<div class="row">
							<div class="col-md-8">
								<h2>Data Petugas</h2>
								<hr>
								<label>Total - {{$petugas->count()}}</label>
							</div>
							<div class="col-md-2" style="text-align: center; padding: 20px;">
								<i class="fa fa-user" style="font-size: 75px;"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<a href="/laporan/petugas" target="_blank" class="btn btn-block btn-info"><i class="fa fa-print"></i> Cetak Laporan</a>
				</div>
			</div>
			<!-- END RECENT PURCHASES -->
		</div>
		<div class="col-md-4">
			<!-- RECENT PURCHASES -->
			<div class="panel">
				<div class="panel-body no-padding">
					<div class="container-fluid" style="height: 130px; background-image: linear-gradient(45deg, #00a65a 30%, #008548 30%); color: white;">
						<div class="row">
							<div class="col-md-8">
								<h2>Data Staf</h2>
								<hr>
								<label>Total - {{$staf->count()}}</label>
							</div>
							<div class="col-md-2" style="text-align: center; padding: 20px;">
								<i class="fa fa-user" style="font-size: 75px;"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<a href="/laporan/staf" target="_blank" class="btn btn-block btn-info"><i class="fa fa-print"></i> Cetak Laporan</a>
				</div>
			</div>
			<!-- END RECENT PURCHASES -->
		</div>
		<div class="col-md-4">
			<!-- RECENT PURCHASES -->
			<div class="panel">
				<div class="panel-body no-padding">
					<div class="container-fluid" style="height: 130px; background-image: linear-gradient(45deg, #00c0ef 30%, #009abf 30%); color: white;">
						<div class="row">
							<div class="col-md-8">
								<h2>Data Siswa</h2>
								<hr>
								<label>Total - {{$siswa->count()}}</label>
							</div>
							<div class="col-md-2" style="text-align: center; padding: 20px;">
								<i class="fa fa-user" style="font-size: 75px;"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<a href="/laporan/siswa" target="_blank" class="btn btn-block btn-info"><i class="fa fa-print"></i> Cetak Laporan</a>
				</div>
			</div>
			<!-- END RECENT PURCHASES -->
		</div>
	</div>


	<!-- OVERVIEW -->
	<div class="panel panel-headline">
		<div class="panel-heading">
			<h3 class="panel-title">Data Pengaduan Staf</h3>
			<div class="right">
				<i class="fa fa-bullhorn" style="font-size: 25px;"></i>
			</div>
		</div>
		
	</div>
	<!-- END OVERVIEW -->
	<div class="row">
		<div class="col-md-4">
			<!-- RECENT PURCHASES -->
			<div class="panel">
				<div class="panel-body no-padding">
					<div class="container-fluid" style="height: 200px; background-image: linear-gradient(20deg, #c27d0e 30%, #f39c12 30%); color: white;">
						<div class="row">
							<div class="col-md-8">
								<h2>Pengaduan Baru</h2>
								<hr>
								<label>Total - {{$pengaduanbarustaf->count()}}</label>
							</div>
							<div class="col-md-2" style="text-align: center; padding: 20px;">
								<i class="fa fa-bullhorn" style="font-size: 75px;"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<form action="/laporan/staf/baru" method="POST" role="form" target="_blank">
						{{csrf_field()}}
						<div class="form-group">
							<label for="">Dari</label>
							<input type="date" class="form-control" id="" placeholder="Input field" name="dari" required>
						</div>
						<div class="form-group">
							<label for="">Sampai</label>
							<input type="date" class="form-control" id="" placeholder="Input field" name="sampai" required>
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
						

						<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-print"></i> Cetak Laporan</button>
					</form>
					<br>
					<form action="/laporan/staf/baruseluruh" method="POST" role="form" target="_blank">
						{{csrf_field()}}
						<div class="form-group">
							<label>JENIS PENGADUAN</label>
							<select class="form-control" name="jenis">
								<option value="Keluhan Pembelajaran">Keluhan Pembelajaran</option>
								<option value="Keluhan Pelayanan Sekolah">Keluhan Pelayanan Sekolah</option>
								<option value="Keluhan Fasilitas Sekolah">Keluhan Fasilitas Sekolah</option>
								<option value="Tindakan Penindasan / Kekerasan">Tindakan Penindasan / Kekerasan</option>
							</select>
						</div>
					
						
					
						<button type="submit" class="btn btn-block btn-info"><i class="fa fa-print"></i> Cetak Laporan Keseluruhan</button>
					</form>
				</div>
			</div>
			<!-- END RECENT PURCHASES -->
		</div>
		<div class="col-md-4">
			<!-- RECENT PURCHASES -->
			<div class="panel">
				<div class="panel-body no-padding">
					<div class="container-fluid" style="height: 200px; background-image: linear-gradient(20deg, #009abf 30%, #00c0ef 30%); color: white;">
						<div class="row">
							<div class="col-md-8">
								<h2>Pengaduan Dalam Proses</h2>
								<hr>
								<label>Total - {{$pengaduanprosesstaf->count()}}</label>
							</div>
							<div class="col-md-2" style="text-align: center; padding: 20px;">
								<i class="fa fa-gears" style="font-size: 75px;"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<form action="/laporan/staf/proses" method="POST" role="form" target="_blank">
						{{csrf_field()}}
						<div class="form-group">
							<label for="">Dari</label>
							<input type="date" class="form-control" id="" placeholder="Input field" name="dari" required>
						</div>
						<div class="form-group">
							<label for="">Sampai</label>
							<input type="date" class="form-control" id="" placeholder="Input field" name="sampai" required>
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
						

						<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-print"></i> Cetak Laporan</button>
					</form>
					<br>
					<form action="/laporan/staf/prosesseluruh" method="POST" role="form" target="_blank">
						{{csrf_field()}}
						<div class="form-group">
							<label>JENIS PENGADUAN</label>
							<select class="form-control" name="jenis">
								<option value="Keluhan Pembelajaran">Keluhan Pembelajaran</option>
								<option value="Keluhan Pelayanan Sekolah">Keluhan Pelayanan Sekolah</option>
								<option value="Keluhan Fasilitas Sekolah">Keluhan Fasilitas Sekolah</option>
								<option value="Tindakan Penindasan / Kekerasan">Tindakan Penindasan / Kekerasan</option>
							</select>
						</div>
					
						
					
						<button type="submit" class="btn btn-block btn-info"><i class="fa fa-print"></i> Cetak Laporan Keseluruhan</button>
					</form>
				</div>
			</div>
			<!-- END RECENT PURCHASES -->
		</div>
		<div class="col-md-4">
			<!-- RECENT PURCHASES -->
			<div class="panel">
				<div class="panel-body no-padding">
					<div class="container-fluid" style="height: 200px; background-image: linear-gradient(20deg, #008548 30%, #00a65a 30%); color: white;">
						<div class="row">
							<div class="col-md-8">
								<h2>Pengaduan Selesai</h2>
								<hr>
								<label>Total - {{$pengaduanselesaistaf->count()}}</label>
							</div>
							<div class="col-md-2" style="text-align: center; padding: 20px;">
								<i class="fa fa-check" style="font-size: 75px;"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<form action="/laporan/staf/selesai" method="POST" role="form" target="_blank">
						{{csrf_field()}}
						<div class="form-group">
							<label for="">Dari</label>
							<input type="date" class="form-control" id="" placeholder="Input field" name="dari" required>
						</div>
						<div class="form-group">
							<label for="">Sampai</label>
							<input type="date" class="form-control" id="" placeholder="Input field" name="sampai" required>
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
						

						<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-print"></i> Cetak Laporan</button>
					</form>
					<br>
					<form action="/laporan/staf/selesaiseluruh" method="POST" role="form" target="_blank">
						{{csrf_field()}}
						<div class="form-group">
							<label>JENIS PENGADUAN</label>
							<select class="form-control" name="jenis">
								<option value="Keluhan Pembelajaran">Keluhan Pembelajaran</option>
								<option value="Keluhan Pelayanan Sekolah">Keluhan Pelayanan Sekolah</option>
								<option value="Keluhan Fasilitas Sekolah">Keluhan Fasilitas Sekolah</option>
								<option value="Tindakan Penindasan / Kekerasan">Tindakan Penindasan / Kekerasan</option>
							</select>
						</div>
					
						
					
						<button type="submit" class="btn btn-block btn-info"><i class="fa fa-print"></i> Cetak Laporan Keseluruhan</button>
					</form>
				</div>
			</div>
			<!-- END RECENT PURCHASES -->
		</div>
	</div>


	<!-- OVERVIEW -->
	<div class="panel panel-headline">
		<div class="panel-heading">
			<h3 class="panel-title">Data Pengaduan Siswa</h3>
			<div class="right">
				<i class="fa fa-bullhorn" style="font-size: 25px;"></i>
			</div>
		</div>
		
	</div>
	<!-- END OVERVIEW -->
	<div class="row">
		<div class="col-md-4">
			<!-- RECENT PURCHASES -->
			<div class="panel">
				<div class="panel-body no-padding">
					<div class="container-fluid" style="height: 200px; background-image: linear-gradient(20deg, #c27d0e 30%, #f39c12 30%); color: white;">
						<div class="row">
							<div class="col-md-8">
								<h2>Pengaduan Baru</h2>
								<hr>
								<label>Total - {{$pengaduanbarusiswa->count()}}</label>
							</div>
							<div class="col-md-2" style="text-align: center; padding: 20px;">
								<i class="fa fa-bullhorn" style="font-size: 75px;"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<form action="/laporan/siswa/baru" method="POST" role="form" target="_blank">
						{{csrf_field()}}
						<div class="form-group">
							<label for="">Dari</label>
							<input type="date" class="form-control" id="" placeholder="Input field" name="dari" required>
						</div>
						<div class="form-group">
							<label for="">Sampai</label>
							<input type="date" class="form-control" id="" placeholder="Input field" name="sampai" required>
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
						

						<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-print"></i> Cetak Laporan</button>
					</form>
					<br>
					<form action="/laporan/siswa/baruseluruh" method="POST" role="form" target="_blank">
						{{csrf_field()}}
						<div class="form-group">
							<label>JENIS PENGADUAN</label>
							<select class="form-control" name="jenis">
								<option value="Keluhan Pembelajaran">Keluhan Pembelajaran</option>
								<option value="Keluhan Pelayanan Sekolah">Keluhan Pelayanan Sekolah</option>
								<option value="Keluhan Fasilitas Sekolah">Keluhan Fasilitas Sekolah</option>
								<option value="Tindakan Penindasan / Kekerasan">Tindakan Penindasan / Kekerasan</option>
							</select>
						</div>
					
						
					
						<button type="submit" class="btn btn-block btn-info"><i class="fa fa-print"></i> Cetak Laporan Keseluruhan</button>
					</form>
				</div>
			</div>
			<!-- END RECENT PURCHASES -->
		</div>
		<div class="col-md-4">
			<!-- RECENT PURCHASES -->
			<div class="panel">
				<div class="panel-body no-padding">
					<div class="container-fluid" style="height: 200px; background-image: linear-gradient(20deg, #009abf 30%, #00c0ef 30%); color: white;">
						<div class="row">
							<div class="col-md-8">
								<h2>Pengaduan Dalam Proses</h2>
								<hr>
								<label>Total - {{$pengaduanprosessiswa->count()}}</label>
							</div>
							<div class="col-md-2" style="text-align: center; padding: 20px;">
								<i class="fa fa-gears" style="font-size: 75px;"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<form action="/laporan/siswa/proses" method="POST" role="form" target="_blank">
						{{csrf_field()}}
						<div class="form-group">
							<label for="">Dari</label>
							<input type="date" class="form-control" id="" placeholder="Input field" name="dari" required>
						</div>
						<div class="form-group">
							<label for="">Sampai</label>
							<input type="date" class="form-control" id="" placeholder="Input field" name="sampai" required>
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
						

						<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-print"></i> Cetak Laporan</button>
					</form>
					<br>
					<form action="/laporan/siswa/prosesseluruh" method="POST" role="form" target="_blank">
						{{csrf_field()}}
						<div class="form-group">
							<label>JENIS PENGADUAN</label>
							<select class="form-control" name="jenis">
								<option value="Keluhan Pembelajaran">Keluhan Pembelajaran</option>
								<option value="Keluhan Pelayanan Sekolah">Keluhan Pelayanan Sekolah</option>
								<option value="Keluhan Fasilitas Sekolah">Keluhan Fasilitas Sekolah</option>
								<option value="Tindakan Penindasan / Kekerasan">Tindakan Penindasan / Kekerasan</option>
							</select>
						</div>
					
						
					
						<button type="submit" class="btn btn-block btn-info"><i class="fa fa-print"></i> Cetak Laporan Keseluruhan</button>
					</form>
				</div>
			</div>
			<!-- END RECENT PURCHASES -->
		</div>
		<div class="col-md-4">
			<!-- RECENT PURCHASES -->
			<div class="panel">
				<div class="panel-body no-padding">
					<div class="container-fluid" style="height: 200px; background-image: linear-gradient(20deg, #008548 30%, #00a65a 30%); color: white;">
						<div class="row">
							<div class="col-md-8">
								<h2>Pengaduan Selesai</h2>
								<hr>
								<label>Total - {{$pengaduanselesaisiswa->count()}}</label>
							</div>
							<div class="col-md-2" style="text-align: center; padding: 20px;">
								<i class="fa fa-check" style="font-size: 75px;"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<form action="/laporan/siswa/selesai" method="POST" role="form" target="_blank">
						{{csrf_field()}}
						<div class="form-group">
							<label for="">Dari</label>
							<input type="date" class="form-control" id="" placeholder="Input field" name="dari" required>
						</div>
						<div class="form-group">
							<label for="">Sampai</label>
							<input type="date" class="form-control" id="" placeholder="Input field" name="sampai" required>
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
						

						<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-print"></i> Cetak Laporan</button>
					</form>
					<br>
					<form action="/laporan/siswa/selesaiseluruh" method="POST" role="form" target="_blank">
						{{csrf_field()}}
						<div class="form-group">
							<label>JENIS PENGADUAN</label>
							<select class="form-control" name="jenis">
								<option value="Keluhan Pembelajaran">Keluhan Pembelajaran</option>
								<option value="Keluhan Pelayanan Sekolah">Keluhan Pelayanan Sekolah</option>
								<option value="Keluhan Fasilitas Sekolah">Keluhan Fasilitas Sekolah</option>
								<option value="Tindakan Penindasan / Kekerasan">Tindakan Penindasan / Kekerasan</option>
							</select>
						</div>
					
						
					
						<button type="submit" class="btn btn-block btn-info"><i class="fa fa-print"></i> Cetak Laporan Keseluruhan</button>
					</form>
				</div>
			</div>
			<!-- END RECENT PURCHASES -->
		</div>
	</div>
</div>

@endsection
@section('footer')
@endsection