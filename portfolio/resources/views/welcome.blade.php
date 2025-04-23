<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SpiceCloud Kitchens</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.5-dist/css/bootstrap.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <script src="{{ asset('bootstrap-5.3.5-dist/js/bootstrap.js') }}"></script>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body>
    <header>
        <div>
            @include('layouts.default')
        </div>
    </header>
    
    <section class="hero-section">
        <div class="container-fluid text-center main-container">
            <h1>Welcome to SpiceCloud Kitchens</h1>
            <p>Your all-in-one platform to share and discover recipes from around the world.</p>
            <a href="{{ route('register') }}" class="btn3 bg-success btn-lg">Get Started</a>
            <a href="{{ route('recipe') }}" class="btn3 bg-success btn-lg">Checkout Our Recipes</a>
        </div>
    </section>


    @if (Route::has('login'))
    <div></div>
    @endif


    <script src="/bootstrap-5.3.5-dist/js/bootstrap.js"></script>

    <footer>
        <div>
            @include('layouts.footer')


        </div>
    </footer>
</body>

</html>