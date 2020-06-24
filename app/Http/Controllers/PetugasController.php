<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    // hal view petugas
    public function index()
    {
    	$petugas = \App\Petugas::all();

    	return view('petugas.index', ['petugas' => $petugas]);
    }
    // tambah petugas
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

        $petugas = new \App\Petugas;
        $petugas->id_petugas = $request->id_petugas;
        $petugas->id_user = $request->id_user;
        $petugas->nama_lengkap = $request->nama_lengkap;
        $petugas->jabatan = $request->jabatan;
        $petugas->save();

        return redirect('/petugas')->with('sukses', 'Data Berhasil Di Simpan');
    }
    // uv petugas
    public function uvedit($id)
    {
        $petugas = \App\Petugas::find($id);

        return view('petugas/uvedit', ['petugas' => $petugas]);
    }
    // update petugas
    public function update(Request $request)
    {
        $petugas = \App\Petugas::find($request->id_petugas);

        if ($request->email == $petugas->user->email) {
            $petugas->nama_lengkap = $request->nama_lengkap;
            $petugas->jabatan = $request->jabatan;
            $petugas->user->email = $request->email;
            $petugas->user->telp = $request->telp;
            if (isset($request->cek)) {
                if ($request->hasFile('foto')) {
                    $request->file('foto')->move('avatar/', $request->file('foto')->getClientOriginalName());

                    $petugas->user->foto = $request->file('foto')->getClientOriginalName();
                }
            }
            $petugas->user->save();
            $petugas->save();
        }
        else {
            $this->validate($request, [
                'email' => 'required|email|unique:users',
            ]);

            $petugas->nama_lengkap = $request->nama_lengkap;
            $petugas->jabatan = $request->jabatan;
            $petugas->user->email = $request->email;
            $petugas->user->telp = $request->telp;
            if (isset($request->cek)) {
                if ($request->hasFile('foto')) {
                    $request->file('foto')->move('avatar/', $request->file('foto')->getClientOriginalName());

                    $petugas->user->foto = $request->file('foto')->getClientOriginalName();
                }
            }
            $petugas->user->save();
            $petugas->save();
        }
        return redirect('/petugas')->with('sukses', 'Data Berhasil Di Ubah');
    }
    // uv pass petugas
    public function uvpass($id)
    {
        $user = \App\User::find($id);

        return view('petugas/uvpass', ['user' => $user]);
    }
    // pass update petugas
    public function passupdate(Request $request, $id)
    {
        $user = \App\User::find($id);
        $pass_lama = $request->pass_lama;

        if (Hash::check($pass_lama, $user->password)) {
            $user->password = bcrypt($request->pass_baru);
            $user->save();

            return redirect('/petugas')->with('sukses', 'Password Berhasil Di Ubah');
        }
        else {
            return redirect('/petugas')->with('gagal', 'Password Lama Salah');
        }
    }
    // delete petugas
    public function delete($id)
    {
        $petugas = \App\Petugas::find($id);

        $petugas->tanggapan()->delete();
        $petugas->user()->delete();

        $petugas->delete();

        return redirect('/petugas')->with('sukses', 'Data Berhasil Di Hapus');
    }
}
