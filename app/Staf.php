<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staf extends Model
{
    protected $table = 'staf';
    protected $primaryKey = 'id_staf';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['id_staf', 'id_user', 'nama_lengkap', 'bagian'];

    public function user()
    {
    	return $this->belongsTo(User::class, 'id_user');
    }
}
