<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    // hal view siswa
    public function index()
    {
    	$siswa = \App\Siswa::all();
    	$kelas = \App\Kelas::all();

    	return view('siswa.index', ['siswa' => $siswa, 'kelas' => $kelas]);
    }
    // tambah siswa
    public function create(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
        ]);
        
        $user = new \App\User;

        $user->id_user = $request->id_user;
        $user->username = $request->nama_lengkap;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if (isset($request->cek)) {
            $user->foto = 'avatar.png';
        }
        else {
            if ($request->hasFile('foto')) {
                $request->file('foto')->move('avatar/', $request->file('foto')->getClientOriginalName());

                $user->foto = $request->file('foto')->getClientOriginalName();
            }
            else {
                $user->foto = 'avatar.png';
            }
        }
        $user->telp = $request->telp;
        $user->level = '0';
        $user->save();

        $siswa = new \App\Siswa;
        $siswa->nis = $request->nis;
        $siswa->id_user = $request->id_user;
        $siswa->nama_lengkap = $request->nama_lengkap;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->jk = $request->jk;
        $siswa->alamat = $request->alamat;
        $siswa->save();

        return redirect('/siswa')->with('sukses', 'Data Berhasil Di Simpan');
    }
    // uv siswa
    public function uvedit($id)
    {
        $siswa = \App\Siswa::find($id);
        $kelas = \App\Kelas::all();

        return view('siswa/uvedit', ['siswa' => $siswa, 'kelas' => $kelas]);
    }
    // update siswa
    public function update(Request $request)
    {
        $siswa = \App\Siswa::find($request->nis);

        if ($request->email == $siswa->user->email) {
            $siswa->nama_lengkap = $request->nama_lengkap;
            $siswa->id_kelas = $request->id_kelas;
            $siswa->jk = $request->jk;
            $siswa->alamat = $request->alamat;
            $siswa->user->email = $request->email;
            $siswa->user->telp = $request->telp;
            if (isset($request->cek)) {
                if ($request->hasFile('foto')) {
                    $request->file('foto')->move('avatar/', $request->file('foto')->getClientOriginalName());

                    $siswa->user->foto = $request->file('foto')->getClientOriginalName();
                }
            }
            $siswa->user->save();
            $siswa->save();
        }
        else {
            $this->validate($request, [
                'email' => 'required|email|unique:users',
            ]);

            $siswa->nama_lengkap = $request->nama_lengkap;
            $siswa->jabatan = $request->jabatan;
            $siswa->id_kelas = $request->id_kelas;
            $siswa->jk = $request->jk;
            $siswa->alamat = $request->alamat;
            $siswa->user->email = $request->email;
            $siswa->user->telp = $request->telp;
            if (isset($request->cek)) {
                if ($request->hasFile('foto')) {
                    $request->file('foto')->move('avatar/', $request->file('foto')->getClientOriginalName());

                    $siswa->user->foto = $request->file('foto')->getClientOriginalName();
                }
            }
            $siswa->user->save();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses', 'Data Berhasil Di Ubah');
    }
    // uv pass siswa
    public function uvpass($id)
    {
        $user = \App\User::find($id);

        return view('siswa/uvpass', ['user' => $user]);
    }
    // pass update siswa
    public function passupdate(Request $request, $id)
    {
        $user = \App\User::find($id);
        $pass_lama = $request->pass_lama;

        if (Hash::check($pass_lama, $user->password)) {
            $user->password = bcrypt($request->pass_baru);
            $user->save();

            return redirect('/siswa')->with('sukses', 'Password Berhasil Di Ubah');
        }
        else {
            return redirect('/siswa')->with('gagal', 'Password Lama Salah');
        }
    }
    // delete siswa
    public function delete($id)
    {
        $siswa = \App\Siswa::find($id);

        $user = \App\User::find($siswa->id_user);
        $user->tanggapan()->delete();
        $user->pengaduan()->delete();
        $siswa->user()->delete();

        $siswa->delete();

        return redirect('/siswa')->with('sukses', 'Data Berhasil Di Hapus');
    }
}
