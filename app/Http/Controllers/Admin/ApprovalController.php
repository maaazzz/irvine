<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Model\Order;
use App\Model\Location;
use App\Mail\ApprovalMail;
use Illuminate\Http\Request;
use App\Mail\WarehouseMailMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ApprovalController extends Controller
{
    public function index()
    {
        $approver_id = auth()->user()->id;
        // dd($approver_id);
        $approvals = Order::where('approver_id', $approver_id)
            ->paginate(10);
        // dd($approvals);
        return view('admin.approvals-mgt.approvals', compact('approvals'));
    }

    public function approved(Request $request, $id)
    {
        $url = request()->url();
        // get id of shopper and warehouse
        $shoper_id = $request->shopper_id;
        $warehouse_id = $request->location_id;
        // dd($warehouse_id);
        // find ids
        $shopper = User::where('id', $shoper_id)->first();
        $warehouse = Location::where('id', $warehouse_id)->first();

        // find emails of approval and
        $shopper_email = $shopper->email;
        $warehouse_email = $warehouse->email;


        $order = Order::where('id', $id)->first();

        $user = $order->approver_id;

        // update status
        $order->status = 1;
        $order->update();

        // // mail to shopper
        // Mail::to($shopper_email)
        //     ->send(new
        //         ApprovalMail($user));

        // mail to warehouse
        Mail::to($warehouse_email)
            ->send(new
                WarehouseMailMail($user, $order, $url));

        return back()->with('success', 'Approved successfully');
    }
}