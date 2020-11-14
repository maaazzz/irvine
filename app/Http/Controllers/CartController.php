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

        $product = Inventory::find($id);

        $add = Cart::add([
    		'id' => $product->id,
    		'name' => $product->product_name,
    		'price' => $product->price,
 			'quantity' => 1,
 			'attributes' => [
                        'description'=> $product->description,
                        'available_quantity'=> $product->quantity_oh,
			            'img'=> $product->image,
                        
			            
            ]
        ]);

        return back()->with('success', "Item Added Into Cart");

    }

    public function clearCart()
    {
        Cart::clear();
        return back()->with('success', "Cart Cleared");
    }

    public function remove($id)
    {
        Cart::remove($id);
        return back()->with('success', "Item Removed From Cart");
    }

    public function inc($id)
    {
    	Cart::update($id, array(
  			'quantity' => +1, 
		));
		return back()->with('success', "Item Quantity Updated");
    }

	public function dec($id)
    {
    	Cart::update($id, array(
  			'quantity' => -1, 
		));
		return back()->with('success', "Item Quantity Updated");
    }

}



