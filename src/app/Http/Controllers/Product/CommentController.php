<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Products\ProductComment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // コメント投稿
    public function store(Request $request, $item_id)
    {
        $comment = $request->input('comment');
        Auth::user()->name;

        try {
            $comment = ProductComment::create([
                'product_id' => $item_id,
                'user_id'    => $request->user()->id,
                'comment'    => $comment,
            ]);

            // AJAX なら JSON 返却
            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'ok',
                    'comment' => [
                        'id'      => $comment->id,
                        'user'    => Auth::user()->name,
                        'img'     => asset(Auth::user()->image_path),
                        'text'    => $comment->comment,
                        'user_id' => $comment->user_id,
                        'created_at' => $comment->created_at->toDateTimeString(),
                    ],
                ]);
            }
            // 非AJAX（将来フォーム送信対応する場合）
            return back()->with('status', 'コメントを投稿しました');
        } catch (\Exception $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'error',
                    'error'   => 'コメントの保存に失敗しました。',
                ], 500);
            }
            return back()->withErrors(['comment' => '保存に失敗しました。'])->withInput();
        }
    }
}
