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
        $company=Company::all();
        $user=auth()->user();
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

        //フォームを機能させるために各情報を取得し、viewに返す
        $category = new Company;
        $categories = $category->getLists();
        $searchWord = $rq->input('searchWord');
        $categoryId = $rq->input('company_id');
        
        return view('home', compact('products', 'user', 'company', 'keyword', 'categories', 'searchWord', 'categoryId' ));
    }

    // 検索メソッド(searchproduct)
    public function search(Request $rq)
    {
        //入力される値nameの中身を定義する
        $searchWord = $rq->input('searchWord'); //キーワードの値
        $categoryId = $rq->input('categoryId'); //会社名の値

        $query = Product::query();
        //商品名が入力された場合、m_productsテーブルから一致する商品を$queryに代入
        if (isset($searchWord)) {
            $query->where('product_name', 'like', '%' . self::escapeLike($searchWord) . '%');
        }

        //商品名が入力された場合、productsテーブルから一致する商品を$queryに代入
        if (isset($searchWord)) {
            $query->where('product_name', 'like', '%' . self::escapeLike($searchWord) . '%');
        }
        //カテゴリが選択された場合、companiesテーブルからcompany_idが一致する会社を$queryに代入
        if (isset($categoryId)) {
            $query->where('company_id', $categoryId);
        }

        //$queryをcategory_idの昇順に並び替えて$productsに代入
        $products = $query->orderBy('company_id', 'asc')->paginate(15);

        //companiesテーブルからgetLists();関数でcompany_nameとidを取得する
        $category = new Company;
        $categories = $category->getLists();

        return view('home', [
            'products' => $products,
            'categories' => $categories,
            'searchWord' => $searchWord,
            'categoryId' => $categoryId
        ]);
    }

    //「\\」「%」「_」などの記号を文字としてエスケープさせる
    public static function escapeLike($str)
    {
        return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
    }
}

