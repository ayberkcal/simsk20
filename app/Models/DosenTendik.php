<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DosenTendik extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'id_user';
    protected $keyType = 'string';
    
    protected $table = 'dosen_tendik';

    public function user()
    {
      return $this->belongsTo(User::class,'id_user');
    }
}
