<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';
    public $timestamps = false; 
    protected $primaryKey = 'id_status';
    /**
     * Get the notes for the status.
     */
    public function notes()
    {
        return $this->hasMany('App\Models\Notes');
    }
    public function suratKeluar()
    {
        return $this->hasMany('App\Models\SuratKeluar');
    }
}
