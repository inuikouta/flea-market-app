<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    //
    public function index(Request $request)
    {
        $pageQuery = $request->query('page'); // クエリ取得
        return view('products.index');
    }

    // 商品詳細画面
    public function show($item_id)
    {
        Log::debug($item_id);
        return view('products.show', ['item_id' => $item_id]);
    }
}
