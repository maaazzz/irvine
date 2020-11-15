@extends('front-end.layouts.shop')


@section('content')


		<!-- Main -->
        <main class="main">
            <div class="container-fluid">
                <h5 class="page-title">Order History</h5>

                <div class="filter-box row">
                    <div class="col-md-6">
                        <div class="search-bar input-group mr-3">
                            <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-input" />
                            <div class="input-group-append">
                                <button class="small-btn btn" type="button" id="search-input"><i class="icon fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="filter-btns text-md-right">
                            <ul class="list-inline m-0">
                                <li class="list-inline-item">
                                    <a href="#" class="btn"><i class="fas fa-upload"></i>Export</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="btn"><i class="fas fa-sync-alt"></i>Refresh Data</a>
                                </li>
                            </ul>
                        </div>

                        <div class="filter-status text-md-right">
                            <ul class="list-inline d-inline-flex align-items-center m-0">
                                <li class="list-inline-item"><span>Status:</span></li>
                                <li class="list-inline-item">
                                    <a class="d-inline-flex align-items-center" href="#"><span class="stat-dot stat-red"></span><span class="stat-name">Submitted</span></a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="d-inline-flex align-items-center" href="#"><span class="stat-dot stat-orange"></span><span class="stat-name">Approved</span></a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="d-inline-flex align-items-center" href="#"><span class="stat-dot stat-green"></span><span class="stat-name">Delivered</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="history-table">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-sm text-center">
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
                                    <button  class="table-link view-btn" id="{{ $order->id }}"><i class="fas fa-shopping-cart"></i></button>
                                        <button class="table-link notes-btn" id="{{ $order->id }}"><i class="far fa-file-alt"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>


        		<!-- Order Modal -->
		<div class="order-modal modal fade" id="orderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
								<p class="order-details productDescription">Mr. Clean Multipurpose Cleaning Solution, Meadows & Rain, 128 Oz. Product available in limited supply. Please place orders ASAP. Product available in limited supply. Please place orders ASAP. Product available in limited supply. Please place orders ASAP. Product available in limited supply. Please place orders ASAP.</p>
							</div>
							<div class="align-self-center mr-2">
								Cost: $<p class="order-cost mb-0 text-nowrap purchaseTotal"></p>
							</div>
							<div class="mr-2">
								<div class="qty-input">
									<label for="">Qty:</label> <p class="productQuantity"></p>
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
		<div class="notes-modal modal fade" id="notesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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