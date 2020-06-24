<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    // buat tanggapan
    public function add($id)
    {
        $pengaduan = \App\Pengaduan::find($id);

        return view('tanggapan/add', ['pengaduan' => $pengaduan]);
    }
    // tambah tanggapan
    public function create(Request $request)
    {
        $tanggapan = new \App\Tanggapan;

        $tanggapan->id_tanggapan = $request->id_tanggapan;
        $tanggapan->id_pengaduan = $request->id_pengaduan;
        $tanggapan->id_petugas = $request->id_petugas;
        $tanggapan->tgl_tanggapan = \Carbon\Carbon::now();
        $tanggapan->tanggapan = $request->tanggapan;

        $tanggapan->save();

        $pengaduan = \App\Pengaduan::find($request->id_pengaduan);

        $pengaduan->status = '1';

        $pengaduan->save();
        if ($pengaduan->user->level == '1') {
            return redirect('/pengaduanbarustaf')->with('sukses', ' Tanggapan Berhasil Di Tambahkan');
        }
        else {
            return redirect('/pengaduanbarusiswa')->with('sukses', ' Tanggapan Berhasil Di Tambahkan');
        }
    }
    // ====================Untuk Login Staf Atau Siswa====================
    // lihat pengaduan proses dan selesai
    public function lihat($id)
    {
        $tanggapan = \App\Tanggapan::find($id);

        return view('pengaduan/lihatpengaduan', ['tanggapan' => $tanggapan]);
    }
    // lihat pengaduan sedang diproses
    public function pengaduanproses()
    {
        $pengaduan = \App\Tanggapan::whereHas('pengaduan', function($query) {
            return $query->where('status', '=', '1')->where('id_user', '=', auth()->user()->id_user);
        })->get();

        return view('pengaduan/pengaduanproses', ['pengaduan' => $pengaduan]);
    }
    // lihat pengaduan selesai
    public function pengaduanselesai()
    {
        $pengaduan = \App\Tanggapan::whereHas('pengaduan', function($query) {
            return $query->where('status', '=', '2')->where('id_user', '=', auth()->user()->id_user);
        })->get();

        return view('pengaduan/pengaduanselesai', ['pengaduan' => $pengaduan]);
    }
    // =====================Untuk Login Admin Atau Petugas================
    // Staf
    // lihat pengaduan sedang diproses
    public function pengaduanprosesstaf()
    {
        $pengaduan = \App\Tanggapan::whereHas('pengaduan.user', function ($query) {
            $query->where('status', '=', '1')->where('level', '=', '1');
        })->get();

        return view('pengaduan/pengaduanproses', ['pengaduan' => $pengaduan]);
    }
    // lihat pengaduan selesai
    public function pengaduanselesaistaf()
    {
        $pengaduan = \App\Tanggapan::whereHas('pengaduan.user', function ($query) {
            $query->where('status', '=', '2')->where('level', '=', '1');
        })->get();

        return view('pengaduan/pengaduanselesai', ['pengaduan' => $pengaduan]);
    }

    // Siswa
    // lihat pengaduan sedang diproses
    public function pengaduanprosessiswa()
    {
        $pengaduan = \App\Tanggapan::whereHas('pengaduan.user', function ($query) {
            $query->where('status', '=', '1')->where('level', '=', '2');
        })->get();

        return view('pengaduan/pengaduanproses', ['pengaduan' => $pengaduan]);
    }
    // lihat pengaduan selesai
    public function pengaduanselesaisiswa()
    {
        $pengaduan = \App\Tanggapan::whereHas('pengaduan.user', function ($query) {
            $query->where('status', '=', '2')->where('level', '=', '2');
        })->get();

        return view('pengaduan/pengaduanselesai', ['pengaduan' => $pengaduan]);
    }
}
