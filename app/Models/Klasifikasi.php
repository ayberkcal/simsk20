<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class klasifikasi extends Model
{
    protected $table = 'klasifikasi';

    protected $primaryKey = 'kode_klasifikasi';
    protected $keyType = 'string';

    protected $fillable = [
      'kode_klasifikasi',
      'klasifikasi'
    ];
    public $timestamps = false;

    public function subklasifikasi()
    {
      return $this->hasMany(SubKlasifikasi::class,'kode_klasifikasi');
    }
}
