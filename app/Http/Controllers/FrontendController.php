<?php

namespace App\Http\Controllers;

use Cart;
use App\User;
use App\Model\Location;
use App\Model\Inventory;
use App\Model\AccountNumber;
use App\Model\Justification;
use App\Model\ProjectNumber;
use App\Model\Order;
use App\Favorite;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //

    public function index()
    {
        $products = Inventory::paginate(20);
        return view('front-end.shop', compact('products'));
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
        $cart = Cart::getContent()->sort();
        return view('front-end.cart', compact('cart', 'locations', 'acc_numbers', 'project_numbers', 'approvers', 'justifications'));
    }



    public function product($id)
    {
        
        $quantity=0;
        $product = Inventory::find($id);
        $cartItem = Cart::get($product->id);
        
        if($cartItem != null){
            $quantity = $cartItem->quantity;
        }
       

        return view('front-end.product', compact('product', 'quantity'));
    }


    
    public function orders()
    {
        $shopperId =  auth()->user()->id;
       $orders = Order::where('shopper_id', $shopperId)->with('location', 'projectNumber', 'accountNumber', 'approver', 'justification')->get();
        return view('front-end.orderHistory', compact('orders'));
    }

    public function addToFev($id)
    {
        Favorite::create([
            'inventory_id'=>$id,
            'user_id' => auth()->user()->id
        ]);

        return response()->json('Product Is Into Fevorites');

    }



}