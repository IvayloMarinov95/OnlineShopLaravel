<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Order;
use Auth;
use Mail;
use App\Mail\OrderShipped;
use App\Category;
use Session;

class CartController extends Controller
{
    public function getCart(){
        if(!Session::has('cart')){
            return view('cart', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getAddToCart(Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        if(array_key_exists($id, $cart)){
            if($cart->items[$id]['qty'] < $product->quantity){
                $cart->add($product, $product->id);
                $request->session()->put('cart', $cart);
                return redirect()->back();
            } else{
                
            return redirect()->back()->withErrors(['error' => 'Not enough in  stock!']);
            }
        } else{
            $cart->add($product, $product->id);
            $request->session()->put('cart', $cart);
            return redirect()->back();
        }
    }

    public function reduceQuantity(Request $request, $id){
        $product = Product::find($id);
        $cart = Session::get('cart');
        if($cart->items[$id]['qty'] > 1){
            $cart->decrement($product, $product->id);
        } else{
            $this->deleteFromCart($request, $id);
        }
        return redirect()->back();
    }

    public function deleteFromCart(Request $request, $id){
        $product = Product::find($id);
        $cart = Session::get('cart');
        $cart->totalQty -= $cart->items[$id]['qty'];
        $cart->totalPrice -= $product->price;
        unset($cart->items[$id]);
        return redirect()->back();
    }

    public function flushCart(Request $request){
        $request->session()->flush();
        return redirect('/');
    }

    public function postCheckout(Request $request){
        if(!Session::has('cart')){
            return redirect()->route('shop.cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $this->validate($request,[
            'name' => 'required',
            'address' => 'required'
        ]);
        $order = new Order();
        $order->cart = serialize($cart);
        $order->address = $request->input('address');
        $order->name = $request->input('name');
        
        if(Auth::user()){ 
            Auth::user()->orders()->save($order);
            Mail::send(new OrderShipped($order));
            Session::forget('cart');
           
            return redirect()->route('shop.index')->with('success', 'Successfully purchased products!');
            
        } else {
            Session::forget('cart');
            return redirect()->route('shop.index')->with('success', 'Successfully purchased products!');
        }
        

    }
}
