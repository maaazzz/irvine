
@forelse ($products as $product)
<div class="product-card">
<<<<<<< HEAD
	<div class="badge-bar">
		<p class="badge badge-new m-0">New!</p>
	</div>
	<a class="product-img" href="product.html">
		<img src="{{ asset('./shop-assets/img/product110.jpg') }}" alt="" />
	</a>
	<div class="text-center"><a class="product-title" href="product.html">{{ $product->product_name }}</a></div>
=======
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
	@php $images = explode(',', $product->images); @endphp
	<a class="product-img" href="{{route('single.product',$product->id)}}">
		<img src="{{ asset('images/'.$images[0]) }}" alt="" />
	</a>
	<div class="text-center"><a class="product-title" href="{{route('single.product',$product->id)}}">{{ $product->product_name }}</a></div>
>>>>>>> 3d106469a9d1b0f4a5d7b8cb313feae21b767bc5
	<p class="product-details">{{ $product->description }}</p>
	<div class="text-center">
		<p class="product-cost product-info">Cost: {{ $product->price }}</p>
		<p class="product-qty product-info">Available Qty: {{ $product->quantity_oh }}</p>

		<a class="add-product btn" href="{{ route('cart.add', $product->id) }}">Add to Cart</a>
	</div>
</div>
@empty

<div class="product-card">
	<h4>Products Not Found</h4>
</div>
    
@endforelse