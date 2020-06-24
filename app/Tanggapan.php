<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $table = 'tanggapan';
    protected $primaryKey = 'id_tanggapan';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['id_tanggapan', 'id_petugas', 'id_pengaduan', 'tgl_tanggapan', 'tanggapan'];

    public function pengaduan()
    {
    	return $this->belongsTo(Pengaduan::class, 'id_pengaduan');
    }

    public function petugas()
    {
    	return $this->belongsTo(Petugas::class, 'id_petugas');
    }
}
