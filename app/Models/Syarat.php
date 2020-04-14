<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Syarat extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'id_syarat';
    //protected $keyType = 'string';
    
    protected $table = 'syarat';
    
    protected $fillable = [
      'id_syarat',
      'nama_syarat',
      'tipe_file'
    ];

    public function syaratL()
    {
      return $this->hasMany(SyaratLayanan::class,'id_syarat');
    }
}
