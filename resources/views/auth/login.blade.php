@extends('layouts.app')

@section('title', 'Login')
@section('css')
    @vite(['resources/css/home.css'])
@endsection

@section('content')
<h1>Login</h1>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>
<a href="{{ route('register') }}">Create an account</a>
@endsection
