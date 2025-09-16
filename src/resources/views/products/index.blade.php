@extends('layouts.app')
@section('title', '商品一覧画面')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/products/index.css') }}">
@endsection

@section('header')
    @include('partials.header')
@endsection

@section('content')
<div class="product">
    <div class="product__tabs">
        <div class="product__tabs__tab-buttons">
            <button class="product__tabs__tab-button product__tabs__tab-button--active" data-tab="recommended">
                <span class="product__tabs__tab-button__text">おすすめ</span>
            </button>
            <button class="product__tabs__tab-button" data-tab="my-list">
                <span class="product__tabs__tab-button__text">マイリスト</span>
            </button>
        </div>
    </div>

    <!-- おすすめ商品 -->
    <div id="recommended-products" class="product__tab-content product__tab-content--active">
        @foreach ($products as $product)
        <a href="{{ url('/item/' . $product->id) }}" class="product-group">
            <div class="product-group__image">
                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}の外観写真">
            </div>
            <p class="product-group__name">{{ $product->name }}</p>
        </a>
        @endforeach
    </div>
    <!-- マイリスト商品 -->
    <div id="my-list-products" class="product__tab-content">
        @for($i = 0; $i < 10; $i++)
        <a href="#" class="product-group">
            <div class="product-group__image">
                <img src="https://placehold.co/300x300" alt="製品Aの外観写真（ダミー）">
            </div>
            <p class="product-group__name">マカロニサラダ</p>
        </a>
        @endfor
    </div>
</div>
@endsection

@section('js')
<script>
$(document).ready(function() {
    // タブのクリックイベント
    $('.product__tabs__tab-button').on('click', function() {
        const tabId = $(this).data('tab');

        // 選択中のタブボタンに active クラスを変更
        $('.product__tabs__tab-button').removeClass('product__tabs__tab-button--active');
        $(this).addClass('product__tabs__tab-button--active');

        // 選択中のコンテンツを表示
        $('.product__tab-content').removeClass('product__tab-content--active');
        $('#' + tabId + '-products').addClass('product__tab-content--active');
    });
});
</script>
@endsection