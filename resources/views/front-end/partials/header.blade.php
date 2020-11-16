<header class="header">
    <div class="container-fluid">
        <nav class="main-nav navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#"><img src="{{ asset('./shop-assets/img/irvine-logo.svg') }}" alt="" /></a>

            <a class="cart-btn order-lg-6" href="{{ url('/cart') }}">
                <img src="{{ asset('./shop-assets/img/shopping-cart.svg') }}" alt="Cart" />
                <span class="number-dot">{{count($cart)}}</span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav flex-md-grow-1">
                    <li class="nav-item active"><a href="{{url('/')}}" class="nav-link">Online Store</a></li>
                    <li class="nav-item"><a href="{{url('/order-history')}}" class="nav-link">Order History</a></li>
                    <li class="nav-item"><a href="{{url('/favorite')}}" class="nav-link">Favorite Items</a></li>
                    <li class="nav-item"><a href="settings.html" class="nav-link">Account Settings</a></li>


                    @guest
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                    @endguest

                    @auth
                    <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">Log Out</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @endauth
                </ul>
            </div>
        </nav>
    </div>
</header>
