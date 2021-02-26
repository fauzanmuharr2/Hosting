<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negara extends Model
{
    public function Kasusgb(){
        return $this->hasMany('App/Models/Kasusgb','id_negara');
    }

}
