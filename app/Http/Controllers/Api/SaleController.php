<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Sale;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class SaleController extends Controller
{
    protected $sale;

    public function __construct(Sale $sale) {
        $this->sale = $sale;
    }

    public function order(Request $request) {
        // トランザクション開始
        \DB::beginTransaction();
        try {
            $order = $this->sale->executeBuy($request->product_id);
            // 商品購入の登録処理
            \DB::commit();
            $result = [
                'result' => '成功',
                'order' => $order
            ];
        } catch (\Throwable $e) {
            \DB::rollback();
            $result = [
                'result' => '失敗',
                'order' => $order
            ];
        }
        return response()->json($result);
    }
}
