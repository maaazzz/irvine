<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="apple-touch-icon" href="apple-touch-icon.png" />
    <link rel="shortcut icon" href="favicon.ico" sizes="32x32" />

    <title>Irvine - Dashboard</title>

    @include('admin.partials.styles')
    @yield('styles')
</head>

<body>
    <div class="dashboard-page inner-page wrapper">
        <!-- Header -->
        @include('admin.partials.header')

        <!-- Main -->
        <main class="main">
            <div class="container-fluid">
                @yield('content')
            </div>
        </main>

        <!-- Footer -->
        @include('admin.partials.footer')
    </div>

    <!-- JavaScript -->
    @include('admin.partials.scripts')
    @yield('scripts')
</body>

</html>
