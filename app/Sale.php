<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Product;

class Sale extends Model
{
    protected  $fillable = [
    ];
    //リレーション
    public function product(){
        return $this->belongsTo('App\Models\Product');
    }

    public function executeBuy($product_id) {

        $post = Product::findOrFail($product_id);
        if ($post->stock > 1) {
            // 商品在庫数の更新
            $post->stock = $post->stock - 1;
            $post->save();

            $sale = new Sale;
            // salesテーブル
            $sale->product_id = $product_id;
            $sale->save();
            $order = [
                'message' => "商品を購入しました",
                'detail' => $sale,
                'product' => $post,
            ];
        } else {
            $order = [
                'message' => "商品在庫がありません",
                'product' => $post,
            ];
        }
        return $order;
    }
}
