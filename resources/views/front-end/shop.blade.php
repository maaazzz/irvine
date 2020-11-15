@extends('front-end.layouts.app')

@section('content')
<!-- Main -->
<main class="main">
    <div class="container-fluid">
        <div class="all-products d-md-flex position-relative">
            <div class="product-filter">
                <div class="filter-part">
                    <h6 class="filter-title">Filter by Category:</h6>
                    <div class="filter-option">
                        <div class="custom-control custom-checkbox">
                            <input type="radio" class="custom-control-input category-filter" name="select-category"
                                value="all" id="filter1Check" checked />
                            <label class="custom-control-label" for="filter1Check">All Items</label>
                        </div>
                        @foreach ($categories as $category)
                        <div class="custom-control custom-checkbox">
                            <input type="radio" class="custom-control-input category-filter" value="{{ $category->id }}"
                                name="select-category" id="filter1Check{{ $category->id }}" />
                            <label class="custom-control-label" for="filter1Check{{ $category->id }}">
                                {{ $category->name }} </label>
                        </div>
                        @endforeach

                    </div>
                </div>

                <div class="filter-part">
                    <h6 class="filter-title">Filter by Location:</h6>
                    <div class="filter-option">
                        <div class="custom-control custom-checkbox">
                            <input type="radio" class="custom-control-input location-filter" name="select-location"
                                value="all" checked id="locationCheck" />
                            <label class="custom-control-label" for="locationCheck">All Locations</label>
                        </div>
                        @foreach ($locations as $location)
                        <div class="custom-control custom-checkbox">
                            <input type="radio" class="custom-control-input location-filter" value="{{ $location->id }}"
                                name="select-location" id="locationCheck{{ $location->id }}" />
                            <label class="custom-control-label"
                                for="locationCheck{{ $location->id }}">{{ $location->loc_name }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="product-list flex-grow-1">
                <div class="top-bar d-flex flex-wrap justify-content-between align-items-center">
                    <button class="show-filter btn d-md-none" id="show-filter" type="button">Filter</button>

                    <div class="search-bar input-group">
                        <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                            aria-describedby="search-input" />
                        <div class="input-group-append">
                            <button class="small-btn btn" type="button" id="search-input"><i
                                    class="icon fas fa-search"></i></button>
                        </div>
                    </div>

                    {{-- <p class="show-txt">Showing 5 of 5 Items</p> --}}
                    {!! $products->links() !!}
                    {{-- <ul class="pagination pagination-sm justify-content-end">
						<li class="page-item disabled">
							<a class="page-link" href="#" aria-label="Previous">
								<span aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
							</a>
						</li>
						<li class="page-item active"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item">
							<a class="page-link" href="#" aria-label="Next">
								<span aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
							</a>
						</li>
					</ul> --}}
                </div>

                <div class="d-flex flex-wrap" id="products">
                    @foreach($products as $product)
                    <div class="product-card">
                        @if($product->is_featured == 1)
                        <div class="badge-bar">
                            <p class="badge badge-new m-0">New!</p>
                        </div>
                        @endif
                        @if($product->is_featured == 2)
                        <div class="badge-bar">
                            <p class="badge badge-featured m-0">Featured!</p>
                        </div>
                        @endif
                        @if($product->is_featured == 0)
                        <div class="badge-bar">
                            <p class="badge m-0"></p>
                        </div>
                        @endif

                        <a class="product-img" href="{{route('single.product',$product->id)}}">
                            <img src="{{ asset('./shop-assets/img/product110.jpg') }}" alt="" />
                        </a>
                        <div class="text-center"><a class="product-title"
                                href="{{route('single.product',$product->id)}}">{{ $product->product_name }}</a></div>
                        <p class="product-details text-center">{{ $product->description }}</p>
                        <div class="text-center">
                            <p class="product-cost product-info">Cost: {{ $product->price }}</p>
                            <p class="product-qty product-info">Available Qty: {{ $product->quantity_oh }}</p>

                            <a class="add-product btn" href="{{ route('cart.add', $product->id) }}">Add to Cart</a>
                            <form class="fvrt">
                                {{-- <input type="hidden" value="{{ $product->id}}"> --}}
                                <button type="button" class="btn btn-link like">Add to
                                    Favorite</button>
                            </form>
                        </div>
                    </div>
                    @endforeach

                    {{-- <div class="product-card">
									<div class="badge-bar">
										<p class="badge badge-featured m-0">Featured</p>
									</div>
									<a class="product-img" href="#">
										<img src="{{ asset('./shop-assets/img/product120.jpg') }}" alt="" />
                    </a>
                    <div class="text-center"><a class="product-title" href="product.html">Magic Eraser</a></div>
                    <p class="product-details">Mr. Clean Magic Eraser Multi-Surface Cleaning Sheets, 16 ct</p>
                    <div class="text-center">
                        <p class="product-cost product-info">Cost: $13.50</p>
                        <p class="product-qty product-info">Available Qty: 13</p>
                        <button class="add-product btn" type="button">Add to Cart</button>
                    </div>
                </div>

                <div class="product-card">
                    <div class="badge-bar"></div>
                    <a class="product-img" href="#">
                        <img src="{{ asset('./shop-assets/img/product130.jpg') }}" alt="" />
                    </a>
                    <div class="text-center"><a class="product-title" href="product.html">All-Purpose Cleaner</a></div>
                    <p class="product-details">Simple Green All-Purpose Cleaner, 32 fl oz</p>
                    <div class="text-center">
                        <p class="product-cost product-info">Cost: $13.50</p>
                        <p class="product-qty product-info">Available Qty: 13</p>
                        <button class="add-product btn" type="button">Add to Cart</button>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>
    </div>
</main>

</div>
</div>
</div>
</main>
</div>
@endsection

@section('scripts')

<script>
    $(document).on('click','.category-filter',function(){
		var id = $("input[name='select-category']:checked").val()
    	var menuId = $("ul.nav").first().attr("id");
			var request = $.ajax({
				url: "get-categories-products/"+id,
				type: "get",
			});
			request.done(function(msg) {
				$('#products').html(msg)
			});
			request.fail(function(jqXHR, textStatus) {
				alert( "Request failed: " + textStatus );
			});
	});

	$(document).on('click','.location-filter',function(){
		var id = $("input[name='select-location']:checked").val()
    	var menuId = $("ul.nav").first().attr("id");
			var request = $.ajax({
				url: "get-location-products/"+id,
				type: "get",
			});
			request.done(function(msg) {
				$('#products').html(msg)
			});
			request.fail(function(jqXHR, textStatus) {
				alert( "Request failed: " + textStatus );
            });



	});
</script>

@endsection
