<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'AuthController@index')->name('login');

// login + logout staf dan siswa
Route::get('/login', 'AuthController@login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

// login + logout petugas
Route::get('/admin', 'AuthController@login2');
Route::post('/postlogin2', 'AuthController@postlogin2');
Route::get('/logout2', 'AuthController@logout2');

// akses admin atau petugas
Route::group(['middleware' => ['auth', 'checklevel:0']], function(){
	// Petugas
	Route::get('/petugas', 'PetugasController@index');
	Route::post('/petugas/create', 'PetugasController@create');
	Route::get('/petugas/{id}/edit', 'PetugasController@uvedit');
	Route::post('/petugas/update', 'PetugasController@update');
	Route::get('/petugas/{id}/editpass', 'PetugasController@uvpass');
	Route::post('/petugas/{id}/passupdate', 'PetugasController@passupdate');
	Route::get('/petugas/{id}/delete', 'PetugasController@delete');

	// Staf
	Route::get('/staf', 'StafController@index');
	Route::post('/staf/create', 'StafController@create');
	Route::get('/staf/{id}/edit', 'StafController@uvedit');
	Route::post('/staf/update', 'StafController@update');
	Route::get('/staf/{id}/editpass', 'StafController@uvpass');
	Route::post('/staf/{id}/passupdate', 'StafController@passupdate');
	Route::get('/staf/{id}/delete', 'StafController@delete');

	// Siswa
	Route::get('/siswa', 'SiswaController@index');
	Route::post('/siswa/create', 'SiswaController@create');
	Route::get('/siswa/{id}/edit', 'SiswaController@uvedit');
	Route::post('/siswa/update', 'SiswaController@update');
	Route::get('/siswa/{id}/editpass', 'SiswaController@uvpass');
	Route::post('/siswa/{id}/passupdate', 'SiswaController@passupdate');
	Route::get('/siswa/{id}/delete', 'SiswaController@delete');

	// Kelas
	Route::get('/kelas', 'KelasController@index');
	Route::post('/kelas/create', 'KelasController@create');
	Route::get('/kelas/{id}/edit', 'KelasController@uvedit');
	Route::post('/kelas/update', 'KelasController@update');
	Route::get('/kelas/{id}/delete', 'KelasController@delete');

	// Siswa
	// Data Pengaduan Baru
	Route::get('/pengaduanbarusiswa', 'PengaduanController@pengaduanbarusiswa');

	// Data Pengaduan Proses & Pengaduan Selesai
	Route::get('/pengaduanprosessiswa', 'TanggapanController@pengaduanprosessiswa');
	Route::get('/pengaduanselesaisiswa', 'TanggapanController@pengaduanselesaisiswa');

	// Staf
	// Data Pengaduan Baru
	Route::get('/pengaduanbarustaf', 'PengaduanController@pengaduanbarustaf');

	// Data Pengaduan Proses & Pengaduan Selesai
	Route::get('/pengaduanprosesstaf', 'TanggapanController@pengaduanprosesstaf');
	Route::get('/pengaduanselesaistaf', 'TanggapanController@pengaduanselesaistaf');

	// Tanggapan
	Route::get('tanggapan/{id}/add', 'TanggapanController@add');
	Route::post('tanggapan/create', 'TanggapanController@create');

	// Tanggapan + Pengaduan Proses & Pengaduan Selesai
	Route::get('tanggapan/{id}/add', 'TanggapanController@add');
	Route::post('tanggapan/create', 'TanggapanController@create');
	Route::get('/pengaduan/{id}/editstatus', 'PengaduanController@uveditstatus');
	Route::post('/pengaduan/updatestatus', 'PengaduanController@updatestatus');

	// Laporan
	Route::get('/laporan', 'LaporanController@index');

	// Laporan Keseluruhan
	Route::get('/laporan/petugas', 'LaporanController@petugas');
	Route::get('/laporan/staf', 'LaporanController@staf');
	Route::get('/laporan/siswa', 'LaporanController@siswa');

	Route::post('/laporan/staf/baruseluruh', 'LaporanController@stafbaruseluruh');
	Route::post('/laporan/staf/prosesseluruh', 'LaporanController@stafprosesseluruh');
	Route::post('/laporan/staf/selesaiseluruh', 'LaporanController@stafselesaiseluruh');

	Route::post('/laporan/siswa/baruseluruh', 'LaporanController@siswabaruseluruh');
	Route::post('/laporan/siswa/prosesseluruh', 'LaporanController@siswaprosesseluruh');
	Route::post('/laporan/siswa/selsesaiseluruh', 'LaporanController@siswaselesaiseluruh');

	// Laporan Per Tanggal
	Route::post('/laporan/staf/baru', 'LaporanController@stafbaru');
	Route::post('/laporan/staf/proses', 'LaporanController@stafproses');
	Route::post('/laporan/staf/selsesai', 'LaporanController@stafselesai');

	Route::post('/laporan/siswa/baru', 'LaporanController@siswabaru');
	Route::post('/laporan/siswa/proses', 'LaporanController@siswaproses');
	Route::post('/laporan/siswa/selsesai', 'LaporanController@siswaselesai');
});

// akses admin atau petugas, staf dan siswa
Route::group(['middleware' => ['auth', 'checklevel:0,1,2']], function(){
	Route::get('/dashboard', 'DashboardController@index');

	//profile
	Route::get('/profile', 'UserController@profile');
	Route::get('/profile/{id}/edit', 'UserController@uvprofile');
	Route::post('/profile/update', 'UserController@updateprofile');
	Route::get('/profile/{id}/editp', 'UserController@uvpassprofile');
	Route::post('/profile/{id}/passupdate', 'UserController@updatepassprofile');

	// Pengaduan Baru
	Route::get('/pengaduanbaru', 'PengaduanController@pengaduanbaru');
	Route::get('/pengaduan/{id}/lihat', 'PengaduanController@lihat');
	Route::get('/pengaduan/{id}/edit', 'PengaduanController@uvedit');
	Route::post('/pengaduan/update', 'PengaduanController@update');

	// Pengaduan Proses 
	Route::get('/pengaduan/{id}/lihatpengaduan', 'TanggapanController@lihat');
	Route::get('/pengaduanproses', 'TanggapanController@pengaduanproses');
	Route::get('/pengaduanselesai', 'TanggapanController@pengaduanselesai');
});

// akses staf dan siswa
Route::group(['middleware' => ['auth', 'checklevel:1,2']], function(){
	Route::get('/buatpengaduan', 'PengaduanController@add');
	Route::post('/pengaduan/create', 'PengaduanController@create');

	Route::get('/pengaduan/{id}/delete', 'PengaduanController@delete');
});