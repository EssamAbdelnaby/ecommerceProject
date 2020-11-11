<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function addToCart(Product $product) {

        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = new Cart();
        }
        $cart->add($product);
        //dd($cart);
        session()->put('cart', $cart);
        return redirect()->route('site.home')->with('success', 'Product was added');
    }

    public function showCart() {

        if (session()->has('cart')) {
            $cart = new Cart (session()->get('cart'));
        } else {
            $cart = null;
        }
        //dd($cart);
        return view('site.cart.show', compact('cart'));
    }

    public function checkout($amount) {

        return view('site.cart.checkout',compact('amount'));
    }

    public function destroy(Product $product)
    {
        $cart = new Cart( session()->get('cart'));
        $cart->remove($product->id);

        if( $cart->totalQty <= 0 ) {
            session()->forget('cart');
        } else {
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.show')->with('success', 'Product was removed');

    }

}
