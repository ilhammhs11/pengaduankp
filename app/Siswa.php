<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'nis';
    public $incrementing = false;

    protected $fillable = ['nis', 'id_user', 'nama_lengkap', 'id_kelas', 'jk', 'alamat'];

    public function user()
    {
    	return $this->belongsTo(User::class, 'id_user');
    }

    public function kelas()
    {
    	return $this->belongsTo(Kelas::class, 'id_kelas');
    }
}
