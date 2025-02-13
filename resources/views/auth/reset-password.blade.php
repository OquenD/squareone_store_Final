@extends('layouts.app')

@section('title', 'Reset Password')
@section('css')
    @vite(['resources/css/auth.css'])
@endsection
@section('content')
<div class="auth-container">
    <div class="auth-box">
        <h1 class="auth-title">Reset Password</h1>
        <p>Enter a new password for your account.</p>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ request()->route('token') }}">

            <input type="email" name="email" class="auth-input" placeholder="Enter your email" required>
            @error('email')
                <p class="error-message">{{ $message }}</p>
            @enderror

            <input type="password" name="password" class="auth-input" placeholder="Enter new password" required>
            @error('password')
                <p class="error-message">{{ $message }}</p>
            @enderror

            <input type="password" name="password_confirmation" class="auth-input" placeholder="Confirm new password" required>

            <button type="submit" class="auth-button">Reset Password</button>
        </form>

        <div class="auth-links">
            <a href="{{ route('login') }}">Back to login</a>
        </div>
    </div>
</div>
@endsection
