@extends('layout')

@section('title', 'Login')

@section('content')
<h1>Login</h1>
<form action="{{ route('login') }}" method="post">
    @csrf

    <label>Email</label>
    <input type="text" name="email" class="@error('email') error-border @enderror" value="{{ old('email') }}">
    @error('email')
        <div class="error">
            {{ $message }}
        </div>
    @enderror

    <label>Password</label>
    <input type="password" name="password" class="@error('password') error-border @enderror">
    @error('password')
        <div class="error">
            {{ $message }}
        </div>
    @enderror

    <label for="remember_me">Remember me</label>
    <input type="checkbox" name="remember_token" id="remember_me">

    <button type="submit">Login</button>
    
</form>

@endsection