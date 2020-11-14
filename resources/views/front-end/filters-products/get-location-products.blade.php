
@forelse ($products as $product)
<div class="product-card">
	<div class="badge-bar">
		<p class="badge badge-new m-0">New!</p>
	</div>
	<a class="product-img" href="product.html">
		<img src="{{ asset('./shop-assets/img/product110.jpg') }}" alt="" />
	</a>
	<div class="text-center"><a class="product-title" href="product.html">{{ $product->product_name }}</a></div>
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