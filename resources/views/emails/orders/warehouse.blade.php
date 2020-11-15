@component('mail::message')
# Introduction

<p> <strong> Account </strong> # {{$order->accountNumber->account_no}} </p>
<p> <strong> Project Number</strong> # {{$order->projectNumber->project_number}}</p>
<p> <strong> Purchase Quantity </strong> {{$order->purchase_qty}}</p>
<p> <strong> Purchase Total</strong> {{ $order->purchase_total }}</p>
<p> <strong> Shopper Name </strong> {{$order->shopper->name}}</p>
<p> <strong> Approver Name</strong> {{$order->approver->name}}</p>
<p> <strong> Date Needed </strong> {{$order->date_needed}}</p>




Thanks,<br>
<h4>Irvine Store</h4>
@endcomponent
