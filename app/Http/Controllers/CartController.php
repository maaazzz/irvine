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
        
        return redirect('/');

    }

    public function clearCart()
    {
    	Cart::clear();
    	return redirect('/');
    }

    public function remove($id)
    {
    	Cart::remove($id);
    	return redirect('/cart');
    }

    public function inc($id)
    {
    	Cart::update($id, array(
  			'quantity' => +1, 
		));
		return redirect('/cart');

    }

	public function dec($id)
    {
    	Cart::update($id, array(
  			'quantity' => -1, 
		));
		return redirect('/cart');
    }

}



