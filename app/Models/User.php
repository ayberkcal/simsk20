<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'id_user';
    protected $keyType = 'string';
    
    protected $table = 'user';
    
    // protected $fillable = [
    //   'id_user','nama','tempat_lahir','tgl_lahir','jekel','email','password','alamat','hp','agama','foto','jenis_user'
    // ];

    public function suratkeluar()
    {
      return $this->hasMany(SuratKeluar::class,'id_user');
    }

    public function penandatangan()
    {
      return $this->hasMany(Penandatangan::class,'id_user');
    }

    public function dosen_tendik()
    {
      return $this->hasOne(DosenTendik::class,'id_user');
    }
}
