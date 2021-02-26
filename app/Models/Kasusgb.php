<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasusgb extends Model
{
    public function Negara(){
        return $this->belongsTo('App/Models/Negara','id_negara');
    }

}
