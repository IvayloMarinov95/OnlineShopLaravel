@extends('layouts.admin-master')

@section('styles')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::to('css/categories.css') }}" type="text/css"/>
@endsection

@section('content')
    <div class="container">
        <section id="category-admin">
            <form method="post" action="{{ route('admin.shop.category.create') }}">
            @csrf
                <div class="input-group">
                    <label for="name">Category name</label>
                    <input type="text" name="name" id="name"/>
                    <button type="submit" class="btn">Create Category</button>
                </div>
            </form>
        </section>
        <section class="list">
            @foreach($categories as $category)
                <article>
                    <div class="category-info" data-id="{{ $category->id }}">
                        <h3>{{ $category->name }}</h3>
                    </div>
                    <div class="edit">
                        <nav>
                            <ul>
                                <li class="category-edit"><input type="text"/></li>
                                <li><a href="{{ route('admin.shop.category.edit', ['category_id' => $category->id]) }}">Edit</a></li>
                                <li><a href="{{ route('admin.shop.category.delete', ['category_id' => $category->id]) }}" class="danger">Delete</a></li>
                            </ul>
                        </nav>
                    </div>
                </article>
            @endforeach
        </section>
    </div>
@endsection

{{--@section('scripts')
    <script type="text/javascript">
        var token = "{{Session::token()}}";
    </script>
    <script type="text/javascript" src="{{ URL::to('js/categories.js') }}"></script>
@endsection--}}