<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Model\Inventory;
use App\model\Category;
use App\model\Location;

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
        $cart = Cart::getContent();
        return view('front-end.cart', compact('cart'));
    }
    public function get_categories_products($id){
        if($id == 'all'){
            $products = Inventory::all();
        }else{
            $products =  Inventory::where('category_id',$id)->get();
        }

        return view('front-end.filters-products.get-products-by-cat',compact('products'));
    }
    public function get_location_products($id){
        if($id == 'all'){
            $products = Inventory::all();
        }else{
            $products =  Inventory::where('location_id',$id)->get();
        }

        return view('front-end.filters-products.get-location-products',compact('products'));
    }
}
