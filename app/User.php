<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id_user';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'username', 'foto', 'email', 'password', 'telp', 'level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAvatar()
    {
        return asset('avatar/'.$this->foto);
    }

    public function petugas()
    {
        return $this->hasOne(Petugas::class, 'id_user', 'id_user');
    }

    public function staf()
    {
        return $this->hasOne(Staf::class, 'id_user', 'id_user');
    }

    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'id_user', 'id_user');
    }

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class, 'id_user', 'id_user');
    }

    public function tanggapan()
    {
        return $this->hasManyThrough(Tanggapan::class, Pengaduan::class, 'id_user', 'id_pengaduan', 'id_user', 'id_pengaduan');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($user) { 
            foreach($user->pengaduan as $pengaduan){
              $pengaduan->delete();
          }
      });
    }
}
