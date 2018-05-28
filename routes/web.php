<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'uses' => 'HomeController@getIndex',
    'as' => 'shop.index'
]);

Route::get('/user/verify/{token}', [
    'uses' => 'RegisterController@verifyUser'
]);

Route::get('/profile/{user_id}',[
    'uses' => 'HomeController@getProfile',
    'as' => 'shop.profile'
]);

Route::get('/single/{product_id}', [
    'uses' => 'HomeController@getSingleProduct',
    'as' => 'shop.single'
]);


Route::get('/about', [
    'uses' => 'HomeController@getAbout',
    'as' => 'shop.about'
]);

Route::get('/{category_id}/products', [
    'uses' => 'HomeController@getProducts',
    'as' => 'shop.products'
]);

Route::get('/cart', [
    'uses' => 'CartController@getCart',
    'as' => 'shop.cart'
]);

Route::get('/checkout',[
    'uses' => 'HomeController@getCheckout',
    'as' => 'shop.checkout'
]);

Route::post('/checkout', [
    'uses' => 'CartController@postCheckout',
    'as' => 'shop.order'
]);

Route::post('/add-to-cart/{id}', [
    'uses' => 'CartController@getAddToCart',
    'as' => 'shop.addToCart'
]);

Route::post('/reduce-quantity/{id}', [
    'uses' => 'CartController@reduceQuantity',
    'as' => 'shop.reduceQuantity'
]);

Route::get('/forget', function(){
    Session::flush();
});

Route::post('/flush-cart',[
    'uses' => 'CartController@flushCart',
    'as' => 'shop.flushCart'
]);

Route::post('/delete-from-cart/{id}', [
    'uses' => 'CartController@deleteFromCart',
    'as' => 'shop.deleteFromCart'
]);

Route::group([
    'prefix' => 'admin',
    'middleware' => 'admin'
], function(){
   Route::get('/', [
        'uses' => 'HomeController@getAdminIndex',
        'as' => 'admin.index'
    ]);

    Route::get('/shop/products', [
        'uses' => 'ProductController@getProductIndex',
        'as' => 'admin.shop.index'
    ]);

    Route::get('/shop/categories', [
        'uses' => 'CategoryController@getCategoryIndex',
        'as' => 'admin.shop.categories'
    ]);

    Route::post('/shop/categories/create',[
        'uses' => 'CategoryController@postCreateCategory',
        'as' => 'admin.shop.category.create'
    ]);

    Route::get('/shop/product/{product_id}', [
        'uses' => 'ProductController@getSingleProduct',
        'as' => 'admin.shop.single'
    ]);

    Route::get('/shop/products/create', [
        'uses' => 'ProductController@getCreateProduct',
        'as' => 'admin.shop.create_product'
    ]);

    Route::post('/shop/product/create', [
        'uses' => 'ProductController@postCreateProduct',
        'as' => 'admin.shop.product.create'
    ]);

    Route::get('/shop/product/{product_id}/edit', [
        'uses' => 'ProductController@getUpdateProduct',
        'as' => 'admin.shop.product.edit'
    ]);

    Route::get('/shop/categories/{category_id}/edit', [
        'uses' => 'CategoryController@getUpdateCategory',
        'as' => 'admin.shop.category.edit'
    ]);

    Route::post('/shop/product/update',[
        'uses' => 'ProductController@postUpdateProduct',
        'as' => 'admin.shop.product.update'
    ]);

    Route::post('/shop/categories/update', [
        'uses' => 'CategoryController@postUpdateCategory',
        'as' => 'admin.shop.category.update'
    ]);

    Route::get('/shop/product/{prudct_id}/delete',[
        'uses' => 'ProductController@getDeleteProduct',
        'as' => 'admin.shop.product.delete'
    ]);

    Route::get('/shop/category/{category_id}/delete', [
        'uses' => 'CategoryController@getDeleteCategory',
        'as' => 'admin.shop.category.delete'
    ]);

    Route::get('/logout', [
        'uses' => 'UserController@getLogout',
        'as' => 'admin.logout'
    ]);
});


Auth::routes();
