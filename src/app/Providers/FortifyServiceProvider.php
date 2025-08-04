<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Validator;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;


use Laravel\Fortify\Http\Requests\LoginRequest as FortifyLoginRequest;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 新規ユーザの登録処理
        Fortify::createUsersUsing(CreateNewUser::class);

        // registerにアクセスしたときに表示するviewファイル
        Fortify::registerView(function () {
            return view('auth.register');
        });

        // loginにアクセスしたときに表示するviewファイル
        Fortify::loginView(function () {
            return view('auth.login');
        });

        // login処理の実行回数を1分あたり10回までに制限
        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;
            return Limit::perMinute(10)->by($email . $request->ip());
        });

        // 新規登録後の遷移先
        $this->app->singleton(RegisterResponseContract::class, function () {
            return new class implements RegisterResponseContract {
                public function toResponse($request)
                {
                    return redirect('/mypage/profile');
                }
            };
        });

        // 通常ログイン後の遷移先
        $this->app->singleton(LoginResponseContract::class, function () {
            return new class implements LoginResponseContract {
                public function toResponse($request)
                {
                    return redirect('/?tab=mylist');
                }
            };
        });

        // ログイン時のユーザ情報の更新
        // FortifyLoginRequestが呼ばれたら、LoginRequestが呼ばれるようにバインド
        app()->bind(FortifyLoginRequest::class, LoginRequest::class);
    }
}
