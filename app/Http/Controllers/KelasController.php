<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelasController extends Controller
{
    // lihat kelas
    public function index()
    {
    	$kelas = \App\Kelas::all();
    	$siswa = \App\Siswa::all();

    	return view('kelas.index', ['kelas' => $kelas, 'siswa' => $siswa]);
    }
    // tambah kelas
    public function create(Request $request)
    {
    	$kelas = new \App\Kelas;

    	$kelas->id_kelas = $request->id_kelas;
    	$kelas->nama_kelas = $request->nama_kelas;
    	$kelas->keterangan = $request->keterangan;

    	$kelas->save();

    	return redirect('/kelas')->with('sukses', 'Data Berhasil Di Tambah');
    }
    // uv kelas
    public function uvedit($id)
    {
    	$kelas = \App\Kelas::find($id);

    	return view('kelas/uvedit', ['kelas' => $kelas]);
    }
    // update kelas
    public function update(Request $request)
    {
    	$kelas = \App\Kelas::find($request->id_kelas);

    	$kelas->nama_kelas = $request->nama_kelas;
    	$kelas->keterangan = $request->keterangan;

    	$kelas->save();

    	return redirect('/kelas')->with('sukses', 'Data Berhasil Di Ubah');
    }
    // delete kelas
    public function delete($id)
    {
    	DeleteKelas($id);
    	$siswa = \App\Siswa::where('id_kelas', $id);
    	$siswa->delete();

    	$kelas = \App\Kelas::find($id);
    	$kelas->delete();

    	return redirect('/kelas')->with('sukses', 'Data Berhasil Di Hapus');
    }
}

