<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    
    public function getProductIndex(){
        $products = Product::orderBy('created_at','desc')->get();
        return view('admin.shop.index', ['products'=> $products]);
    }

    public function getSingleProduct($product_id){
        $product = Product::find($product_id);
        if(!$product){
            return redirect()->route('admin.shop.index');
        }
        return view('admin.shop.single', ['product' => $product]);
    }

    public function getCreateProduct(){
        $categories = Category::all();
        return view('admin.shop.create_product', ['categories' => $categories]);
    }

    public function postCreateProduct(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);
        $product = new Product();
        $product->name = $request['name'];
        $product->price = $request['price'];
        $product->quantity = $request['quantity'];
        $product->category_id = $request['category'];
        $product->save();
        return redirect()->route('admin.shop.index');
    }

    public function getUpdateProduct($product_id){
        $product = Product::find($product_id);
        return view('admin.shop.edit_product', ['product' => $product]);
    }

    public function  postUpdateProduct(Request  $request){
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required'
        ]);
        $product =Product::find($request['product_id']);
        $product->name = $request['name'];
        $product->price = $request['price'];
        $product->quantity = $request['quantity'];
        $product->update();
        return redirect()->route('admin.shop.index');
    }

    public function getDeleteProduct($product_id){
        $product = Product::find($product_id);
        if(!$product){
            return redirect()->route('shop.index');
        }
        $product->delete();
        return redirect()->route('admin.shop.index');
    }
}
