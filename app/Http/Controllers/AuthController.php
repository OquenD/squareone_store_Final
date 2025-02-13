<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\User;

class AuthController extends Controller
{
    // Show Login Form (For Web)
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Show Register Form (For Web)
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Register User and Issue Sanctum Token (For API)
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Send Email Verification
        $user->sendEmailVerificationNotification();

        // If API request, return token
        if ($request->wantsJson()) {
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json(['token' => $token, 'message' => 'User registered successfully. Please verify your email.']);
        }

        return redirect()->route('verification.notice')->with('success', 'Please verify your email.');
    }

    // Login and Issue Sanctum Token (For API & Web)
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (!Auth::attempt($credentials)) {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }

        $user = Auth::user();

        // If API request, return token
        if ($request->wantsJson()) {
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json(['token' => $token, 'message' => 'Logged in successfully']);
        }

        return redirect()->route('account')->with('success', 'Logged in successfully');
    }

    // Logout and Revoke Tokens (For API & Web)
    public function logout(Request $request)
    {
        if ($request->user()) {
            $request->user()->tokens()->delete(); // Revoke API tokens
            Auth::logout(); // Logout web session
        }

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Logged out successfully']);
        }

        return redirect()->route('index')->with('success', 'Logged out successfully.');
    }

    // Get Authenticated User (For API)
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    // Show Confirm Password Form (For Web)
    public function showConfirmPasswordForm()
    {
        return view('auth.confirm-password');
    }

    // Confirm Password for Sensitive Actions
    public function confirmPassword(Request $request)
    {
        $request->validate(['password' => 'required']);

        if (!Hash::check($request->password, $request->user()->password)) {
            return back()->withErrors(['password' => 'Incorrect password']);
        }

        return redirect()->intended();
    }
}
