@extends('front-end.layouts.shop')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://editor.datatables.net/extensions/Editor/css/editor.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.5.2/css/colReorder.dataTables.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<style>
    button.dt-button,
    div.dt-button,
    a.dt-button,
    input.dt-button {
        border-color: #00acd5 !important;
        background-color: #00acd5 !important;
        color: #fff !important;
        border-right: #fff !important;

    }

    .ui.basic.button,
    .ui.basic.buttons .buttons-excel {
        border-color: #00acd5 !important;
        background-color: #00acd5 !important;
        color: #fff !important;
        border-right: #fff;
    }

    .ui.basic.button,
    .ui.basic.buttons .buttons-pdf {
        border-color: #00acd5 !important;
        background-color: #00acd5 !important;
        color: #fff !important;
    }

    .ui.basic.button,
    .ui.basic.buttons .buttons-collection {
        border-color: #00acd5 !important;
        background-color: #00acd5 !important;
        color: #fff !important;
    }
</style>

@endsection

@section('content')
<!-- Main -->
<main class="main">
    <div class="container-fluid">
        <h5 class="page-title">Order History</h5>

        <div class="filter-box row">
            <div class="col-md-6">

            </div>

            <div class="col-md-6">

                <div class="filter-status text-md-right">
                    <ul class="list-inline d-inline-flex align-items-center m-0">
                        <li class="list-inline-item"><span>Status:</span></li>
                        <li class="list-inline-item">
                            <a class="d-inline-flex align-items-center" href="#"><span
                                    class="stat-dot stat-red"></span><span class="stat-name">Submitted</span></a>
                        </li>
                        <li class="list-inline-item">
                            <a class="d-inline-flex align-items-center" href="#"><span
                                    class="stat-dot stat-orange"></span><span class="stat-name">Approved</span></a>
                        </li>
                        <li class="list-inline-item">
                            <a class="d-inline-flex align-items-center" href="#"><span
                                    class="stat-dot stat-green"></span><span class="stat-name">Delivered</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="history-table">
            <table class="table table-bordered table-striped table-sm text-center" id="example">
                <thead class="thead-dark">
                    <tr>
                        <th>Status</th>
                        <th>Submitted</th>
                        <th>Needed</th>
                        <th>Location</th>
                        <th>Account #</th>
                        <th>Project</th>
                        <th>Approver</th>
                        <th>Justification</th>
                        <th>Approved</th>
                        <th>Delivered</th>
                        <th>View Order</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>
                            @if($order->status == 2)
                            <span class="stat-dot stat-green"></span>

                            @elseif($order->status == 1)
                            <span class="stat-dot stat-orange"></span>

                            @else
                            <span class="stat-dot stat-red"></span>

                            @endif


                        </td>
                        <td>04/19/2019</td>
                        <td>{{ $order->date_needed }}</td>
                        <td>{{ $order->location->loc_name }}</td>
                        <td>{{ $order->accountNumber->account_no }}</td>
                        <td>{{ $order->projectNumber->project_number }}</td>
                        <td>{{ $order->shopper->name }}</td>
                        <td>{{ $order->justification->justification }}</td>
                        <td>

                            @if($order->approve_date == null)

                            Approval Pending

                            @else
                            {{ $order->approve_date }}

                            @endif



                        </td>
                        <td>

                            @if($order->delivery_date == null)

                            Delivery Pending
                            {{-- {{ $order->inventory->images }} --}}

                            @else
                            {{ $order->delivery_date }}

                            @endif
                        </td>
                        <td class="table-links">
                            <button class="table-link view-btn" id="{{ $order->id }}"><i
                                    class="fas fa-shopping-cart"></i></button>
                            <button class="table-link notes-btn" id="{{ $order->id }}"><i
                                    class="far fa-file-alt"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>


<!-- Order Modal -->
<div class="order-modal modal fade" id="orderModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                <div class="d-flex justify-content-between">
                    <button class="main-btn btn mr-3" type="button">Print</button>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <div class="order-item d-flex">
                    <div class="">
                        <div class="order-img mr-2">
                            <img id="productImg" src="" alt="" />
                        </div>
                    </div>
                    <div class="mr-2">
                        <p class="order-title m-0 productName">Multipurpose Cleaner</p>
                        <p class="order-details productDescription">Mr. Clean Multipurpose Cleaning Solution, Meadows &
                            Rain, 128 Oz. Product available in limited supply. Please place orders ASAP. Product
                            available in limited supply. Please place orders ASAP. Product available in limited supply.
                            Please place orders ASAP. Product available in limited supply. Please place orders ASAP.</p>
                    </div>
                    <div class="align-self-center mr-2">
                        Cost: $<p class="order-cost mb-0 text-nowrap purchaseTotal"></p>
                    </div>
                    <div class="mr-2">
                        <div class="qty-input">
                            <label for="">Qty:</label>
                            <p class="productQuantity"></p>
                            {{-- <select class="custom-select">
										<option value="">1</option>
										<option value="">2</option>
										<option value="">3</option>
									</select> --}}
                        </div>
                    </div>
                    <div class="align-self-center">
                        <button class="btn-link btn" type="button">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Notes Modal -->
<div class="notes-modal modal fade" id="notesModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Notes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 class="">Order Note:</h6>
                <p class="orderNotes"></p>
                <hr />
                <h6 class="">Approval Note:</h6>
                <p class="approverNotes"></p>
                <hr />
                <h6 class="">Delivery Note:</h6>
                <p class="deliveryNotes"></p>
            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/colreorder/1.5.2/js/dataTables.colReorder.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        var table = $('#example').DataTable( {
        dom: 'Bfrtip',
        select: true,
        colReorder: true,
        buttons: [
            {
                extend: 'collection',
                text: 'Export',
                buttons: [
                    'copy',
                    'excel',
                    'csv',
                    'pdf',
                    'print'
                ]
            }
        ]
    } );
        table.buttons().container()
            .appendTo($('div.eight.column:eq(0)', table.table().container()));
    });
</script>

<script>
    $(document).on('click', '.view-btn', function(){

    var viewId = $(this).attr('id');
   $.ajax({
           url: 'order/'+viewId,
           dataType: 'json',
           method: 'GET',
           success:function(data){

               $('#productImg').attr('src','./images/'+ data.inventory.images.split(',')[0]);
               $('.productName').html(data.inventory.product_name);
               $('.productDescription').html(data.inventory.description);
               $('.productQuantity').html(data.purchase_qty);
               $('.purchaseTotal').html(data.purchase_total);
              $('#orderModal').modal('show');

           }
   });

});


$(document).on('click', '.notes-btn', function(){

var noteId = $(this).attr('id');

alert(noteId);
$.ajax({
       url: 'order/'+noteId+'/notes',
       dataType: 'json',
       method: 'GET',
       success:function(data){
        alert(data.pickup_notes);

        $('.orderNotes').html(data.pickup_notes);

        $('.approverNotes').html(data.approver_notes);

        $('.deliveryNotes').html(data.delivery_notes);

          $('#notesModal').modal('show');

       }
});

});
</script>

@endsection
