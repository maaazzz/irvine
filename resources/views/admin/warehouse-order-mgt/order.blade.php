@extends('admin.layouts.app')

@section('content')
@if(Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@section('damger')
@if(Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif

<div class="page-title">
    <h5>Orders</h5>
</div>



<div class="pt-2">
    <table class="table table-bordered table-striped table-sm" id="example">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Order Name</th>
                <th>Location</th>
                <th>Account #</th>
                <th>Project #</th>
                <th>Shopper</th>
                <th>Approver</th>
                <th>Justification</th>
                <th>Purchase Qty</th>
                <th>Purchase Total</th>
                <th>Deliver Type</th>
                <th>Created At</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->inventory->product_name }}</td>
                <td>{{ $order->location->loc_name }}</td>
                <td>{{ $order->accountNumber->account_no }}</td>
                <td>{{ $order->projectNumber->project_number }}</td>
                <td>{{ $order->shopper->name }}</td>
                <td>{{ $order->approver->name }}</td>
                <td>{{ $order->justification->justification }}</td>
                <td>{{ $order->purchase_qty }}</td>
                <td>{{ $order->purchase_total }}</td>
                <td>{{ $order->delivery_type == 0 ? "Warehouse" : 'Delivery to address' }}</td>
                <td>{{ date('d/m/Y',strtotime($order->created_at)) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>




@endsection
