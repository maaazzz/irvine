@extends('front-end.layouts.shop')


@section('content')

<main class="main">
    <div class="container-fluid">

        @if(session()->get('success'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Success!</strong>      
             {{ session()->get('success') }}
        </div>
        @endif
        <div class="cart-step">
            <div id="step-progress" class="step-progress d-flex justify-content-between">
                <span class="on">Step One</span>
                <span>Step Two</span>
                <span>Step Three</span>
                <span>Step Four</span>
            </div>

            <div class="step-box">
                <form action="{{route('order.store')}}" method="post">
                    @csrf
                    <div class="">
                        <fieldset class="step-card">
                            <h6 class="step-title">Shopping Cart</h6>

                            <div class="row">
                                <div class="col-md-7 border-right">
                                    <div class="row">
                                        @foreach($cart->sort() as $item)
                                        <div class="col-sm-12">
                                            <div class="cart-item d-flex flex-column flex-md-row">
                                                <div class="item-img" style="margin: 30px;">
                                                    <img src="{{asset('./images/'.$item->attributes->img) }}" alt="" />
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="item-info pb-2">
                                                            <h6 class="item-title">{{ $item->name }}</h6>
                                                            <p class="item-details">{{ $item->attributes->description }}
                                                            </p>
                                                            <p class="item-cost">Cost: ${{ $item->price }}</p>
                                                            <p class="item-qty">Available Qty:
                                                                {{ $item->attributes->available_quantity }}</p>
                                                            <div class="d-flex align-items-center">



                                                                <div class="qty-input row">


                                                                    <p class="item-cost">{{ $item->quantity }}</p>
                                                                </div>

                                                                <a class="btn btn-sm d-flex"
                                                                    href="{{ route('cart.dec', $item->id) }}"><i
                                                                        class="fa fa-angle-down"></i></a>

                                                                <a class="btn btn-sm d-flex"
                                                                    href="{{ route('cart.inc', $item->id) }}"><i
                                                                        class="fa fa-angle-up"></i></a>


                                                                <a class="btn-link btn"
                                                                    href="{{ route('cart.remove', $item->id) }}"><i
                                                                        class="fa fa-trash"></i></a>


                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="item-added pb-2">
                                                            <p class="text-nowrap">1 item added</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @endforeach



                                    </div>

                                </div>

                                <div class="col-md-5">
                                    <div class="cart-total row">

                                        @foreach($cart as $cartItem)

                                        <div class="col-md-8 pb-2">

                                            <p class="">
                                                <span>{{ $cartItem->name }}</span><br />
                                                <span>{{ $cartItem->attributes->description }}</span>

                                            </p>
                                        </div>
                                        <div class="col-md-4 pb-2">

                                            <p class="">
                                                <span>Qty: {{ $cartItem->quantity }}</span><br />
                                                <span>Price: {{ $cartItem->price }}</span><br />
                                                <b>Item-Total: ${{ Cart::get($cartItem->id)->getPriceSum() }}</b>
                                            </p>
                                        </div>

                                        @endforeach

                                        {{-- Cart items-total --}}
                                        <div class="col-md-8 pb-2">
                                            <h6 class="">Purchase Total </h6>

                                        </div>
                                        <div class="col-md-4 pb-2">
                                            <h6 class="text-nowrap">$ {{ Cart::getTotal() }}</h6>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="step-btns text-right">
                                <a class="gray-btn main-btn btn" style="margin: 10px" href="{{ route('cart.clear') }}">Clear Cart</a>
												
                                <button class="gray-btn main-btn btn" type="button">Continue Shopping</button>
                                <button class="next-step main-btn btn" type="button">Next <i
                                        class="fas fa-arrow-right"></i></button>
                            </div>
                        </fieldset>

                        <fieldset class="step-card">
                            <h6 class="step-title">Delivery Instructions</h6>

                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="">Date Needed</label>
                                        <input class="form-control" type="date" name="date_needed"
                                            value="{{date('Y-m-d')}}" />
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="delivery_type"
                                                id="pickupRadio1" value="0" />
                                            <label class="form-check-label" for="pickupRadio1">Warehouse Pickup</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="delivery_type"
                                                id="pickupRadio2" value="1" />
                                            <label class="form-check-label" for="pickupRadio2">Deliver to Me</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Delivery Location</label>
                                        <select class="custom-select" name="location_id">
                                            <option selected disabled hidden>Select Delivery Location</option>
                                            @forelse ($locations as $location)
                                            <option value="{{ $location->id }}">{{ $location->loc_name }}</option>
                                            @empty
                                            <option value="">not found</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="pickup_notes"
                                            placeholder="Enter pickup notes."></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="step-btns d-flex justify-content-between">
                                <div class="">
                                    <button class="previous-step gray-btn main-btn btn" type="button"><i
                                            class="fas fa-arrow-left"></i> Back</button>
                                    <button class="cancel-step gray-btn main-btn btn" type="button">Cancel</button>
                                </div>
                                <button class="next-step main-btn btn" type="button">Next <i
                                        class="fas fa-arrow-right"></i></button>
                            </div>
                        </fieldset>

                        <fieldset class="step-card">
                            <h6 class="step-title">Accounting Details</h6>

                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="">Account Number</label>
                                        <select class="custom-select" name="account_number_id">
                                            <option selected disabled hidden>--Select--</option>
                                            @forelse ($acc_numbers as $acc_number)
                                            <option value="{{ $acc_number->id }}">{{ $acc_number->account_no }}
                                            </option>
                                            @empty
                                            <option value="">not found</option>
                                            @endforelse
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="">Project Number</label>
                                        <select class="custom-select" name="project_number_id">
                                            <option selected disabled hidden>--Select--</option>
                                            @forelse ($project_numbers as $project_number)
                                            <option value="{{ $project_number->id }}">
                                                {{ $project_number->project_number }}
                                            </option>
                                            @empty
                                            <option value="">not found</option>
                                            @endforelse
                                        </select>
                                    </div>

                                </div>
                            </div>

                            <div class="step-btns d-flex justify-content-between">
                                <div class="">
                                    <button class="previous-step gray-btn main-btn btn" type="button"><i
                                            class="fas fa-arrow-left"></i> Back</button>
                                    <button class="cancel-step gray-btn main-btn btn" type="button">Cancel</button>
                                </div>
                                <button class="next-step main-btn btn" type="button">Next <i
                                        class="fas fa-arrow-right"></i></button>
                            </div>
                        </fieldset>

                        <fieldset class="step-card">
                            <h6 class="step-title">Approvals</h6>

                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="">Select Approver</label>
                                        <select class="custom-select" name="approver_id">
                                            <option selected disabled hidden>--Select--</option>
                                            @forelse ($approvers as $approver)
                                            <option value="{{$approver->id}}">{{$approver->name}} </option>
                                            @empty
                                            <option value="">not found</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Select Justification</label>
                                        <select class="custom-select" name="justification_id">
                                            <option selected disabled hidden>--Select--</option>
                                            @forelse ($justifications as $justification)
                                            <option value="{{ $justification->id}}">{{$justification->justification}}
                                            </option>
                                            @empty
                                            <option value="">not found</option>
                                            @endforelse
                                        </select>
                                    </div>

                                    <div class="step-btns d-flex justify-content-between">
                                        <div class="">
                                            <button class="previous-step gray-btn main-btn btn" type="button"><i
                                                    class="fas fa-arrow-left"></i> Back</button>
                                            <button class="cancel-step gray-btn main-btn btn"
                                                type="button">Cancel</button>
                                        </div>
                                        <button class="main-btn btn" type="submit">Submit</button>
                                    </div>
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection
