<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Cart;
use App\User;
use App\Model\Order;
use Illuminate\Http\Request;
use App\Mail\Orders\OrderMail;
use App\Http\Controllers\Controller;
use App\Mail\Orders\ShopperMail;
use Illuminate\Support\Facades\Mail;

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
                'approver_notes' => ""

            ];

            // get approver email address
            $a_email = User::where('id', $request->approver_id)->first();
            // get approver email address
            $shopper_email = auth()->user()->email;

            $approver_email = $a_email->email;

            $order = Order::create($input);

            // // mail to approver
            Mail::to($approver_email)
                ->send(new
                    OrderMail($order));

            // // mail to shopper
            Mail::to($shopper_email)
                ->send(new
                    ShopperMail($order));
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
    public function show(Order $order)
    {
        //
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
}