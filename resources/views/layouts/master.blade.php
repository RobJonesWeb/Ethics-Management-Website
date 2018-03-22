<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/app.min.css')}}">
    <title>Ethics Management Software</title>
</head>
<body>
<header>
    <div>
        @yield('title')
    </div>
    @include('includes.nav')
</header>
@yield('content')
</body>
</html>