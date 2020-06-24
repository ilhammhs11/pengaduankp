<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    // menampilkan form pengaduan
    public function add()
    {
        return view('pengaduan/CR_pengaduan');
    }
    // tambah pengaduan
    public function create(Request $request)
    {
        $pengaduan = new \App\Pengaduan;

        $pengaduan->id_pengaduan = $request->id_pengaduan;
        $pengaduan->id_user = $request->id_user;
        $pengaduan->judul = $request->judul;
        $pengaduan->tgl_pengaduan = \Carbon\Carbon::now();
        $pengaduan->isi_laporan = $request->isi_laporan;
        $pengaduan->jenis = $request->jenis;
        $pengaduan->status = '0';

        if ($request->hasFile('foto')) {
            $request->file('foto')->move('foto/', $request->file('foto')->getClientOriginalName());

            $pengaduan->foto = $request->file('foto')->getClientOriginalName();
        }

        $pengaduan->save();
        return redirect('/buatpengaduan')->with('sukses', 'Data Berhasil Di Tambah');
    }
    // lihat pengaduan
    public function lihat($id)
    {
        $pengaduan = \App\Pengaduan::find($id);

        return view('pengaduan/lihat', ['pengaduan' => $pengaduan]);
    }
    // tampil pengaduan baru
    public function pengaduanbaru()
    {
        // jika login admin atau petugas
    	if (auth()->user()->level == '0') {
            // menampilkan seluruh data pengaduan baru dari user staf
    		$pengaduan = \App\Pengaduan::where('status', '0')->get();

    		return view('pengaduan/pengaduanbaru', ['pengaduan' => $pengaduan]);
    	}
        // jika login non admin atau bukan petugas
    	else {

    		$id_user = auth()->user()->id_user;
    		$pengaduan = \App\Pengaduan::where('id_user', $id_user)->where('status', '0')->get();

    		return view('pengaduan/pengaduanbaru', ['pengaduan' => $pengaduan]);
    	}
    }
    // uv pengaduan
    public function uvedit($id)
    {
        $pengaduan = \App\Pengaduan::find($id);

        return view('pengaduan/uvedit', ['pengaduan' => $pengaduan]);
    }
    // update pengaduan
    public function update(Request $request)
    {
        $pengaduan = \App\Pengaduan::find($request->id_pengaduan);

        $pengaduan->judul = $request->judul;
        $pengaduan->isi_laporan = $request->isi_laporan;

        if (isset($request->cek)) {
            if ($request->hasFile('foto')) {
                $request->file('foto')->move('foto/', $request->file('foto')->getClientOriginalName());

                $pengaduan->foto = $request->file('foto')->getClientOriginalName();
            }
        }

        $pengaduan->jenis = $request->jenis;
        $pengaduan->save();
        return redirect('/pengaduanbaru')->with('sukses', 'Data Berhasil Di Ubah');
    }

    // =====================Untuk Login Petugas atau Admin=================
    // menampilkan pengaduan baru user staf
    public function pengaduanbarustaf()
    {
        $pengaduan = \App\Pengaduan::where('status', '0')->whereHas('user', function($query){
            return $query->where('level', '=', '1');
        })->get();

        return view('pengaduan/pengaduanbaru', ['pengaduan' => $pengaduan])->with('judul', 'Pengaduan Baru Staf Keseluruhan');
    }
    // menampilkan pengaduan baru user siswa
    public function pengaduanbarusiswa()
    {
        $pengaduan = \App\Pengaduan::where('status', '0')->whereHas('user', function($query){
            return $query->where('level', '=', '2');
        })->get();

        return view('pengaduan/pengaduanbaru', ['pengaduan' => $pengaduan]);
    }
    // uv status pengaduan
    public function uveditstatus($id)
    {
        $pengaduan = \App\Pengaduan::find($id);

        return view('pengaduan/editstatus', ['pengaduan' => $pengaduan]);
    }
    // update status pengaduan
    public function updatestatus(Request $request)
    {
        $pengaduan = \App\Pengaduan::find($request->id_pengaduan);

        $pengaduan->status = $request->status;
        $pengaduan->save();

        if ($pengaduan->user->level == '1') {
           return redirect('/pengaduanprosesstaf')->with('sukses', 'Status Berhasil Di Ubah'); 
        }
        else {
            return redirect('/pengaduanprosessiswa')->with('sukses', 'Status Berhasil Di Ubah'); 
        }

    }
    // delete pengaduan
    public function delete($id)
    {
        $pengaduan = \App\Pengaduan::find($id);

        $pengaduan->delete();

        return redirect('/pengaduanbaru')->with('sukses', 'Data Berhasil Di Hapus');
    }
}
