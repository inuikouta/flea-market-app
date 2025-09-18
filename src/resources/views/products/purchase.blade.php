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
            <a href="{{ asset('storage/' . $product->image_path) }}" data-lightbox="product-image" data-title="商品画像">
                <img src="{{ asset('storage/' . $product->image_path) }}" 
                    class="container-left__image" 
                    alt="商品画像">
            </a>
            <div class="container-left__info">
                <span class="container-left__name">{{ $product->name }}</span>
                <span class="container-left__price">¥{{ number_format($product->price) }}</span>
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
                <a href="{{ route('products.change_address', ['item_id' => $item_id ]) }}" id='change-address-link' class="container-left__link">変更する</a>
            </div>
            <div class="container-left__address">
                <p class="container-left__address-line">{{ $address['postal_code'] }}</p>
                <p class="container-left__address-line">{{ $address['address'] }} {{ $address['building_name'] }}</p>
            </div>
        </div>
    </div>
    <div class="container-right">
        <table class="purchase-table">
            <tr class="purchase-table__row">
                <td class="purchase-table__label">商品代金</td>
                <td class="purchase-table__value">¥{{ number_format($product->price) }}</td>
            </tr>
            <tr class="purchase-table__row">
                <td class="purchase-table__label">支払い方法</td>
                <td class="purchase-table__value purchase-table__value--payment">選択してください</td>
            </tr>
        </table>
        <a href="#" id="buy-btn" class="container-right__buy-btn">購入する</a>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/products/purchase.js') }}?v={{ filemtime(public_path('js/products/purchase.js')) }}"></script>
<script>
    const userAddress = {
        postal_code: @json(Auth::user()->postal_code),
        address: @json(Auth::user()->address),
        building_name: @json(Auth::user()->building_name)
    };
</script>
@endsection