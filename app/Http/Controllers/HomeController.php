<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Company;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $posts=Product::orderBy('created_at', 'desc')->get();
        $company=Company::all();
        $user=auth()->user();
        // $query = Product::query();
        $model = new Product();
        $products = $model->models();
        
        // $products = $query->from('products')->select(
        //     'products.id as id',
        //     'products.product_name as product_name',
        //     'products.price as price',
        //     'products.img_path as img_path',
        //     'products.stock as stock',
        //     'companies.company_name as company_name',
        //     )
        //     // ->sortable()
        //     ->orderBy('id','asc')
        //     ->leftJoin('companies', 'products.company_id', '=', 'companies.id')->get();
            


      

        //検索フォームに入力された値を取得
        // $company = $request->input('company');
        // $keyword = $request->input('keyword');

        // $query = Product::query();
        // //テーブル結合
        // $query->join('companies', function ($query) use ($request) {
        //     $query->on('products.company_id', '=', 'companies.id');
        //     });

        // if(!empty($company)) {
        //     $query->where('company', 'LIKE', $company);
        // }

        // if(!empty($keyword)) {
        //     $query->where('name', 'LIKE', "%{$keyword}%");
        // }

        // $items = $query->get();

        // $company_list = Company::all();

        return view('home', compact('products', 'user', 'company'));
    }
}
