<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Products\ProductLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LikeController extends Controller
{
    // お気に入り登録
    public function handleLike(Request $request, $item_id)
    {
        $favorite = $request->input('favorite');
        $user_id = Auth::id();

        // すでにお気に入り登録されているかチェックし、登録されていれば更新、されていなければ新規登録
        ProductLike::isLiked($item_id, $user_id) ?
            ProductLike::updateLike($item_id, $user_id, $favorite) :    // 更新
            ProductLike::createLike($item_id, $user_id);                // 新規登録
    }
}
