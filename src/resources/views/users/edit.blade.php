@extends('layouts.app')

@section('title', 'プロフィール編集設定')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/users/edit.css') }}">
@endsection

@section('header')
    @include('partials.header_auth')
@endsection

@section('content')
<form class="form-container" method="POST" action="/?tab=mylist">
    @csrf
    <div class="form__block">
        <h1 class="form__title">プロフィール設定</h1>
    </div>

    <div class="form__block display-flex">
        <div class="circle-preview">
            <img id="previewImage" src="{{ asset('images/users/default.png') }}">
        </div>
        <input type="file" id="profileImage" class="form__image__input" name="profile-image" accept="image/*">
        <label for="profileImage" class="form__image__label">画像を選択する</label>
    </div>

    <div class="form__block">
        <div class="form__group">
            <label for="user-name" class="form__label">ユーザ名</label>
            <input id="user-name" class="form__input" name='user-name' value="{{ old('email') }}">
        </div>
        <div class="form__group">
            <label for="post-code" class="form__label">郵便番号</label>
            <input id="post-code" class="form__input" name="post-code">
        </div>
        <div class="form__group">
            <label for="address" class="form__label">住所</label>
            <input id="address" class="form__input" name="address">
        </div>
        <div class="form__group">
            <label for="building" class="form__label">建物名</label>
            <input id="building" class="form__input" name="building">
        </div>
    </div>

    <div class="form__block">
        <div class="form__group">
            <button type="submit" class="form__update-button">更新する</button>
        </div>
    </div>
</form>
@endsection

@section('js')
    <script src="{{ asset('js/users/edit.js') }}"></script>
@endsection