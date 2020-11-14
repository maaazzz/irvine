<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
=======
use Cart;
use App\Model\Inventory;
>>>>>>> 0b128b14cb19db4db1ed20867853def8441a2c49

class FrontendController extends Controller
{
    //

    public function index()
    {
<<<<<<< HEAD
        return view('front-end.shop');
=======
        $cart = Cart::getContent();
        $products = Inventory::all();
        return view('front-end.shop', compact('cart', 'products'));
>>>>>>> 0b128b14cb19db4db1ed20867853def8441a2c49
    }




    public function cart()
    {
<<<<<<< HEAD
        return view('front-end.cart');
=======
        $cart = Cart::getContent();
        return view('front-end.cart', compact('cart'));
>>>>>>> 0b128b14cb19db4db1ed20867853def8441a2c49
    }
}
