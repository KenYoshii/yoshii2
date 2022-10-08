<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function models(){
        $query = Product::query();

    $products = $query->from('products')->select(
        'products.id as id',
        'products.product_name as product_name',
        'products.price as price',
        'products.img_path as img_path',
        'products.stock as stock',
        'companies.company_name as company_name',
        )
        // ->sortable()
        ->orderBy('id','asc')
        ->leftJoin('companies', 'products.company_id', '=', 'companies.id')->get();
        return $products;
    }
}
