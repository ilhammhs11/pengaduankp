<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //profile
	public function profile()
	{
		$id = auth()->user()->id_user;

		$user = \App\User::find($id);

		return view('profile.index', ['user' => $user]);
	}

	public function uvprofile($id)
	{
		$user = \App\User::find($id);

		return view('profile/uvedit', ['user' => $user]);
	}

	public function updateprofile(Request $request)
	{
		$user = \App\User::find($request->id_user);

		$user->username = $request->username;
		if ($request->email == $user->email) {
			if (isset($request->cek)) {
				if ($request->hasFile('foto')) {
					$request->file('foto')->move('avatar/', $request->file('foto')->getClientOriginalName());

					$user->avatar = $request->file('foto')->getClientOriginalName();
				}
			}
		}
		else {
			$this->validate($request, [
                'email' => 'required|email|unique:users',
            ]);

			$user->email = $request->email;

            if (isset($request->cek)) {
				if ($request->hasFile('foto')) {
					$request->file('foto')->move('avatar/', $request->file('foto')->getClientOriginalName());

					$user->avatar = $request->file('foto')->getClientOriginalName();
				}
			}
		}

		$user->save();

		return redirect('/profile')->with('sukses', 'Data Berhasil Di Ubah');
	}

	public function uvpassprofile($id)
	{
		$user = \App\User::find($id);
		return view('profile/uvpass', ['user' => $user]);
	}

	public function updatepassprofile(Request $request, $id)
	{
		$user = \App\User::find($id);

		$pass_lama = $request->pass_lama;
		if (Hash::check($pass_lama, $user->password)) {
			$user->password = bcrypt($request->pass_baru);
			$user->save();

			return redirect('/profile')->with('sukses', 'Password Berhasil Di Ubah');
		}
		else {
			return redirect('/profile')->with('gagal', 'Password Lama Salah');
		}
	}
}
