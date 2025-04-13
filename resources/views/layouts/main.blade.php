<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Блог</title>
</head>
<body>
    @include('layouts.user')
    @include('layouts.nav')
    @yield('home')
    @yield('posts')
    @yield('categories')
    @yield('posts.create')
    @yield('posts.edit')
    @yield('categories.create')
    @yield('categories.edit')
</body>
</html>
