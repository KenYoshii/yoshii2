<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //割り当て許可
    protected $fillable = [
        'company_id',
        'company_name',
        'product_name',
        'price',
        'stock',
        'comment',
        'img_path'
    ];
    
    //リレーション
    public function company(){
        return $this->belongsTo('App\Models\Companies');
        return $this->belongsTo(Company::class);
    }

    public function sales(){
        return $this->hasMany('App\Models\Sale');
    }
}
