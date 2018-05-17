<!doctype html>
<html lang="{{ app()->getLocale() }}">
<link>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Laravel</title>
<link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                    @endauth
        </div>
    @endif
</div>

<section id="app">
    <top-header></top-header>
    <router-view></router-view>
</section>
</body>
<script src="{{ asset('js/app.js') }}"></script>
</html>