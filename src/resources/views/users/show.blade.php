@extends('layouts.app')
@section('title', 'プロフィール画面')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/users/show.css') }}?v={{ filemtime(public_path('css/users/show.css')) }}">
@endsection

@section('header')
    @include('partials.header')
@endsection

@section('content')
<div class="container__top">
    <img class="container__top-img" src="https://placehold.co/600x600">
    <h1 class="container__top-name">ユーザー名</h1>
    <a href="/mypage/profile" class="container__top-btn">プロフィールを編集</a>
</div>
<div class="product__tabs">
    <div class="product__tabs__tab-buttons">
        <button class="product__tabs__tab-button product__tabs__tab-button--active" data-tab="listing">
            <span class="product__tabs__tab-button__text">出品した商品</span>
        </button>
        <button class="product__tabs__tab-button" data-tab="purchase">
            <span class="product__tabs__tab-button__text">購入した商品</span>
        </button>
    </div>
</div>
<!-- 出品した商品 -->
<div id="listing-products" class="product__tab-content product__tab-content--active">
    @for($i = 0; $i < 10; $i++)
    <a href="{{ url('/item/' . $i) }}" class="product-group">
        <div class="product-group__image">
            <img src="https://placehold.co/300x300" alt="製品Aの外観写真（ダミー）">
        </div>
        <p class="product-group__name">テスト</p>
    </a>
    @endfor
</div>
<!-- 購入した商品 -->
<div id="purchase-products" class="product__tab-content">
    @for($i = 0; $i < 10; $i++)
    <a href="#" class="product-group">
        <div class="product-group__image">
            <img src="https://placehold.co/300x300" alt="製品Aの外観写真（ダミー）">
        </div>
        <p class="product-group__name">マカロニサラダ</p>
    </a>
    @endfor
</div>
@endsection

@section('js')
{{-- <script src="{{ asset('js/users/show.js') }}?v={{ filemtime(public_path('js/users/show.js')) }}"></script> --}}
@endsection