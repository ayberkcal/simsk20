<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenandaTangan extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'kode_layanan,id_user';
    protected $keyType = 'string';
    
    protected $table = 'penandatangan';
    
    protected $fillable = [
      'kode_layanan',
      'id_user',
      'status',
      'urutan'
    ];

    public function user()
    {
      return $this->belongsTo(User::class,'id_user');
    }
    public function layanan()
    {
      return $this->belongsTo(Layanan::class,'kode_layanan');
    }
}
