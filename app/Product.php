<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //割り当て許可
    protected $fillable = [
        'company_id',
        'product_name',
        'price',
        'stock',
        'comment',
        'img_path'
    ];
    
    //リレーション
    public function company(){
        return $this->belongsTo('App\Models\Companies');
    }

    public function sales(){
        return $this->hasMany('App\Models\Sale');
    }
}
