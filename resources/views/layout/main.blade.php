<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
    @include('layout.navigation_layout')
    <h1>{{ $title }}</h1>
    <div class="container">
        @yield('main_content')
    </div>
</body>
</html>