<?php

namespace App;

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

    public function getLists(){
        $companies = Company::orderBy('id', 'asc')->plunck('company_name', 'id');

        return $companies;
    }

}
