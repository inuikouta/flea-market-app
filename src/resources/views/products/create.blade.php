@extends('layouts.app')
@section('title', '商品出品')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/products/create.css') }}?v=2">
@endsection

@section('header')
    @include('partials.header')
@endsection

<?php
$categorys = [
    '1' => 'ファッション',
    '2' => '家電',
    '3' => 'インテリア',
    '4' => 'レディース',
    '5' => 'メンズ',
    '6' => 'コスメ',
    '7' => '本',
    '8' => 'ゲーム',
    '9' => 'スポーツ',
    '10' => 'キッチン',
    '11' => 'ハンドメイド',
    '12' => 'アクセサリー',
    '13' => 'おもちゃ',
    '14' => 'ベビー・キッズ',
];
?>

@section('content')
<div class="product-create">
    {{-- タイトル --}}
    <div class='product-create__top'>
        <h1 class='product-create__title-h1'>商品の出品</h1>
    </div>
    {{-- 出品フォーム --}}
    <form action="" method="post" class='product-create__form'>
        {{-- CSRFトークン --}}
        @csrf
        {{-- 商品画像 --}}
        <div class='product-create__image'>
            <h3 class="product-create__form-title">商品画像</h3>
            <div class='product-create__image-wrapper'>
                {{-- 画像プレビュー --}}
                <img id="previewImage" class='previewImage'>
                <label for="image-input" class='product-create__image-label'>画像を選択する</label>
                <input type="file" id="image-input" name="product-image" class='product-create__image-input' accept="image/*">
            </div>
        </div>
        <div class='product-create__title'>
            <h2 class="product-create__title-h2">商品の詳細</h2>
        </div>
        <div class="product-create__form-group">
            <h3 for="name" class='product-create__form-title'>カテゴリー</h3>
            <div class='category__form-item'>
                @foreach($categorys as $key => $value)
                    @if($loop->index > 0 && $loop->index % 6 == 0)
                        </div><div class='category__form-item'>
                    @endif
                    <input type="checkbox" id="category-{{ $key }}" name="category[]" value="{{ $key }}" class='product-create__form-checkbox'>
                    <label for="category-{{ $key }}" class='category__form-label'>{{ $value }}</label>
                @endforeach

                {{-- 最後の行を6個にするためのダミー要素 --}}
                @php
                    $remainder = count($categorys) % 6;
                    $dummyCount = $remainder > 0 ? 6 - $remainder : 0;
                @endphp
                {{-- ダミー要素を追加 --}}
                @for($i = 0; $i < $dummyCount; $i++)
                    <span class='category__form-dummy'>　　　　</span>
                @endfor
            </div>
        </div>
        <div class="product-create__form-group">
            <h3 for="name" class='product-create__form-title'>商品の状態</h3>
            <label class="selectbox-3">
                <select>
                    <option>optionの例1</option>
                    <option>optionの例2</option>
                    <option>optionの例3</option>
                </select>
            </label>
        </div>
        <div class='product-create__title'>
            <h2 class="product-create__title-h2">商品名と説明</h2>
        </div>
        <div class="product-create__form-group">
            <h3 for="name" class='product-create__form-title'>商品名</h3>
            <input type="text" id="product-name" name="product-name" class='product-create__form-input'>
        </div>
        <div class="product-create__form-group">
            <h3 for="name" class='product-create__form-title'>ブランド名</h3>
            <input type="text" id="product-brand" name="product-brand" class='product-create__form-input'>
        </div>
        <div class="product-create__form-group">
            <h3 for="name" class='product-create__form-title'>商品の説明</h3>
            <textarea type="text" id="product-explanation" name="product-explanation" class='product-create__form-textarea'></textarea>
        </div>
        <div class="product-create__form-group">
            <h3 for="name" class='product-create__form-title'>販売価格</h3>
            <input type="text" id="product-price" name="product-price" class='product-create__form-input'>
        </div>
        <div class="product-create__buttons">
            <button type="submit" class='product-create__form-submit'>出品する</button>
        </div>
    </form>
</div>
@endsection

@section('js')
    <script src="{{ asset('js/products/create.js') }}"></script>
@endsection