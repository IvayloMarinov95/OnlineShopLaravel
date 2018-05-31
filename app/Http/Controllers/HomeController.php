<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\User;
use Session;
use Auth;
use App\Cart;



class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $products = Product::latest()->limit(4)->get();
        $categories = Category::all();
        return view('index',['products' => $products,'categories' => $categories]);
    }

    public function getSearch(){
        $products = Product::latest()->get();
        $categories = Category::all();
        return view('search',['products' => $products,'categories' => $categories]);
    }

    public function getAdminIndex(){
        $products = Product::orderBy('created_at', 'desc')->get();
        $categories = Category::all();
        return view('admin.index', ['products' => $products, 'categories' => $categories]);
    }
    
    public function getAbout(){

        $categories = Category::all();
        return view('about', ['categories' => $categories]);
    }

    public function getSingleProduct($product_id){
        $categories = Category::all();
        $product = Product::find($product_id);
        if(!$product){
            return redirect()->route('shop.index');
        }
        return view('single', ['product' => $product, 'categories' => $categories]);
    }

    public function getProfile($user_id){
        $user = User::find($user_id);
        $categories = Category::all();
        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('profile', [ 'user' => $user, 'categories' => $categories, 'orders' => $orders]);
    }

    public function getProducts($category_id){
        $category = Category::find($category_id);
        return view('products',['category' => $category]);
    }

    public function getCheckout(){
        if(!Session::has('cart')){
            return view('cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('checkout', ['total' => $total, 'products' => $cart->items]);

    }

}
