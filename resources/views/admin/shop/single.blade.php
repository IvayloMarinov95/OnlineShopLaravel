@extends('layouts.admin-master')

@section('content')
    <div class="container">
        <section id="post-admin">
            <a href="{{ route('admin.shop.product.edit', ['product_id'=> $product->id]) }}">Edit Post</a>
            <a href="{{ route('admin.shop.product.delete', ['product_id'=> $product->id]) }}">Delete</a>
        </section>
        <section class="post">
            <h1>{{$product->name}}</h1>
            <span class="info">{{$product->price}} | {{$product->quantity}} | {{$product->created_at}}</span>
        </section>
    </div>
    @endsection