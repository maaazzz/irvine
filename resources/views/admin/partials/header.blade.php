<header class="header">
    <div class="container-fluid">
        <nav class="main-nav navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="/admin"><img src="{{asset('admin-assets/img/irvine-logo.svg')}}" alt="" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="nav-middle navbar-nav flex-md-grow-1">

                    {{-- dashboard --}}
                    @if(auth()->user()->role == 4)
                    <li class="nav-item {{request()->is('/admin') ? 'active' : ''}}"><a href="{{ url('/admin') }}"
                            class="nav-link">Dashboard</a></li>
                    {{-- inventory --}}
                    <li class="nav-item  {{request()->is('admin/inventory') ? 'active' : ''}}"><a
                            href="{{ url('admin/inventory') }}" class="nav-link">Inventory</a></li>
                    @endif


                    @if (auth()->user()->role == 1)
                    {{-- Orders for warehouse --}}
                    <li class="nav-item {{request()->is('admin/all-orders') ? 'active' : ''}}"><a
                            href="{{ url('admin/all-orders') }}" class="nav-link">Orders</a>
                    </li>
                    @endif


                    {{-- approvals --}}
                    @if (auth()->user()->role == 2)
                    <li class="nav-item {{request()->is('admin/approvals') ? 'active' : ''}}"><a
                            href="{{ url('admin/approvals') }}" class="nav-link">Approvals</a></li>
                    @endif
                    {{--end  approvals --}}


                    @if(auth()->user()->role == 4)

                    {{-- transactions --}}
                    <li class="nav-item {{request()->is('admin/transactions') ? 'active' : ''}}"><a
                            href="{{ url('admin/transactions') }}" class="nav-link">Transactions</a>
                    </li>

                    <li class="nav-item {{request()->is('admin/users') ? 'active' : ''}}"><a
                            href="{{ url('admin/users') }}" class="nav-link">Users</a></li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Store Settings</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{url('admin/categories')}}">Categories</a>
                            <a class="dropdown-item" href="{{url('admin/locations')}}">Locations</a>
                            <a class="dropdown-item" href="{{url('admin/account-number')}}">Account Number</a>
                            <a class="dropdown-item" href="{{url('admin/project-number')}}">Project Number</a>
                            <a class="dropdown-item" href="{{url('admin/justifications')}}">Justifications</a>
                        </div>
                    </li>
                    <li class="nav-item {{request()->is('admin/account-setting') ? 'active' : ''}}"><a
                            href="{{ url('admin/account-setting') }}" class="nav-link">Account
                            Settings</a></li>
                    @endif

                    <li class="nav-item {{request()->is('admin/account-setting') ? 'active' : ''}}"><a
                            href="{{ url('admin/account-setting') }}" class="nav-link">Account
                            Settings</a></li>
                </ul>

                <ul class="navbar-nav">
                    @auth
                    <li class="nav-item"><a href="{{ route('logout') }}" class="logout-btn btn" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">Logout</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @endauth
                </ul>
            </div>
        </nav>
    </div>
</header>
