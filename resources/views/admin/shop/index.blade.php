@extends('layouts.admin-master')

@section('styles')
    <link rel="stylesheet" href="{{ URL::to('css/form.css') }}" type="text/css"/>
@endsection

@section('content')
    @include('includes.info-box')
    <div class = "container">
        @include('includes.info-box')
        <section id="post-admin">
            <a href="{{ route('admin.shop.create_product') }}" class="btn">New Product</a>
        </section>
    </div>
    <section class="list">
                    @foreach($products as $product)
                            <article>
                                <div class="post-info">
                                    <h3>{{$product->name}}</h3>
                                    <span class="info">{{$product->price}} | {{$product->quantity}} | {{$product->created_at}}</span>
                                </div>
                                <div class="edit">
                                    <nav>
                                        <ul>
                                            <li><a href="{{ route('admin.shop.single', ['product_id' => $product->id]) }}">View Product</a></li>
                                            <li><a href="{{ route('admin.shop.product.edit', ['product_id' => $product->id]) }}">Edit</a></li>
                                            <li><a href="{{ route('admin.shop.product.delete', ['product_id' => $product->id]) }}" class="danger">Delete</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </article>
                    @endforeach
    </section>
        </div>
@endsection