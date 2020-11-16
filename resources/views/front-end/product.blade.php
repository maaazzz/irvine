@extends('front-end.layouts.app')

@section('content')

<main class="main">
    <div class="container-fluid">
        @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="">
            <div aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="store.html">Store</a></li>
                    <li class="breadcrumb-item"><a href="#">Cleaning Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All-Purpose Cleaners</li>
                </ol>
            </div>
        </div>

        <div class="">
            <div class="row">
                <div class="col-md-7">
                    <div class="product-gallery d-flex flex-column flex-md-row">

                        <div class="col-md-3 img-list d-flex flex-row flex-md-column justify-content-between">

                            @foreach(explode(',', $product->images) as $p=>$image)
                            <div class="list-img square-box" style="padding:10px;">
                                <div class="img-box">
                                    <img class="img-fluid images-showing" src="{{ asset('/images/'.$image) }}" alt="" />
                                </div>
                            </div>
                            @endforeach

						




                        </div>
                        {{-- @php $images_ = explode(',', $product->images); @endphp --}}
                        <div class="main-img square-box">
                            <div class="img-box">
                                <img class="img-fluid" id="show-image" src="{{asset('/images/'.$product->image)}}" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="product-details d-flex flex-column justify-content-between">
                        <div class="">
                            <div class="title-box">
                                <h5>{{ $product->product_name }}</h5>
                                <p>{{ $product->description}}</p>
                            </div>

                            <div class="product-data">
                                <p class="product-cost">Cost: ${{ $product->price }}</p>
                                <p class="product-qty">Available Qty: {{ $product->quantity_oh }} </p>
                            </div>

                            <div class="product-info">
                                <div class="d-flex flex-wrap align-items-center">
                                    <div class="qty-input">
                                        <label style="padding: 10px;" for="">Qty: {{ $quantity }}</label>
                                   
										

									</div>
									@if($quantity != 0)
									<a class="btn btn-sm d-flex" style="margin: 10px" href="{{ route('cart.dec', $product->id) }}"><i class="fa fa-angle-down"></i></a>
																						
									<a class="btn btn-sm d-flex" style="margin: 10px" href="{{ route('cart.inc', $product->id) }}"><i class="fa fa-angle-up"></i></a>
										
									<a class="btn-link btn" href="{{ route('cart.remove', $product->id) }}"><i class="fa fa-trash"></i></a>
								
									@endif
									


									
			
								<br>
								<div class="">
										
									<a class="yellow-btn main-btn btn my-2 mr-2" href="{{ route('cart.add', $product->id) }}">Add to cart</a>
									<a class="gray-btn main-btn btn my-2 mr-2" href="{{ url('/') }}" type="button">Continue Shopping</a>
									@php $check = $product->favorite()->where('user_id',auth()->id())->first(); @endphp
							
									@if($check)
											  
									  <button class="blue-btn main-btn btn my-2 mr-2" disabled="disabled">Added to Favorites</button>
										  
									  @else
											  
									  <button class="blue-btn main-btn btn my-2 mr-2 .addToFev" data-fav='{{ $product->id }}' id="myFav">Add to Favorite</button>
									  
	  
									  @endif	
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>





@if(count($relateds) != 0)
<main class="main" style="margin-top: 50px">
    <div class="container-fluid">
		<h3 class="heading">Related Product</h3>
		<br>
		<div class="row">
		@foreach($relateds as $related)
		<div class="col-md-3" style="margin-bottom:20px">
			<div class="fav-item d-flex row">
		
				<div class="item-img col-sm-4">
				<a href="{{route('single.product', $related->inventories->id)}}">
				<img class="img-fluid" src="{{ asset('/images/'.$related->inventories->image) }}" alt="" />
				</a>
				</div>
				<div class="item-info col-sm-8">
					<a class="item-title" href="{{route('single.product', $related->inventories->id)}}">{{$related->inventories->product_name}}</a>
					<p class="item-details mb-2">{{$related->inventories->description}}</p>
					<p class="item-cost m-0">Cost: ${{$related->inventories->price}}</p>
					<p class="item-qty mb-2">Available Qty: {{$related->inventories->quantity_oh}}</p>
				
				</div>
			</div>
		</div>
		
	@endforeach
</div>
		
  
	</div>
</main>

@endif


            @endsection


@section('scripts')

<script>


$(document).ready(function(){


	// start Fev 


		$('#myFav').on('click',function(){
				var fevId = $(this).attr('data-fav');


   				$.ajax({
           				url: '../product/'+fevId+'/fev',
           				method: 'GET',
           				success:function(data){
            			
            			alert(data)
        
           			}
   			});

	});

//end fev


});
 


</script>

@endsection
