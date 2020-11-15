<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Order;
use Illuminate\Http\Request;
use Auth;
use Cart;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

       foreach (Cart::getContent() as $order) {
                
        $input = [
                'inventory_id' => $order->id,
                'location_id' => $request->location_id,
                'account_number_id' => $request->account_number_id,
                'project_number_id' => $request->project_number_id,
                'shopper_id' => Auth::user()->id,
                'approver_id' => $request->approver_id,
                'justification_id' => $request->justification_id,
                'purchase_qty' => $order->quantity,
                'purchase_total' => Cart::get($order->id)->getPriceSum(),
                'date_needed' => $request->date_needed,
                'delivery_type' => $request->delivery_type,
                'pickup_notes' => $request->pickup_notes,
                'status' => 0,
                'approver_notes' =>""
                
    ];
    
       $order = Order::create($input);
}

    Cart::clear();
    return redirect('/')->with('success', 'Order Place Successfully');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $order = Order::with('inventory')->find($id);
         return response()->json($order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function getNotes($id)
    {
        // echo $id;
        // // echo "it works";
        $notes = Order::find($id);
         return response()->json($notes);
    }
    
}
