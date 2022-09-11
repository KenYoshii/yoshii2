<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //リレーション
    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
}
