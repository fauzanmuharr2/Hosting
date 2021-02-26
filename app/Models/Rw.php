<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    public function Kelurahan(){
        return $this->belongsTo('App\Models\Kelurahan','id_kelurahan');
    }

    public function Kasusid(){
        return $this->hasMany('App\Models\Kasusid','id_rw');
    }
}
