<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Products\Product;
use Illuminate\Support\Facades\Log;

class ProductBuyController extends Controller
{
    /**
     * 商品購入画面表示
     */
    public function show($item_id)
    {
        $product = Product::getProductById($item_id); // 商品データ取得
        $address = session('purchase_address') ?? [
            'postal_code' => Auth::user()->postal_code,
            'address' => Auth::user()->address,
            'building_name' => Auth::user()->building_name,
        ];
        return view('products.purchase', compact('product', 'item_id', 'address'));
    }
}
