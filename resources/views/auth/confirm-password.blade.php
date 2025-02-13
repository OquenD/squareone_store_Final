@extends('layouts.app')

@section('title', 'Confirm Password')
@section('css')
    @vite(['resources/css/auth.css'])
@endsection
@section('content')
<div class="auth-container">
    <div class="auth-box">
        <h1 class="auth-title">Confirm Password</h1>
        <p>For security reasons, please confirm your password before continuing.</p>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf
            <input type="password" name="password" class="auth-input" placeholder="Enter your password" required>
            @error('password')
                <p class="error-message">{{ $message }}</p>
            @enderror

            <button type="submit" class="auth-button">Confirm Password</button>
        </form>

        <div class="auth-links">
            <a href="{{ route('password.request') }}">Forgot your password?</a>
        </div>
    </div>
</div>
@endsection
