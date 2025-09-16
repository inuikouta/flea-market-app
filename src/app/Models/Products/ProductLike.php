<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class ProductLike extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'product_id',
        'user_id',
        'delete_flag',
    ];

    /**
     * お気に入り登録済みチェック
     * @param int $item_id -- 商品ID
     * @param int $user_id -- ユーザーID
     * @return ProductLike|null
     */
    public static function isLiked($item_id, $user_id)
    {
        try {
            return self::where('product_id', $item_id)
                ->where('user_id', $user_id)
                ->first();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw $e;
        }
    }

    /**
     * お気に入り初回登録
     * @param int $item_id -- 商品ID
     * @param int $user_id -- ユーザーID
     * @return void
     */
    public static function createLike($item_id, $user_id)
    {
        try {
            self::create([
                'product_id' => $item_id,
                'user_id' => $user_id,
                'delete_flag' => false,
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw $e;
        }
    }

    /**
     * お気に入り更新
     * @param int $item_id -- 商品ID
     * @param int $user_id -- ユーザーID
     * @param bool $delete_flag -- 削除フラグ
     * @return void
     */
    public static function updateLike($item_id, $user_id, $delete_flag)
    {
        // 既に登録されているお気に入り情報を取得
        try {
            $like = self::where('product_id', $item_id)
                ->where('user_id', $user_id)
                ->first();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw $e;
        }

        // 取得したお気に入り情報のdelete_flagを更新
        if ($like) {
            try {
                $like->delete_flag = $delete_flag;
                $like->save();
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                throw $e;
            }
        }
    }
}
