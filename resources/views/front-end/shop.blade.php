@extends('front-end.layouts.app')
@if(Session::has('success'))
<div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
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
                            <input type="radio" class="custom-control-input" name="select-category" id="filter1Check1"
                                checked />
                            <label class="custom-control-label" for="filter1Check1">All Items</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="radio" class="custom-control-input" name="select-category"
                                id="filter1Check2" />
                            <label class="custom-control-label" for="filter1Check2">Cleaning Products</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="radio" class="custom-control-input" name="select-category"
                                id="filter1Check3" />
                            <label class="custom-control-label" for="filter1Check3">Safety Products</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="radio" class="custom-control-input" name="select-category"
                                id="filter1Check4" />
                            <label class="custom-control-label" for="filter1Check4">Batteries</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="radio" class="custom-control-input" name="select-category"
                                id="filter1Check5" />
                            <label class="custom-control-label" for="filter1Check5">Stationary</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="radio" class="custom-control-input" name="select-category"
                                id="filter1Check6" />
                            <label class="custom-control-label" for="filter1Check6">Clothing</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="radio" class="custom-control-input" name="select-category"
                                id="filter1Check7" />
                            <label class="custom-control-label" for="filter1Check7">General Supplies</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="radio" class="custom-control-input" name="select-category"
                                id="filter1Check8" />
                            <label class="custom-control-label" for="filter1Check8">Janitorial</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="radio" class="custom-control-input" name="select-category"
                                id="filter1Check9" />
                            <label class="custom-control-label" for="filter1Check9">Paint</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="radio" class="custom-control-input" name="select-category"
                                id="filter1Check10" />
                            <label class="custom-control-label" for="filter1Check10">Tools</label>
                        </div>
                    </div>
                </div>

                <div class="filter-part">
                    <h6 class="filter-title">Filter by Location:</h6>
                    <div class="filter-option">
                        <div class="custom-control custom-checkbox">
                            <input type="radio" class="custom-control-input" name="select-location" id="filter2Check1"
                                checked />
                            <label class="custom-control-label" for="filter2Check1">All Locations</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="radio" class="custom-control-input" name="select-location"
                                id="filter2Check2" />
                            <label class="custom-control-label" for="filter2Check2">Central Warehouse</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="radio" class="custom-control-input" name="select-location"
                                id="filter2Check3" />
                            <label class="custom-control-label" for="filter2Check3">Great Parks</label>
                        </div>
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

                    <p class="show-txt">Showing 5 of 5 Items</p>

                    <ul class="pagination pagination-sm justify-content-end">
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
                    </ul>
                </div>

                <div class="d-flex flex-wrap">
                    <div class="product-card">
                        <div class="badge-bar">
                            <p class="badge badge-new m-0">New!</p>
                        </div>
                        <a class="product-img" href="product.html">
                            <img src="{{ asset('./shop-assets/img/product110.jpg') }}" alt="" />
                        </a>
                        <div class="text-center"><a class="product-title" href="product.html">Multipurpose Cleaner</a>
                        </div>
                        <p class="product-details">Mr. Clean Multipurpose Cleaning Solution, Meadows & Rain, 128 Oz</p>
                        <div class="text-center">
                            <p class="product-cost product-info">Cost: $13.50</p>
                            <p class="product-qty product-info">Available Qty: 13</p>
                            <button class="add-product btn" type="button">Add to Cart</button>
                        </div>
                    </div>

                    <div class="product-card">
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
                        <div class="text-center"><a class="product-title" href="product.html">All-Purpose Cleaner</a>
                        </div>
                        <p class="product-details">Simple Green All-Purpose Cleaner, 32 fl oz</p>
                        <div class="text-center">
                            <p class="product-cost product-info">Cost: $13.50</p>
                            <p class="product-qty product-info">Available Qty: 13</p>
                            <button class="add-product btn" type="button">Add to Cart</button>
                        </div>
                    </div>
                    <!--
								<div class="product-card">
									<div class="badge-bar"></div>
									<a class="product-img" href="#">
										<img src="img/product140.jpg" alt="" />
									</a>
									<div class="text-center"><a class="product-title" href="product.html">Surface Spray</a></div>
									<p class="product-details">Mr. Clean Clean Freak Multi-Surface Spray Starter Kit, Lemon Zest</p>
									<div class="text-center">
										<p class="product-cost product-info">Cost: $13.50</p>
										<p class="product-qty product-info">Available Qty: 13</p>
										<button class="add-product btn" type="button">Add to Cart</button>
									</div>
								</div> -->
                    <!--
								<div class="product-card">
									<div class="badge-bar"></div>
									<a class="product-img" href="#">
										<img src="img/product150.jpg" alt="" />
									</a>
									<div class="text-center"><a class="product-title" href="product.html">Everyday Cleaner</a></div>
									<p class="product-details">Mrs. Meyer's Clean Day Multi-Surface Everyday Cleaner Bottle, Basil Scent, 16 fl oz</p>
									<div class="text-center">
										<p class="product-cost product-info">Cost: $13.50</p>
										<p class="product-qty product-info">Available Qty: 13</p>
										<button class="add-product btn" type="button">Add to Cart</button>
									</div>
								</div> -->
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
