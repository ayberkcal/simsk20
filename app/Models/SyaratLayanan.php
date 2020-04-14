<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SyaratLayanan extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'kode_layanan,id_syarat';
    protected $keyType = 'string';
    
    protected $table = 'syarat_layanan';
    
    protected $fillable = [
      'kode_layanan',
      'id_syarat'
    ];

    public function syarat()
    {
      return $this->belongsTo(Syarat::class,'id_syarat');
    }
    public function layanan()
    {
      return $this->belongsTo(Layanan::class,'kode_layanan');
    }

    public function dokumen()
    {
      return $this->hasMany(Dokumen::class,'kode_layanan');
    }
}
