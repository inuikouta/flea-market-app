@extends('layouts.app')
@section('title', '商品一覧画面')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endsection

@section('header')
    @include('partials.header')
@endsection

@section('content')
<div class="product-tabs">
    <div class="tab-buttons">
        <button class="tab-button active" onclick="showTab('recommended')">
            おすすめ
        </button>
        <button class="tab-button" onclick="showTab('my-list')">
            マイリスト
        </button>
    </div>

    <div class="products-grid">
        <div id="recommended-products" class="tab-content active">
            <!-- おすすめ商品 -->
        </div>
        <div id="my-list-products" class="tab-content">
            <!-- マイリスト商品 -->
        </div>
    </div>
</div>
@endsection

@section('js')
<script>

</script>
@endsection