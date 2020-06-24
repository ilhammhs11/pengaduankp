<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
	protected $table = 'kelas';
	protected $primaryKey = 'id_kelas';
	protected $keyType = 'string';
	public $incrementing = false;

	protected $fillable = ['id_kelas', 'nama_kelas', 'keterangan'];

	public function siswa()
	{
		return $this->hasMany(Siswa::class, 'id_kelas', 'id_kelas');
	}
}
