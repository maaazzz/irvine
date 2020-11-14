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
}