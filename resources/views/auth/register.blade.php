@extends('layouts.app')

@section('title', 'Register')
@section('css')
    @vite(['resources/css/home.css'])
@endsection

@section('content')
<h1>Register</h1>
<form method="POST" action="{{ route('register') }}">
    @csrf
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
    <button type="submit">Register</button>
</form>
<a href="{{ route('login') }}">Already have an account? Login</a>
@endsection
