<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    /**
     * 商品データをすべて取得
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getAllProducts()
    {
        return self::all();
    }

    /**
     * 指定されたIDの商品データを取得
     * @param int $id
     * @return Product|null
     */
    public static function getProductById($id)
    {
        return self::find($id);
    }
}
