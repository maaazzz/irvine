<?php

namespace App\Http\Controllers;

use Cart;
use App\User;
use App\Model\Location;
use App\Model\Inventory;
use App\Model\AccountNumber;
use App\Model\Justification;
use App\Model\ProjectNumber;
use Illuminate\Http\Request;

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
        $locations = Location::all();
        $acc_numbers = AccountNumber::all();
        $project_numbers = ProjectNumber::all();
        // for approver role = 2
        $approvers = User::where('role', 2)
            ->get();
        $justifications = Justification::all();
        $cart = Cart::getContent();
<<<<<<< HEAD

        // dd($cart);
        return view('front-end.cart', compact('cart'));
=======
        return view('front-end.cart', compact('cart', 'locations', 'acc_numbers', 'project_numbers', 'approvers', 'justifications'));
>>>>>>> df009040ec415f386736b0a46ca2bd38ce00a883
    }
}