<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Sale;
use App\Http\Controllers\Controller;

class SaleController extends Controller
{
    protected $sale;
    public function __construct(Sale $sale) {
        $this->sale=$sale;
    }
    
    /**
     * 購入情報作成.
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request) {
        $order = Order::create([
            'order_count' => $request->order_count,
        ]);

        return response()->json($order);
    }
    
    /**
     * 商品情報取得.
     *
     * @param Request $request
     * @return void
     */
    public function fetch(Request $request) {
        $order = Product::find($request->product_id);
        return response()->json($order);
    }

    /**
     * 注文数更新.
     *
     * @param Request $request
     * @return void
     */
    public function order(Request $request) {
        dd($request);
        $hoge = $this->sale->insert($request->product_id);

        return response()->json($hoge);
    }
}
