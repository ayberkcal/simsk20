<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'no_regist,kode_layanan,id_syarat';
    protected $keyType = 'string';
    
    protected $table = 'dokumen';
    
    protected $fillable = [
      'no_regist',
      'kode_layanan',
      'id_syarat',
      'nama_file',
      'verifikasi'
    ];

    public function syaratL()
    {
      return $this->belongsTo(SyaratLayanan::class,'id_syarat');
    }

    public function syarat()
    {
      return $this->belongsTo(Syarat::class,'id_syarat');
    }

    public function suratkeluar()
    {
      return $this->belongsTo(SuratKeluar::class,'no_regist');
    }
}
