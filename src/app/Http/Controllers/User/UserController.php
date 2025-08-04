<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AddressRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    // プロフィール更新処理
    public function updateProfile(AddressRequest $request)
    {
        $user = Auth::user(); // 例: ログインユーザー取得

        // 画像がアップロードされている場合のみ処理
        if ($request->hasFile('profile-image')) {
            // 削除処理
            if ($user->image_path) {
                Log::debug('削除処理');
                // DBのicon_pathからstorage/app/public配下のパスに変換
                $oldPath = str_replace('/storage/', '', $user->image_path);
                Log::debug($oldPath);
                // 画像ファイルを削除
                Storage::disk('public')->delete($oldPath);
            }

            // 新しい画像保存
            $path = $request->file('profile-image')->store("images/users/{$user->id}", 'public');
            // 新しい画像のWeb公開用パスをDBに保存
            $user->image_path = "/storage/" . $path;
            $request['image_path'] = $user->image_path;
        }
        // 元々、画像がアップロードされている場合はそのまま使用
        else if ($user->image_path) {
            // 画像がアップロードされていない場合、DBのicon_pathをそのまま使用
            $request['image_path'] = $user->image_path;
        }

        User::updateProfile($request);

        // 現在は、強制的にhomeのマイリスタブに強制遷移するように設定している
        return redirect()->route('home', [
            'page' => 'mylist',
        ]);
    }

    // プロフィール取得処理
    public function getProfile()
    {
        $user = Auth::user(); // 例: ログインユーザー取得
        return view('users.edit', compact('user'));
    }
}
