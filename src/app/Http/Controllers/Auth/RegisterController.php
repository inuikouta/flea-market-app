<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // ユーザー登録画面を表示
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // ユーザー登録処理を実行
        // ここにユーザー登録のロジックを追加します

        dd($request->all());
    }
}
