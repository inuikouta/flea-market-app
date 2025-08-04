<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

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
