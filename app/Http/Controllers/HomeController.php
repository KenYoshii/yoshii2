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
    public function index(Request $rq)
    {
        // $posts=Product::orderBy('created_at', 'desc')->get();
        $company=Company::all();
        $user=auth()->user();
        // $query = Product::query();
        $model = new Product();
        $products = $model->models();
        $keyword = $rq->input('keyword');

        //クエリ生成
        $query = Product::query();

        //もしキーワードがあったら
        if(!empty($keyword))
        {
        $query->where('products','like','%'.$keyword.'%');
        $query->orWhere('companies','like','%'.$keyword.'%');
        }

        // 全件取得 +ページネーション
        // $products = $query->orderBy('id','desc')->paginate(5);
        
        return view('home', compact('products', 'user', 'company', 'keyword', ));
    }
}
