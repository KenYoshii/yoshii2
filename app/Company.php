<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //割り当て許可
    protected $fillable = [
        'company_name',
        'street_address',
        'representative_name'
    ];
    
    //リレーション
    public function products(){
        return $this->hasMany('App\Product');
        // return $this->hasMany(Product::class);
    }

    public function getLists(){
        $companies = Company::orderBy('id', 'asc')->plunck('company_name', 'id');

        return $companies;
    }
}
