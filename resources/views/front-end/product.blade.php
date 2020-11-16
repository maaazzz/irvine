@extends('front-end.layouts.app')

@section('content')

<main class="main">
<<<<<<< HEAD
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
							
							@foreach(explode(',', $product->images) as $p)
							<div class="list-img square-box" style="padding:10px;">
								<div class="img-box">
								<img class="img-fluid" src="../images/{{ $p }}" alt="" />
								</div>
							</div>
							@endforeach	
					


							
							
							
						</div>
						<div class="main-img square-box">
							<div class="img-box" >
							<img class="img-fluid" src="../images/{{ $product->image }}" alt="" />
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
							<p class="product-cost">Cost: {{ $product->price }}</p>
								<p class="product-qty">Available Qty: {{ $product->quantity_oh }} </p>
							</div>

							<div class="product-info">
								<div class="d-flex flex-wrap align-items-center">
									<div class="qty-input">
									<label style="padding: 10px;" for="">Qty: {{ $quantity }}</label>
										{{-- <select class="custom-select">
=======
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
                                    <img class="img-fluid images-showing" src="{{asset('images/'.$image)}}" alt="" />
                                </div>
                            </div>
                            @endforeach






                        </div>
                        @php $images_ = explode(',', $product->images); @endphp
                        <div class="main-img square-box">
                            <div class="img-box">
                                <img class="img-fluid" id="show-image" src="{{asset('images/'.$images_[0])}}" alt="" />
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
                                <p class="product-cost">Cost: {{ $product->price }}</p>
                                <p class="product-qty">Available Qty: {{ $product->quantity_oh }} </p>
                            </div>

                            <div class="product-info">
                                <div class="d-flex flex-wrap align-items-center">
                                    <div class="qty-input">
                                        <label style="padding: 10px;" for="">Qty: {{ $quantity }}</label>
                                        {{-- <select class="custom-select">
>>>>>>> 3d106469a9d1b0f4a5d7b8cb313feae21b767bc5
											<option value="">1</option>
											<option value="">2</option>
											<option value="">3</option>
										</select> --}}
<<<<<<< HEAD
										

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

            @endsection
=======


                                    </div>
                                    @if($quantity != 0)
                                    <a class="btn btn-sm d-flex" style="margin: 10px"
                                        href="{{ route('cart.dec', $product->id) }}"><i
                                            class="fa fa-angle-down"></i></a>

                                    <a class="btn btn-sm d-flex" style="margin: 10px"
                                        href="{{ route('cart.inc', $product->id) }}"><i class="fa fa-angle-up"></i></a>

                                    <a class="btn-link btn" href="{{ route('cart.remove', $product->id) }}"><i
                                            class="fa fa-trash"></i></a>

                                    @endif





                                    <br>
                                    <div class="">

                                        <a class="yellow-btn main-btn btn my-2 mr-2"
                                            href="{{ route('cart.add', $product->id) }}">Add to cart</a>
                                        <a class="gray-btn main-btn btn my-2 mr-2" href="{{ url('/') }}"
                                            type="button">Continue Shopping</a>
                                        @php $check = $product->favorite()->where('user_id',auth()->id())->first();
                                        @endphp

                                        @if($check)

                                        <button class="blue-btn main-btn btn my-2 mr-2" disabled="disabled">Added to
                                            Favorites</button>

                                        @else

                                        <button class="blue-btn main-btn btn my-2 mr-2 .addToFev"
                                            data-fav='{{ $product->id }}' id="myFav">Add to Favorite</button>


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

@endsection
>>>>>>> 3d106469a9d1b0f4a5d7b8cb313feae21b767bc5


@section('scripts')

<script>
<<<<<<< HEAD


$(document).ready(function(){


	// start Fev 
=======
    $(document).ready(function(){


	// start Fev
>>>>>>> 3d106469a9d1b0f4a5d7b8cb313feae21b767bc5


		$('#myFav').on('click',function(){
				var fevId = $(this).attr('data-fav');


   				$.ajax({
           				url: '../product/'+fevId+'/fev',
           				method: 'GET',
           				success:function(data){
<<<<<<< HEAD
            			
            			alert(data)
        
=======

            			alert(data)

>>>>>>> 3d106469a9d1b0f4a5d7b8cb313feae21b767bc5
           			}
   			});

	});

//end fev
<<<<<<< HEAD


});
 
=======
$('.images-showing').on('click',function(){
	var fetched_image = $(this).attr('src');
	// console.log(fetched_image);
	$('#show-image').attr('src',fetched_image);
});

});

>>>>>>> 3d106469a9d1b0f4a5d7b8cb313feae21b767bc5


</script>

<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> 3d106469a9d1b0f4a5d7b8cb313feae21b767bc5
