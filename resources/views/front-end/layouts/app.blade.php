<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="apple-touch-icon" href="apple-touch-icon.png" />
    <link rel="shortcut icon" href="favicon.ico" sizes="32x32" />

    <title>Irvine - Online Store</title>

    <!-- Style -->
    @include('front-end.partials.style')
    @yield('styles')
</head>

<body>
    <div class="store-page wrapper">
        <!-- Header -->
        @auth
        @include('front-end.partials.header')
        @endauth

        @yield('content')


        <!-- Footer -->
        @include('front-end.partials.footer')

    </div>

    <!-- JavaScript -->
    @include('front-end.partials.scripts')
    @yield('scripts')
</body>

</html>
