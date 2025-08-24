@extends('layouts.app')
@section('title', '商品詳細')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/products/show.css') }}?v=3">
@endsection

@section('header')
    @include('partials.header')
@endsection

<?php
$categories = [
    'electronics' => '洋服',
    'fashion' => 'メンズ',
    'home' => 'レディース',
];

$comments = [
    ['user' => 'ヌイ', 'text' => 'こんにちは、売っていますか？またはこれとか売っていますか？教えてください', 'date' => '5ヶ月前'],
    ['user' => 'ユーザー2', 'text' => 'はい、まだありますよ！', 'date' => '4ヶ月前'],
];
?>

@section('content')
<div class="product-container">
    <div class="product-container__left">
        <!-- 左カラム（商品画像など） -->
        <img src="https://placehold.co/600x600" class="product-image">
    </div>
    <div class="product-container__right">
        <!-- 右カラム（商品情報など） -->
        <div class="product-container__info">
            <h1 class="product-container__name">商品名</h1>
            <div class="product-container__brand">ブランド名</div>
            <div class="product-container__price">
                ¥<span class="product-container__price-value">10,000</span>（税込）
            </div>
            <!-- お気に入り、コメント -->
            <div class="product-container__sub-actions">
                <button class="product-container__favorite-btn">
                    <img src="{{ asset('images/products/icon/favorite-icon.png') }}" alt="お気に入り" class="product-container__favorite-icon">
                    <span class="product-container__favorite-count">2</span>
                </button>
                <button class="product-container__comment-btn">
                    <img src="{{ asset('images/products/icon/comment-icon.png') }}" alt="コメント" class="product-container__comment-icon">
                    <span class="product-container__comment-count">1</span>
                </button>
            </div>
        </div>
       <div class="product-container__actions">
            <a
                class="product-container__buy-btn"
                href="{{ route('products.purchase', ['item_id' => $item_id ]) }}">
                購入する
            </a>
        </div>
        <div class="product-description">
            <h2 class="product-description__title">商品説明</h2>
            <p class="product-description__text">
                この商品は高品質な素材を使用して作られており、
                日常使いにも特別な場面にも適しています。
                <br>
                <br>
                カラー: レッド
            </p>
        </div>
        <div class="product-info">
            <h2 class="product-info__title">商品情報</h2>
            <div class="product-info__group">
                <span class="product-info__group-label">カテゴリー</span>
                <div class="product-info__categories">
                    @foreach($categories as $key => $category)
                        <span class="product-info__category">{{ $category }}</span>
                    @endforeach
                </div>
            </div>
            <div class="product-info__group">
                <span class="product-info__group-label">商品の状態</span>
                <span class="product-info__situation">テスト</span>
            </div>
        </div>
        <div class="product-comment">
            <h2 class="product-comment__title">コメント（１）</h2>
            @auth
            <div class="product-comment__user">
                <img class="product-comment__img" src="https://placehold.co/600x600">
                <span class="product-comment__user-name">admin</span>
            </div>
            @endauth

            @guest
            <img class="product-comment__img" src="https://placehold.co/600x600">
            <span class="product-comment__user-name">admin</span>
            @endguest
            <div class="product-comment__comments">
                @foreach($comments as $comment)
                    <div class="product-comment__comment">
                        <img class="product-comment__img" src="https://placehold.co/600x600">
                        <div class="product-comment__comment-right">
                            <span class="product-comment__comment-user">{{ $comment['user'] }}</span>
                            <div class="product-comment__comment-content">
                                <span class="product-comment__comment-text">{{ $comment['text'] }}</span>
                                <span class="product-comment__comment-date">{{ $comment['date'] }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <h2 class="product-comment__sub-title">商品へのコメント</h2>
            @auth
            <form class="product-comment__form" action="#" method="POST">
                @csrf
                <div class="product-comment__input-group">
                    <textarea
                        class="product-comment__textarea"
                        name="comment"
                        placeholder="商品へのコメント"
                        required></textarea>
                </div>
                <button class="product-comment__submit-btn" type="submit">
                    コメントを送信する
                </button>
            </form>
            @endauth

            @guest
            <p class="product-comment__login-message">
                コメントするには<a href="#">ログイン</a>が必要です
            </p>
            @endguest
        </div>
    </div>
</div>
@endsection