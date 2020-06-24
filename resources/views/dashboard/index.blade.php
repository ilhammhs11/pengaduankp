@extends('layout.master')
@section('title')
	Dashboard
@endsection
@section('content')
	<center>
		<h1 style="margin-top: 15%; margin-bottom: -10px;">Selamat Datang Di</h1>
		<h3>Aplikasi Pengaduan Sekolah</h3>
		<hr width="50%">
		<label>{{auth()->user()->id_user}} - {{auth()->user()->username}}</label>
	</center>
@endsection
@section('footer')
@if(session('sukses'))
<script type="text/javascript">
	swal('Berhasil', '{{session("sukses")}}', 'success');
</script>
@endif
@endsection