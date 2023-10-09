@extends('layout')

@section('title', 'Register')

@section('content')
<h1>Register</h1>

<form action="{{ route('saveUser') }}" method="post">
    @csrf

    <label>Name</label>
    <input type="text" name="name" class="@error('name') error-border @enderror" value="{{ old('name') }}">
    @error('name')
        <div class="error">
            {{ $message }}
        </div>
    @enderror

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

    <label>Password repeat</label>
    <input type="password" name="password_repeat" class="@error('password') error-border @enderror">
    @error('password_repeat')
        <div class="error">
            {{ $message }}
        </div>
    @enderror

    <button type="submit">Register</button>

    If you already have an account <a href="{{ route('login') }}">login</a>
</form>
@endsection