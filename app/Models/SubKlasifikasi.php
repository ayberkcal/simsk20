<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subklasifikasi extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'kode_sub';
    protected $keyType = 'string';
    
    protected $table = 'sub_klasifikasi';
    
    protected $fillable = [
      'kode_sub',
      'kode_klasifikasi',
      'sub_klasifikasi',
      'penomoran'
    ];

    public function klasifikasi()
    {
      return $this->belongsTo(Klasifikasi::class,'kode_klasifikasi');
    }

    public function layanan()
    {
      return $this->hasMany(Layanan::class,'kode_sub');
    }
    
}
