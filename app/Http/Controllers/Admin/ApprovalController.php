<?php

namespace App\Http\Controllers\Admin;

use App\Model\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApprovalController extends Controller
{
    public function index()
    {
        $approvals = Order::where('approver_id', auth()->user()->id)
            ->get();
        return view('admin.approvals-mgt.approvals', compact('approvals'));
    }

    public function approved(Request $request, $id)
    {
        $order = Order::where('id', $id)->first();
        $order->status = 1;
        // dd($order);
        $order->update();
        return back()->with('success', 'Approved successfully');
    }
}