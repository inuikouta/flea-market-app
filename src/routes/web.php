<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Product\ProductBuyController;
use App\Http\Controllers\Product\ChangeAddressController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 認証関連のルート
Route::middleware('auth')->group(function () {
    // 商品一覧
    Route::get('/', [ProductController::class, 'index'])->name('home');

    // プロフィール
    Route::get('/mypage/profile', function () {
        return view('users.edit');
    })->name('mypage');

    Route::get('/mypage/profile', [UserController::class, 'getProfile']);

    Route::post('/mypage/profile', [UserController::class, 'updateProfile'])->name('mypage.update');

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
});

// 商品関連
Route::middleware('auth')->group(function () {
    Route::get('/sell', function () {
        return view('products.create');
    });
});

// 商品詳細画面
Route::middleware('auth')->group(function () {
    // 商品詳細画面
    Route::get('/item/{item_id}', [ProductController::class, 'show'])->name('products.show');

    // 商品購入画面
    Route::get('/purchase/{item_id}', [ProductBuyController::class, 'purchase'])->name('products.purchase');

    // 送付先住所変更
    Route::get('/purchase/address/{item_id}', [ChangeAddressController::class, 'purchase'])->name('products.change_address');
});
