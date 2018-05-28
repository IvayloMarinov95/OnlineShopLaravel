@extends('layouts.admin-master')

@section('styles')
    <link rel = "stylesheet" href="{{URL::to('css/modal.css')}}" type="text/css"/>
@endsection

@section('content')
    <div>
        @include('includes.info-box')
        <div class="card">
            <header>
                <nav>
                    <ul>
                        <li><a href="{{ route('admin.shop.create_product') }}" class="btn">New Product</a></li>
                        <li><a href="" class="btn">Show all Products</a></li>
                    </ul>
                </nav>
            </header>
            <section>
                <ul>
                    @foreach($products as $product)
                        <li>
                            <article>
                                <div class="post-info">
                                    <h3>{{ $product->name }}</h3>
                                    <span class="info"> {{ $product->price }} | {{ $product->created_at }}</span>
                                </div>
                                <div class="edit">
                                    <ul>
                                        <li><a href="{{ route('admin.shop.single', ['product_id' => $product->id]) }}">View Product</a></li>
                                        <li><a href="{{ route('admin.shop.product.edit', ['product_id' => $product->id]) }}">Edit</a></li>
                                        <li><a href="{{ route('admin.shop.product.delete', ['product_id' => $product->id]) }}" class="danger">Delete</a></li>
                                    </ul>
                                </div>
                            </article>
                        </li>
                    @endforeach
                </ul> 
            </section>
        </div>
    </div>
    <div class="modal" id="contact-message-info">
        <button class="btn" id="modal-close">Close</button>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        var token = "{{ Session::token() }}";
    </script>
    <script type="text/javascript" src="{{ URL::to('js/modal.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/contact_messages.js') }}"></script>
@endsection