<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Sale extends Model
{
    //リレーション
    public function product(){
        return $this->belongsTo('App\Models\Product');
    }

    //購入
    public function insert($product_id){
        $post=new Sale();
        $post->product_id=$product_id;

        $post->save();
    }
}
