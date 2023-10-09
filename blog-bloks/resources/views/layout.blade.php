<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title', 'Blog')
    </title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
    <ul class='nav'>

        <li><a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
        <li><a class="{{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About us</a></li>
        @auth        
        <li><a class="{{ request()->routeIs('posts.create') ? 'active' : '' }}" href="{{ route('posts.create') }}">Create a post</a></li>
        <li><a href="{{ route('logout') }}">Logout</a></li>
        <li class="username"><p>Logged in as <b>{{ Auth::user()->name }}</b></p></li>
        @endauth
        @guest
        <li><a href="{{ route('register') }}" class="{{ request()->routeIs('register') ? 'active' : '' }}">Register</a></li>
        <li><a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">Login</a></li>
        @endguest

    </ul>

    @includeWhen($errors->any(), '_errors')

    @if (session('success'))
    <div class="flash-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="main">
        @yield('content')
    </div>
</body>
</html>