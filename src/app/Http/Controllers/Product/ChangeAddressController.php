<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ChangeAddressController extends Controller
{
    /**
     * 配送先変更画面表示
     * @param int $item_id - 商品ID
     * @return \Illuminate\View\View
     */
    public function show($item_id)
    {
        $address = session('purchase_address') ?? [
            'postal_code' => Auth::user()->postal_code,
            'address' => Auth::user()->address,
            'building_name' => Auth::user()->building_name,
        ];

        return view('products.change_address', compact('item_id', 'address'));
    }

    /**
     * 配送先変更内容をセッションに保存
     * @param Request $request
     * @param int $item_id - 商品ID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $item_id)
    {
        session([
            'purchase_address' => [
                'postal_code' => $request->postal_code,
                'address' => $request->address,
                'building_name' => $request->building_name,
            ]
        ]);
        return redirect()->route('products.purchase', ['item_id' => $item_id]);
    }
}
