@extends('layouts.app')

@section('title', 'Forgot Password')
@section('css')
    @vite(['resources/css/auth.css'])
@endsection
@section('content')
<div class="auth-container">
    <div class="auth-box">
        <h1 class="auth-title">Forgot Password</h1>
        <p>Enter your email, and we will send you a password reset link.</p>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <input type="email" name="email" class="auth-input" placeholder="Enter your email" required>
            @error('email')
                <p class="error-message">{{ $message }}</p>
            @enderror

            <button type="submit" class="auth-button">Send Reset Link</button>
        </form>

        <div class="auth-links">
            <a href="{{ route('login') }}">Back to login</a>
        </div>
    </div>
</div>
@endsection
