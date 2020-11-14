<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Model\Inventory;

class CartController extends Controller
{
    //

    public function addToCart($id)
    {
        return $product = Inventory::find($Id);

    }
}
