<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'kode_layanan';
    protected $keyType = 'string';
    
    protected $table = 'layanan';
    
    protected $fillable = [
      'kode_layanan',
      'kode_sub',
      'nama_layanan',
      'template_file'
    ];

    public function subklasifikasi()
    {
      return $this->belongsTo(SubKlasifikasi::class,'kode_sub');
    }
    public function syaratL()
    {
      return $this->hasMany(SyaratLayanan::class,'kode_layanan');
    }
    public function penandatangan()
    {
      return $this->hasMany(Penandatangan::class,'kode_layanan');
    }
    public function suratkeluar()
    {
      return $this->hasMany(SuratKeluar::class,'kode_layanan');
    }
    public function field()
    {
      return $this->hasMany(TemplateField::class,'kode_layanan');
    }
}
