@extends('layouts.app')
@section('title', 'ログイン')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endsection

@section('header')
    @include('partials.header_auth')
@endsection

@section('content')
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    <form class="form-container" method="POST" action="/login">
        @csrf
        <div class="form__block">
            <h1 class="form__title">ログイン</h1>
        </div>

        <div class="form__block">
            <div class="form__group">
                <label for="email" class="form__label">メールアドレス</label>
                <input id="email" class="form__input" name="email" value="{{ old('email') }}">
            </div>
            <div class="form__group">
                <label for="password" class="form__label">パスワード</label>
                <input id="password" class="form__input" name="password">
            </div>
        </div>

        <div class="form__block">
            <div class="form__group">
                <button type="submit" class="form__login-button">ログインする</button>
            </div>
            <div class="form__group">
                <a href="/register" class="form__register-link">会員登録はこちら</a>
            </div>
        </div>
    </form>
@endsection