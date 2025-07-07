@extends('layouts.app')
@section('title', 'ログイン')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endsection

@section('header')
    @include('partials.header_auth')
@endsection

@section('content')
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    <form class="form-container" method="POST" action="#">
        @csrf
        <div class="form__block">
            <h1 class="form__title">会員登録</h1>
        </div>

        <div class="form__block">
            <div class="form__group">
                <label for="name" class="form__label">ユーザー名</label>
                <input type="text" id="name" class="form__input" name="name" value="{{ old('name') }}">
            </div>
            <div class="form__group">
                <label for="email" class="form__label">メールアドレス</label>
                <input type="email" id="email" class="form__input" name="email" value="{{ old('email') }}">
            </div>
            <div class="form__group">
                <label for="password" class="form__label">パスワード</label>
                <input type="password" id="password" class="form__input" name="password">
            </div>
            <div class="form__group">
                <label for="password_confirmation" class="form__label">パスワード確認</label>
                <input type="password" id="password_confirmation" class="form__input" name="password_confirmation">
            </div>
        </div>

        <div class="form__block">
            <div class="form__group">
                <button type="submit" class="form__register-button">登録する</button>
            </div>
            <div class="form__group">
                <a href="/login" class="form__login-link">ログインはこちら</a>
            </div>
        </div>
    </form>
@endsection