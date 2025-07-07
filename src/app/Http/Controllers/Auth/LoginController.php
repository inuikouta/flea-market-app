<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create()
    {
        // ログイン画面を表示
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // ログイン処理を実行
        // ここにログインのロジックを追加します

        dd($request->all());
    }
}
