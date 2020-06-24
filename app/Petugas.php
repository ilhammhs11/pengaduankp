<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table = 'petugas';
    protected $primaryKey = 'id_petugas';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['id_petugas', 'id_user', 'nama_lengkap', 'jabatan'];

    public function user()
    {
    	return $this->belongsTo(User::class, 'id_user');
    }

    public function tanggapan()
    {
    	return $this->hasMany(Tanggapan::class, 'id_petugas', 'id_petugas');
    }
}
