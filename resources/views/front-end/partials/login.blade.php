@extends('front-end.layouts.app')

@section('content')
<div class="login-page d-flex flex-column justify-content-between">
    <header class="header">
        <a href="#" class="brand-logo"><img src="img/irvine.svg" alt="" /></a>
    </header>

    <section class="login-box">
        <div class="login-form">
            <h2>Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus />
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password" type="password" />

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="remember-me" name="remember"
                            {{ old('remember') ? 'checked' : '' }} />
                        <label class="form-check-label" for="remember-me"> Remember me </label>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-pass">Forgot Password</a>
                    @endif
                    <button type="submit" class="btn main-btn">Login</button>
                </div>
            </form>
        </div>
    </section>

    <footer>
        <p class="footer-text">© 2020 Precision Material Management, LLC. All Rights Reserved.</p>
    </footer>
</div>
@endsection
