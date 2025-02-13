<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerificationController extends Controller
{
    public function notice()
    {
        return view('auth.verify-email');
    }

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect()->route('account')->with('success', 'Email verified successfully.');
    }

    public function resend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('success', 'Verification email resent.');
    }
}
