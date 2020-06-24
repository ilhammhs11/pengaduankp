<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['id_pengaduan', 'id_user', 'judul', 'tgl_pengaduan', 'jenis', 'isi_laporan', 'foto', 'status'];
    public function getFoto()
    {
        return asset('foto/'.$this->foto);
    }
    public function user()
    {
    	return $this->belongsTo(User::class, 'id_user');
    }
    public function tanggapan()
    {
    	return $this->hasMany(Tanggapan::class, 'id_pengaduan', 'id_pengaduan');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($pengaduan) { 
            foreach($pengaduan->tanggapan as $tanggapan){
              $tanggapan->delete();
          }
      });
    }
}
