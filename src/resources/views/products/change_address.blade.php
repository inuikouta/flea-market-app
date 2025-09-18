@extends('layouts.app')
@section('title', '送付先住所変更')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/products/change_address.css') }}?v={{ filemtime(public_path('css/products/change_address.css')) }}">
@endsection

@section('header')
    @include('partials.header')
@endsection

@section('content')
<div class="container">
    <h1 class="container__title">住所の変更</h1>
    <form action="{{ route('products.change_address.update', ['item_id' => $item_id ]) }}" class="container__form" method="post">
        @csrf
        <div class="form-group">
            <label for="postal_code" class="form-group__label">郵便番号</label>
            <input type="text" id="postal_code" name="postal_code" class="form-group__input" value="{{ $address['postal_code'] }}">
        </div>
        <div class="form-group">
            <label for="address" class="form-group__label">住所</label>
            <input type="text" id="address" name="address" class="form-group__input" value="{{ $address['address'] }}">
        </div>
        <div class="form-group">
            <label for="building_name" class="form-group__label">建物名</label>
            <input type="text" id="" name="building_name" class="form-group__input" value="{{ $address['building_name'] }}">
        </div>
        <button type="submit" class="form-group__submit-btn">変更する</button>
    </form>
</div>
@endsection