<header class="header">
				<div class="container-fluid">
					<nav class="main-nav navbar navbar-expand-lg navbar-light">
						<a class="navbar-brand" href="#"><img src="{{ asset('./shop-assets/img/irvine-logo.svg') }}" alt="" /></a>

						<a class="cart-btn order-lg-6" href="cart.html">
							<img src="{{ asset('./shop-assets/img/shopping-cart.svg') }}" alt="Cart" />
						<span class="number-dot">{{ count($cart) }}</span>
						</a>

						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>

						<div class="collapse navbar-collapse" id="mainNav">
							<ul class="navbar-nav flex-md-grow-1">
								<li class="nav-item active"><a href="store.html" class="nav-link">Online Store</a></li>
								<li class="nav-item"><a href="history.html" class="nav-link">Order History</a></li>
								<li class="nav-item"><a href="favorite.html" class="nav-link">Favorite Items</a></li>
								<li class="nav-item"><a href="approvals.html" class="nav-link">Approvals</a></li>
								<li class="nav-item"><a href="warehouse.html" class="nav-link">Warehouse</a></li>
								<li class="nav-item"><a href="settings.html" class="nav-link">Account Settings</a></li>
								<li class="nav-item"><a href="index.html" class="nav-link">Log Out</a></li>
							</ul>
						</div>
					</nav>
				</div>
			</header>