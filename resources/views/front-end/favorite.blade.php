@extends('front-end.layouts.app')

@section('content')

			<!-- Main -->
			<main class="main">
				<div class="container-fluid">

                    @if(session()->get('success'))
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Success!</strong>      
     {{ session()->get('success') }}
</div>

@endif

					<h5 class="page-title">Favorite Products</h5>

					<div class="favorite-box">
						<div class="top-bar d-flex flex-wrap justify-content-between align-items-center">
                        <p class="show-txt">Showing favorite Items {{ count($favorites) }}</p>

							<ul class="pagination pagination-sm justify-content-end">
								{{ $favorites->links() }}
							</ul>
						</div>

						<div class="row">
                            
@foreach($favorites as $favorite)

							<div class="col-md-6" style="margin-bottom:20px">
								<div class="fav-item d-flex row">

									<div class="item-img col-sm-4">
                                    <img class="img-fluid" src="./images/{{$favorite->inventory->image}}" alt="" />
									</div>
									<div class="item-info col-sm-8">
										<a class="item-title" href="#">{{$favorite->inventory->product_name}}</a>
										<p class="item-details mb-2">{{$favorite->inventory->description}}</p>
										<p class="item-cost m-0">Cost: ${{$favorite->inventory->price}}</p>
										<p class="item-qty mb-2">Available Qty: {{$favorite->inventory->quantity_oh}}</p>
                                    <a class="btn-link btn p-0" href="{{ route('fav.remove', $favorite->id) }}">Remove from Favorites</a>
									</div>
								</div>
							</div>
@endforeach
	
						</div>
					</div>
				</div>
			</main>
@endsection