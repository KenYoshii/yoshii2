<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //リレーション
    public function company(){
        return $this->belongsTo('App\Models\Companies');
    }

    public function sales(){
        return $this->hasMany('App\Models\Sale');
    }

}
