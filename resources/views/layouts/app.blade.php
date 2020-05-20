<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <img src="{{ asset('img/logo.png') }}" alt="PizzaStore" class="logo my-0 mr-md-auto font-weight-normal">
        @guest
        <a class="btn btn-outline-primary" href="{{ route('login') }}">Login</a>
        @if (Route::has('register'))
        <a class="btn btn-outline-primary ml-md-3 mt-3 mt-md-0" href="{{ route('register') }}">Register</a>
        @endif
        @else
        <a class="btn btn-outline-primary" href="#" onclick="$('#logout-form').submit();">{{ Auth::user()->name }} - exit</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST"
            style="display: none;">
            @csrf
        </form>
        @endguest
    </div>
    <div class="container">
        @yield('content')

        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            <div class="row">
                <div class="col-12">
                    <img class="mb-2" src="/docs/4.5/assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
                    <small class="d-block mb-3 text-muted">&copy; 2020 PizzaStore</small>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
