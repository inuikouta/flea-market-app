@extends('layouts.app')
@section('title', '商品購入')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/products/purchase.css') }}?v={{ filemtime(public_path('css/products/purchase.css')) }}">
@endsection

@section('header')
    @include('partials.header')
@endsection

@section('content')
<div class="purchase-container">
    <div class="container-left">
        <div class="container-left__top-group">
            <a href="https://placehold.co/600x200" data-lightbox="product-image" data-title="商品画像">
                <img src="https://placehold.co/600x200" 
                    class="container-left__image" 
                    alt="商品画像">
            </a>
            <div class="container-left__info">
                <span class="container-left__name">商品名</span>
                <span class="container-left__price">¥10,000</span>
            </div>
        </div>
        <div class="container-left__group">
            <label for="payment-method" class="container-left__label">支払い方法</label>
            <select
                class="container-left__select"
                name="payment-method"
                id="payment-method">
                <option value="" disabled selected>支払い方法を選択してください</option>
                <option value="convenience-store">コンビニ支払い</option>
                <option value="credit-card">クレジットカード</option>
                <option value="bank-transfer">銀行振込</option>
                <option value="cash-on-delivery">代金引換</option>
            </select>
        </div>
        <div class="container-left__group">
            <div class="container-left__header">
                <label class="container-left__label">配送先</label>
                <a href="#" class="container-left__link">変更する</a>
            </div>
            <div class="container-left__address">
                <p class="container-left__address-line">080-1234-5678</p>
                <p class="container-left__address-line">東京都新宿区西新宿2-8-1</p>
            </div>
        </div>
    </div>
    <div class="container-right">
        <table class="purchase-table">
            <tr class="purchase-table__row">
                <td class="purchase-table__label">商品代金</td>
                <td class="purchase-table__value">¥10,000</td>
            </tr>
            <tr class="purchase-table__row">
                <td class="purchase-table__label">支払い方法</td>
                <td class="purchase-table__value">コンビニ支払い</td>
            </tr>
    </table>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/users/purchase.js') }}"></script>
@endsection