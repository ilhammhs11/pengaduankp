<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
	// hal awal
    public function index()
    {
    	return view('home');
    }
    // Staf Dan Siswa
    // hal login staf atau siswa
    public function login()
    {
    	return view('auth/login');
    }
    // cek login
    public function postlogin(Request $request)
    {
    	if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'level' => '1'])) {
    		return redirect('/dashboard')->with('sukses', 'Login Berhasil');
    	}
    	elseif(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'level' => '2'])) {
    		return redirect('/dashboard')->with('sukses', 'Login Berhasil');
    	}
    	else {
    		return redirect('/login')->with('gagal', 'Email atau Password Anda Salah');
    	}
    }
    // logout staf atau siswa
    public function logout()
    {
    	Auth::logout();
        return redirect('/login')->with('sukses', 'Logout Berhasil');
    }

    // Petugas
    // login petugas
    public function login2()
    {
    	return view('auth/login2');
    }
    // cek login 
    public function postlogin2(Request $request)
    {
    	if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'level' => '0'])) {
    		return redirect('/dashboard')->with('sukses', 'Login Berhasil');
    	}
    	else {
    		return redirect('/admin')->with('gagal', 'Email atau Password Anda Salah');
    	}
    }
    // logout petugas
    public function logout2()
    {
        Auth::logout();
        return redirect('/admin')->with('sukses', 'Logout Berhasil');
    }
}
