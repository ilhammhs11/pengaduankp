<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;

class StafController extends Controller
{
	// hal view staf
    public function index()
    {
    	$staf = \App\Staf::all();

    	return view('staf.index', ['staf' => $staf]);
    }
    // tambah staf
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

        $staf = new \App\Staf;
        $staf->id_staf = $request->id_staf;
        $staf->id_user = $request->id_user;
        $staf->nama_lengkap = $request->nama_lengkap;
        $staf->bagian = $request->bagian;
        $staf->save();

        return redirect('/staf')->with('sukses', 'Data Berhasil Di Simpan');
    }
    // uv staf
    public function uvedit($id)
    {
        $staf = \App\Staf::find($id);

        return view('staf/uvedit', ['staf' => $staf]);
    }
    // update staf
    public function update(Request $request)
    {
        $staf = \App\Staf::find($request->id_staf);

        if ($request->email == $staf->user->email) {
            $staf->nama_lengkap = $request->nama_lengkap;
            $staf->bagian = $request->bagian;
            $staf->user->email = $request->email;
            $staf->user->telp = $request->telp;
            if (isset($request->cek)) {
                if ($request->hasFile('foto')) {
                    $request->file('foto')->move('avatar/', $request->file('foto')->getClientOriginalName());

                    $staf->user->foto = $request->file('foto')->getClientOriginalName();
                }
            }
            $staf->user->save();
            $staf->save();
        }
        else {
            $this->validate($request, [
                'email' => 'required|email|unique:users',
            ]);

            $staf->nama_lengkap = $request->nama_lengkap;
            $staf->bagian = $request->bagian;
            $staf->user->email = $request->email;
            $staf->user->telp = $request->telp;
            if (isset($request->cek)) {
                if ($request->hasFile('foto')) {
                    $request->file('foto')->move('avatar/', $request->file('foto')->getClientOriginalName());

                    $staf->user->foto = $request->file('foto')->getClientOriginalName();
                }
            }
            $staf->user->save();
            $staf->save();
        }
        return redirect('/staf')->with('sukses', 'Data Berhasil Di Ubah');
    }
    // uv pass staf
    public function uvpass($id)
    {
        $user = \App\User::find($id);

        return view('staf/uvpass', ['user' => $user]);
    }
    // pass update staf
    public function passupdate(Request $request, $id)
    {
        $user = \App\User::find($id);
        $pass_lama = $request->pass_lama;

        if (Hash::check($pass_lama, $user->password)) {
            $user->password = bcrypt($request->pass_baru);
            $user->save();

            return redirect('/staf')->with('sukses', 'Password Berhasil Di Ubah');
        }
        else {
            return redirect('/staf')->with('gagal', 'Password Lama Salah');
        }
    }
    // delete staf
    public function delete($id)
    {
        $staf = \App\Staf::find($id);

        $user = \App\User::find($staf->id_user);
        $user->tanggapan()->delete();
        $user->pengaduan()->delete();
        $staf->user()->delete();

        $staf->delete();

        return redirect('/staf')->with('sukses', 'Data Berhasil Di Hapus');
    }
}
