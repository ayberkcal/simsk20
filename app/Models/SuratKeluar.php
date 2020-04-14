<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    protected $table = 'surat_keluar';
    protected $primaryKey = 'no_regist';
    protected $keyType = 'string';

    protected $fillable = [
    	'no_regist','kode_layanan','id_user','tgl_permohonan','tujuan','status'
    ];

    public function layanan()
    {
      return $this->belongsTo(layanan::class,'kode_layanan');
    }

    public function user()
    {
      return $this->belongsTo(User::class,'id_user');
    }
    
    public function dokumen()
    {
      return $this->hasMany(Dokumen::class,'no_regist');
    }
}
