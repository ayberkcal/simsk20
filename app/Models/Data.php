<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'no_regist,kode_layanan,id_field';
    protected $keyType = 'string';
    
    protected $table = 'data';
    
    protected $fillable = [
      'no_regist',
      'kode_layanan',
      'id_field',
      'data'
    ];

    public function template_field()
    {
      return $this->belongsTo(TemplateField::class,'id_field');
    }

    public function suratkeluar()
    {
      return $this->belongsTo(SuratKeluar::class,'no_regist');
    }
}
