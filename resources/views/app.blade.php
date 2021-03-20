<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script src="/js/jquery.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@if(session()->has('warning'))
    <p class="alert alert-warning">{{session('warning')}}</p>
@endif
@if (Route::has('login'))
    <div class="top-right links container">
        <a href="{{ route('index') }}">Главная</a>
        @auth
            <a href="{{ url('/home') }}">Админка</a>
            <a href="{{route('get-logout')}}">Выйти</a>
        @else
            <a href="{{ route('login') }}">Логин</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}">Регистрация</a>
            @endif
        @endauth
    </div>
@endif
@yield('content')
</body>
</html>