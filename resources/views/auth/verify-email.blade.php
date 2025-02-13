@extends('layouts.app')

@section('title', 'Verify Your Email')
@section('css')
    @vite(['resources/css/auth.css'])
@endsection
@section('content')
<div class="auth-container">
    <div class="auth-box">
        <h1 class="auth-title">Verify Your Email</h1>
        <p>A verification email has been sent to your email address.</p>
        <p>Please check your inbox and click on the verification link.</p>

        <form method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="auth-button">Resend Verification Email</button>
        </form>

        <div class="auth-links">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</div>
@endsection
