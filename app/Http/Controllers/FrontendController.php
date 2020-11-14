<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Model\Inventory;

class FrontendController extends Controller
{
    //

    public function index()
    {
        $cart = Cart::getContent();
        $products = Inventory::all();
        return view('front-end.shop', compact('cart', 'products'));
    }




    public function cart()
    {
        $cart = Cart::getContent();

        // dd($cart);
        return view('front-end.cart', compact('cart'));
    }
}
