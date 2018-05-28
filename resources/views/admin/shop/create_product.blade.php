@extends('layouts.admin-master')

@section('styles')
    <link rel="stylesheet" href="{{ URL::to('css/form.css') }}" type="text/css"/>
@endsection

@section('content')
    <div class="container">
        @include('includes.info-box')
        <form  method="post" action = "{{route('admin.shop.product.create')}}">
            <div class="input-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" {{ $errors->has('name') ? 'class=has-error' : '' }} value="{{ Request::old('name') }}"/>
            </div>
            <div class="input-group">
                <label for="price">Price</label>
                <input type="text" name="price" id="price" {{ $errors->has('price') ? 'class=has-error' : '' }} value="{{ Request::old('price') }}"/>
            </div>
            <div class="input-group">
                <label for="quantity">Quantity</label>
                <input type="text" name="quantity" id="quantity" {{ $errors->has('quantity') ? 'class=has-error' : '' }} value="{{ Request::old('quantity') }}"/>
            </div>
            <div class="input-group">
                <label for="category">Category</label>
                <select name="category" id="category">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{$category->name }}</option>
                    @endforeach
                </select>
                <input type="hidden" name="categories" id="categories">
            </div>
            <button type="submit" class="btn">Create Product</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}" />
        </form>
    </div>
@endsection

{{--@section('scripts')
    <script type="text/javascript" src="{{ URL::to('js/posts.js') }}"></script>
@endsection--}}