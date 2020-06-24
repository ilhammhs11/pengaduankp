<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // Tampil Halaman Cetak Laporan
	public function index()
	{
		$petugas = \App\Petugas::all();
		$staf = \App\Staf::all();
		$siswa = \App\Siswa::all();

		// Staf
		$pengaduanbarustaf = \App\Pengaduan::where('status', '0')->whereHas('user', function($query){
			return $query->where('level', '=', '1');
		})->get();
		$pengaduanprosesstaf = \App\Tanggapan::whereHas('pengaduan.user', function ($query) {
			$query->where('status', '=', '1')->where('level', '=', '1');
		})->get();
		$pengaduanselesaistaf = \App\Tanggapan::whereHas('pengaduan.user', function ($query) {
			$query->where('status', '=', '2')->where('level', '=', '1');
		})->get();


		// Siswa
		$pengaduanbarusiswa = \App\Pengaduan::where('status', '0')->whereHas('user', function($query){
			return $query->where('level', '=', '2');
		})->get();
		$pengaduanprosessiswa = \App\Tanggapan::whereHas('pengaduan.user', function ($query) {
            $query->where('status', '=', '1')->where('level', '=', '2');
        })->get();
		$pengaduanselesaisiswa = \App\Tanggapan::whereHas('pengaduan.user', function ($query) {
            $query->where('status', '=', '2')->where('level', '=', '2');
        })->get();


		return view('laporan.index', ['petugas' => $petugas, 'staf' => $staf, 'siswa' => $siswa, 'pengaduanbarustaf' => $pengaduanbarustaf, 'pengaduanprosesstaf' => $pengaduanprosesstaf, 'pengaduanselesaistaf' => $pengaduanselesaistaf, 'pengaduanbarusiswa' => $pengaduanbarusiswa, 'pengaduanprosessiswa' => $pengaduanprosessiswa, 'pengaduanselesaisiswa' => $pengaduanselesaisiswa]);
	}

	// Cetak User
	// Petugas
	public function petugas()
	{
		$petugas = \App\Petugas::all();

    	return view('laporan/petugas', ['petugas' => $petugas]);
	}

	// Staf
	public function Staf()
	{
		$staf = \App\Staf::all();

    	return view('laporan/staf', ['staf' => $staf]);
	}

	// Siswa
	public function Siswa()
	{
		$siswa = \App\Siswa::all();

    	return view('laporan/siswa', ['siswa' => $siswa]);
	}

	// Cetak Pengaduan Keseluruhan
	// Staf
	// Pengaduan Baru
	public function stafbaruseluruh(Request $request)
	{
		$title = 'Pengaduan Baru Staf Keseluruhan';
		$judul = 'PENGADUAN BARU STAF KESELURUHAN '.strtoupper($request->jenis);
		$jenis = $request->jenis;

		$pengaduan = \App\Pengaduan::where('status', '0')->whereHas('user', function($query) use ($jenis){
            return $query->where('level', '=', '1')->where('jenis', '=', $jenis);
        })->get();

        return view('laporan/pengaduanbaruseluruh', ['pengaduan' => $pengaduan, 'title' => $title, 'judul' => $judul]);
	}
	// Pengaduan Proses
	public function stafprosesseluruh(Request $request)
	{
		$title = 'Pengaduan Dalam Proses Staf Keseluruhan';
		$judul = 'PENGADUAN DALAM PROSES STAF KESELURUHAN '.strtoupper($request->jenis);
		$jenis = $request->jenis;

		$pengaduan = \App\Tanggapan::whereHas('pengaduan.user', function ($query) use ($jenis) {
            $query->where('status', '=', '1')->where('jenis', '=', $jenis)->where('level', '=', '1');
        })->get();

        return view('laporan/pengaduanprosesseluruh', ['pengaduan' => $pengaduan, 'title' => $title, 'judul' => $judul]);
	}
	// Pengaduan Selesai
	public function stafselesaiseluruh(Request $request)
	{
		$title = 'Pengaduan Selesai Staf Keseluruhan';
		$judul = 'PENGADUAN SELESAI STAF KESELURUHAN '.strtoupper($request->jenis);
		$jenis  = $request->jenis;

		$pengaduan = \App\Tanggapan::whereHas('pengaduan.user', function ($query) use ($jenis) {
            $query->where('status', '=', '2')->where('jenis', '=', $jenis)->where('level', '=', '1');
        })->get();

        return view('laporan/pengaduanselesaiseluruh', ['pengaduan' => $pengaduan, 'title' => $title, 'judul' => $judul]);
	}

	// Siswa
	// Pengaduan Baru
	public function siswabaruseluruh(Request $request)
	{
		$title = 'Pengaduan Baru Siswa Keseluruhan';
		$judul = 'PENGADUAN BARU SISWA KESELURUHAN '.strtoupper($request->jenis);
		$jenis = $request->jenis;

		$pengaduan = \App\Pengaduan::where('status', '0')->whereHas('user', function($query) use ($jenis) {
            return $query->where('level', '=', '2')->where('jenis', '=', $jenis);
        })->get();

        return view('laporan/pengaduanbaruseluruh', ['pengaduan' => $pengaduan, 'title' => $title, 'judul' => $judul]);
	}
	// Pengaduan Proses
	public function siswaprosesseluruh(Request $request)
	{
		$title = 'Pengaduan Dalam Proses Siswa Keseluruhan';
		$judul = 'PENGADUAN DALAM PROSES SISWA KESELURUHAN '.strtoupper($request->jenis);
		$jenis = $request->jenis;

		$pengaduan = \App\Tanggapan::whereHas('pengaduan.user', function ($query) use ($jenis) {
            $query->where('status', '=', '1')->where('jenis', '=', $jenis)->where('level', '=', '2');
        })->get();

        return view('laporan/pengaduanprosesseluruh', ['pengaduan' => $pengaduan, 'title' => $title, 'judul' => $judul]);
	}
	// Pengaduan Selesai
	public function siswaselesaiseluruh(Request $request)
	{
		$title = 'Pengaduan Selesai Siswa Keseluruhan';
		$judul = 'PENGADUAN SELESAI SISWA KESELURUHAN '.strtoupper($request->jenis);
		$jenis = $request->jenis;

		$pengaduan = \App\Tanggapan::whereHas('pengaduan.user', function ($query) use ($jenis) {
            $query->where('status', '=', '2')->where('jenis', '=', $jenis)->where('level', '=', '2');
        })->get();

        return view('laporan/pengaduanselesaiseluruh', ['pengaduan' => $pengaduan, 'title' => $title, 'judul' => $judul]);
	}


	// Cetak Pengaduan Per Tanggal Pengaduan
	// Staf
	// Pengaduan Baru
	public function stafbaru(Request $request)
	{
		$title = 'Pengaduan Baru Staf';
		$judul = 'PENGADUAN BARU STAF '.strtoupper($request->jenis);

		$dari = $request->dari;
		$sampai = $request->sampai;

		$jenis = $request->jenis;

		$pengaduan = \App\Pengaduan::where('status', '0')->whereBetween('tgl_pengaduan', [$dari, $sampai])->where('jenis', '=', $jenis)->whereHas('user', function($query){
            return $query->where('level', '=', '1');
        })->get();

        return view('laporan/pengaduanbaru', ['pengaduan' => $pengaduan, 'title' => $title, 'judul' => $judul, 'dari' => $dari, 'sampai' => $sampai]);
	}
	// Pengaduan Proses
	public function stafproses(Request $request)
	{
		$title = 'Pengaduan Dalam Proses Staf';
		$judul = 'PENGADUAN DALAM PROSES STAF '.strtoupper($request->jenis);

		$dari = $request->dari;
		$sampai = $request->sampai;
		$jenis = $request->jenis;

		$pengaduan = \App\Tanggapan::whereHas('pengaduan.user', function ($query) use ($dari, $sampai, $jenis) {

            $query->whereBetween('tgl_pengaduan', [$dari, $sampai])->where('status', '=', '1')->where('jenis', '=', $jenis)->where('level', '=', '1');
        })->get();

        return view('laporan/pengaduanproses', ['pengaduan' => $pengaduan, 'title' => $title, 'judul' => $judul, 'dari' => $dari, 'sampai' => $sampai]);
	}
	// Pengaduan Selesai
	public function stafselesai(Request $request)
	{
		$title = 'Pengaduan Selesai Staf';
		$judul = 'PENGADUAN SELESAI STAF '.strtoupper($request->jenis);

		$dari = $request->dari;
		$sampai = $request->sampai;
		$jenis = $request->jenis;

		$pengaduan = \App\Tanggapan::whereHas('pengaduan.user', function ($query) use ($dari, $sampai, $jenis) {

            $query->whereBetween('tgl_pengaduan', [$dari, $sampai])->where('status', '=', '2')->where('jenis', '=', $jenis)->where('level', '=', '1');
        })->get();

        return view('laporan/pengaduanselesai', ['pengaduan' => $pengaduan, 'title' => $title, 'judul' => $judul, 'dari' => $dari, 'sampai' => $sampai]);
	}

	// Siswa
	// Pengaduan Baru
	public function siswabaru(Request $request)
	{
		$title = 'Pengaduan Baru Siswa';
		$judul = 'PENGADUAN BARU SISWA '.strtoupper($request->jenis);

		$dari = $request->dari;
		$sampai = $request->sampai;
		$jenis = $request->jenis;

		$pengaduan = \App\Pengaduan::where('status', '0')->whereBetween('tgl_pengaduan', [$dari, $sampai])->where('jenis', '=', $jenis)->whereHas('user', function($query){
            return $query->where('level', '=', '2');
        })->get();

        return view('laporan/pengaduanbaru', ['pengaduan' => $pengaduan, 'title' => $title, 'judul' => $judul, 'dari' => $dari, 'sampai' => $sampai]);
	}
	// Pengaduan Proses
	public function siswaproses(Request $request)
	{
		$title = 'Pengaduan Dalam Proses Siswa';
		$judul = 'PENGADUAN DALAM PROSES SISWA '.strtoupper($request->jenis);

		$dari = $request->dari;
		$sampai = $request->sampai;
		$jenis = $request->jenis;

		$pengaduan = \App\Tanggapan::whereHas('pengaduan.user', function ($query) use ($dari, $sampai, $jenis) {

            $query->whereBetween('tgl_pengaduan', [$dari, $sampai])->where('status', '=', '1')->where('jenis', '=', $jenis)->where('level', '=', '2');
        })->get();

        return view('laporan/pengaduanproses', ['pengaduan' => $pengaduan, 'title' => $title, 'judul' => $judul, 'dari' => $dari, 'sampai' => $sampai]);
	}
	// Pengaduan Selesai
	public function siswaselesai(Request $request)
	{
		$title = 'Pengaduan Selesai Siswa';
		$judul = 'PENGADUAN SELESAI SISWA '.strtoupper($request->jenis);

		$dari = $request->dari;
		$sampai = $request->sampai;
		$jenis = $request->jenis;

		$pengaduan = \App\Tanggapan::whereHas('pengaduan.user', function ($query) use ($dari, $sampai, $jenis) {

            $query->whereBetween('tgl_pengaduan', [$dari, $sampai])->where('status', '=', '2')->where('jenis', '=', $jenis)->where('level', '=', '2');
        })->get();

        return view('laporan/pengaduanselesai', ['pengaduan' => $pengaduan, 'title' => $title, 'judul' => $judul, 'dari' => $dari, 'sampai' => $sampai]);
	}

}
