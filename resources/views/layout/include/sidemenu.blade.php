<ul class="nav">
	<li><a href="/dashboard" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
	@if(auth()->user()->level == '0')
	<li><a href="/kelas" class=""><i class="fa fa-th-large"></i> Data Kelas</a></li>
	<li>
		<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="fa fa-users"></i> <span>Data User</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
		<div id="subPages" class="collapse ">
			<ul class="nav">
				<li><a href="/petugas"><i class="lnr lnr-users"></i> <span>Data Petugas</span></a></li>
				<li><a href="/staf"><i class="lnr lnr-user"></i> <span>Data Staf</span></a></li>
				<li><a href="/siswa"><i class="lnr lnr-user"></i> <span>Data Siswa</span></a></li>
			</ul>
		</div>
	</li>
	<li>
		<a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="fa fa-bullhorn"></i> <span>Pengaduan Staf</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
		<div id="subPages2" class="collapse ">
			<ul class="nav">
				<li><a href="/pengaduanbarustaf" class=""><i class="fa fa-bullhorn"></i> Pengaduan Baru</a></li>
				<li><a href="/pengaduanprosesstaf" class=""><i class="fa fa-gears"></i> Sedang Di Proses</a></li>
				<li><a href="/pengaduanselesaistaf" class=""><i class="fa fa-check"></i> Selesai</a></li>
			</ul>
		</div>
	</li>
	<li>
		<a href="#subPages3" data-toggle="collapse" class="collapsed"><i class="fa fa-bullhorn"></i> <span>Pengaduan Siswa</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
		<div id="subPages3" class="collapse ">
			<ul class="nav">
				<li><a href="/pengaduanbarusiswa" class=""><i class="fa fa-bullhorn"></i> Pengaduan Baru</a></li>
				<li><a href="/pengaduanprosessiswa" class=""><i class="fa fa-gears"></i> Sedang Di Proses</a></li>
				<li><a href="/pengaduanselesaisiswa" class=""><i class="fa fa-check"></i> Selesai</a></li>
			</ul>
		</div>
	</li>
	<li>
		<a href="#subPages4" data-toggle="collapse" class="collapsed"><i class="fa fa-cogs"></i> <span>Sistem Menu</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
		<div id="subPages4" class="collapse ">
			<ul class="nav">
				<li><a href="/laporan" class=""><i class="fa fa-print"></i> Generate Laporan</a></li>
				<li><a href="/profile" class=""><i class="fa fa-user"></i> Profile</a></li>
				<li><a href="/logout2" class=""><i class="fa fa-sign-out"></i> Logout</a></li>
			</ul>
		</div>
	</li>						
</ul>
@endif
@if(auth()->user()->level == '1' || auth()->user()->level == '2')
<li><a href="/buatpengaduan" class="active"><i class="lnr lnr-bullhorn"></i> <span>Buat Pengaduan</span></a></li>
<li>
	<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="fa fa-list"></i> <span>Pengaduan Saya</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
	<div id="subPages" class="collapse ">
		<ul class="nav">
			<li><a href="/pengaduanbaru" class=""><i class="fa fa-bullhorn"></i> Pengaduan Baru</a></li>
			<li><a href="/pengaduanproses" class=""><i class="fa fa-gears"></i> Sedang Di Proses</a></li>
			<li><a href="/pengaduanselesai" class=""><i class="fa fa-gears"></i> Selesai</a></li>
		</ul>
	</div>
</li>
<li>
	<a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="fa fa-cogs"></i> <span>Sistem Menu</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
	<div id="subPages2" class="collapse ">
		<ul class="nav">
			<li><a href="/profile" class="">Profile</a></li>
			<li><a href="/logout" class="">Logout</a></li>
		</ul>
	</div>
</li>						
</ul>
@endif
