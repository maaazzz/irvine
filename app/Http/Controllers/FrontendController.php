<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //

    public function index()
    {
        return view('front-end.shop');
    }




    public function cart()
    {
        return view('front-end.cart');
    }
}
