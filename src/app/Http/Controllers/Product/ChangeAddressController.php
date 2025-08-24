<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChangeAddressController extends Controller
{
    public function purchase($item_id)
    {
        // 送付先住所変更の処理をここに実装
        // 例: 商品IDに基づいてデータを取得し、ビューに渡す

        return view('products.change_address', ['item_id' => $item_id]);
    }
}
