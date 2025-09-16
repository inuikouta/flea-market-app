<?php

namespace App\Models\Products;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class ProductComment extends Model
{
    // use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'product_id',
        'user_id',
        'comment',
    ];

    // ユーザーとのリレーション
    public function user(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    // 商品とのリレーション
    public function product(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Products\Product::class);
    }

    // created_at → 「◯分前」等を返す
    public function getTimeAgoAttribute(): string
    {
        return optional($this->created_at)->diffForHumans() ?? '';
    }

    // 商品に関連するコメントを取得（ユーザー情報付き）
    public static function getComments($product_id)
    {
        return self::with('user:id,name,image_path,created_at') // 必要な列だけ
            ->where('product_id', $product_id)
            ->latest()
            ->get();
    }
}
