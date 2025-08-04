@extends('layouts.app')

@section('title', 'プロフィール編集設定')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/users/edit.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection

@section('header')
    @include('partials.header_auth')
@endsection

@section('content')
<form class="form-container" method="POST" action="/mypage/profile" enctype="multipart/form-data">
    @csrf
    <div class="form__block">
        <h1 class="form__title">プロフィール設定</h1>
    </div>

    <div class="form__block">
        {{-- 画像 --}}
        <div class='form__group display-flex'>
            <div class="circle-preview">
                <img id="previewImage" src="{{ $user->image_path ?? asset('images/users/default.png') }}">
            </div>
            <input type="file" id="profileImage" class="form__image__input" name="profile-image" accept="image/*">
            {{-- 画像選択ボタン --}}
            <label for="profileImage" class="form__image__label">画像を選択する</label>
        </div>
        @if($errors->has('profile-image'))
            <span class="form__error">{{ $errors->first('profile-image') }}</span>
        @endif
    </div>
    <div class="form__block">
        {{-- ユーザ名 --}}
        <div class="form__group">
            {{-- エラーの場合は、ブートストラップのクラスを使用して、エラーメッセージを表示します --}}
            <label for="user-name" class="form__label">ユーザ名</label>
            <input id="user-name" class="form__input {{ $errors->has('user-name') ? ' form__input--invalid' : '' }}" name="user-name" value="{{ old('user-name', $user->name) }}">
            @if($errors->has('user-name'))
                <span class="form__error">{{ $errors->first('user-name') }}</span>
            @endif
        </div>
        {{-- 郵便番号 --}}
        <div class="form__group">
            <label for="post-code" class="form__label">郵便番号</label>
            <input id="post-code" class="form__input {{ $errors->has('post-code') ? ' form__input--invalid' : '' }}" name="post-code" value="{{ old('post-code', $user->postal_code) }}">
            @if($errors->has('post-code'))
                <span class="form__error">{{ $errors->first('post-code') }}</span>
            @endif
        </div>
        {{-- 住所 --}}
        <div class="form__group">
            <label for="address" class="form__label">住所</label>
            <input id="address" class="form__input {{ $errors->has('address') ? ' form__input--invalid' : '' }}" name="address" value="{{ old('address', $user->address) }}">
            @if($errors->has('address'))
                <span class="form__error">{{ $errors->first('address') }}</span>
            @endif
        </div>
        {{-- 建物名 --}}
        <div class="form__group">
            <label for="building" class="form__label">建物名</label>
            <input id="building" class="form__input {{ $errors->has('building') ? ' form__input--invalid' : '' }}" name="building" value="{{ old('building', $user->building_name) }}">
            @if($errors->has('building'))
                <span class="form__error">{{ $errors->first('building') }}</span>
            @endif
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