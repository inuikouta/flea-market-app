<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate(); // これで全削除＆IDリセット

        DB::table('products')->insert([
            [
                'user_id' => 4,
                'name' => '腕時計',
                'brand' => 'ブランドA',
                'price' => 15000,
                'description' => 'スタイリッシュなデザインのメンズ腕時計',
                'quality' => '良好',
                'image_path' => 'images/products/1/clock.jpg',
            ],
            [
                'user_id' => 5,
                'name' => 'HDD',
                'brand' => 'ブランドB',
                'price' => 5000,
                'description' => '高速で信頼性の高いハードディスク',
                'quality' => '目立った傷や汚れなし',
                'image_path' => 'images/products/2/disk.jpg',
            ],
            [
                'user_id' => 5,
                'name' => '玉ねぎ3束',
                'brand' => 'ブランドB',
                'price' => 300,
                'description' => '新鮮な玉ねぎ3束のセット',
                'quality' => 'やや傷や汚れあり',
                'image_path' => 'images/products/3/tamanegi.jpg',
            ],
            [
                'user_id' => 5,
                'name' => '革靴',
                'brand' => 'ブランドB',
                'price' => 4000,
                'description' => 'クラシックなデザインの革靴',
                'quality' => '状態が悪い',
                'image_path' => 'images/products/4/boots.jpg',
            ],
            [
                'user_id' => 5,
                'name' => 'ノートPC',
                'brand' => 'ブランドB',
                'price' => 45000,
                'description' => '高性能なノートパソコン',
                'quality' => '良好',
                'image_path' => 'images/products/5/raptop.jpg',
            ],
            [
                'user_id' => 5,
                'name' => 'マイク',
                'brand' => 'ブランドB',
                'price' => 8000,
                'description' => '高音質のレコーディング用マイク',
                'quality' => '目立った傷や汚れなし',
                'image_path' => 'images/products/6/mic.jpg',
            ],
            [
                'user_id' => 5,
                'name' => 'ショルダーバッグ',
                'brand' => 'ブランドB',
                'price' => 3500,
                'description' => 'おしゃれなショルダーバッグ',
                'quality' => 'やや傷や汚れあり',
                'image_path' => 'images/products/7/pocket.jpg',
            ],
            [
                'user_id' => 5,
                'name' => 'タンブラー',
                'brand' => 'ブランドB',
                'price' => 500,
                'description' => '使いやすいタンブラー',
                'quality' => '状態が悪い',
                'image_path' => 'images/products/8/souvenir.jpg',
            ],
            [
                'user_id' => 5,
                'name' => 'コーヒーミル',
                'brand' => 'ブランドB',
                'price' => 4000,
                'description' => '手動のコーヒーミル',
                'quality' => '良好',
                'image_path' => 'images/products/9/coffeeGrinder.jpg',
            ],
            [
                'user_id' => 5,
                'name' => 'メイクセット',
                'brand' => 'ブランドB',
                'price' => 2500,
                'description' => '便利なメイクアップセット',
                'quality' => '目立った傷や汚れなし',
                'image_path' => 'images/products/10/makeSet.jpg',
            ],
        ]);
    }
}
