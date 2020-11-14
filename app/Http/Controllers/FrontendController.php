<?php

namespace App\Http\Controllers;

use Cart;
use App\User;
use App\Model\Category;
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
        $products = Inventory::paginate(10);
        $categories = Category::all();
        $locations = Location::all();
        return view('front-end.shop', compact('cart', 'products', 'categories', 'locations'));
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
    public function get_categories_products($id)
    {

        if ($id == 'all') {
            $products = Inventory::all();
        } else {
            $products =  Inventory::where('category_id', $id)->get();
        }

        return view('front-end.filters-products.get-products-by-cat', compact('products'));
    }
    public function get_location_products($id)
    {
        if ($id == 'all') {
            $products = Inventory::all();
        } else {
            $products =  Inventory::where('location_id', $id)->get();
        }

        return view('front-end.filters-products.get-location-products', compact('products'));
    }


    public function product($id)
    {

        $quantity = 0;
        $product = Inventory::find($id);
        $cartItem = Cart::get($product->id);
        if ($cartItem != null) {
            $quantity = $cartItem->quantity;
        }


        return view('front-end.filters-products.get-products-by-cat', compact('products'));
    }
}