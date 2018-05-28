@extends('layouts.admin-master')

@section('styles')
    <link rel="stylesheet" href="{{ URL::to('css/form.css') }}" type="text/css"/>
@endsection

@section('content')
    <div class="container">
        @include('includes.info-box')
        <form action="{{ route('admin.shop.product.update') }}" method="post">
            <div class="input-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" {{ $errors->has('name') ? 'class=has-error' : '' }} value="{{ Request::old('name') ? Request::old('name') : isset($product) ? $product->name : '' }}"/>
            </div>
            <div class="input-group">
                <label for="price">Price</label>
                <input type="text" name="price" id="price" {{ $errors->has('price') ? 'class=has-error' : '' }} value="{{ Request::old('price') ? Request::old('price') : isset($product) ? $product->price : ''}}"/>
            </div>
            <div class="input-group">
                <label for="quantity">Quantity</label>
                <input type="text" name="quantity" id="quantity" {{ $errors->has('quantity') ? 'class=has-error' : '' }} value="{{ Request::old('quantity') ? Request::old('quantity') : isset($product) ? $product->quantity : ''}}"/>
            </div>
            <button type="submit" class="btn">Save Product</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}" />
            <input type="hidden" name="product_id" value="{{$product->id}}" />
        </form>
    </div>
@endsection

