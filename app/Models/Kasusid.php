<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasusid extends Model
{
    protected $fillable = ['jumlah_positif','jumlah_meninggal', 'jumlah_sembu', 'tanggal','id_rw'];
    public function Rw(){
        return $this->belongsTo('App\Models\Rw','id_rw');
    }
}
