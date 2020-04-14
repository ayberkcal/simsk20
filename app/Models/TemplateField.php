<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TemplateField extends Model
{
    protected $table = 'template_field';
    protected $primaryKey = 'id_field';
    public $timestamps = false;  
    
    protected $fillable = [
      'id_field',
      'kode_layanan',
      'nama_field',
      'tipe_field'
    ];

    public function layanan()
    {
      return $this->belongsTo(layanan::class,'kode_layanan');
    }
}
