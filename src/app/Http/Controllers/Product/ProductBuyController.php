<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductBuyController extends Controller
{
    //
    public function purchase($item_id)
    {
        return view('products.purchase', compact('item_id'));
    }
}
