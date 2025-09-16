<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Products\Product;
use App\Models\Products\ProductComment;
use App\Models\Products\ProductLike;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * 商品一覧画面
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $pageQuery = $request->query('page'); // クエリ取得
        $products = Product::getAllProducts();
        return view('products.index', [
            'products' => $products,
            'pageQuery' => $pageQuery
        ]);
    }

    /**
     * 商品詳細画面
     *
     * @param int $item_id
     * @return \Illuminate\View\View
     */
    public function show($item_id)
    {
        $comments = productComment::getComments($item_id);
        // 何ヶ月前のコメントかを計算して表示する場合
        $test = $comments->map(fn($c) => $c->time_diff_for_humans = $c->created_at->diffForHumans());

        // お気に入り状態の取得
        $user_id = Auth::id();
        $like = ProductLike::isLiked($item_id, $user_id);

        $product = Product::getProductById($item_id); // 商品データ取得
        return view('products.show', [
            'item_id' => $item_id,
            'product' => $product,
            'comments' => $comments,
            'like' => empty($like->delete_flag) ? 0 : $like->delete_flag, // 1:いいね済み、0:未いいね
        ]);
    }
}
