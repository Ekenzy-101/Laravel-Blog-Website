<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;

class VerificationController extends Controller
{

    use VerifiesEmails;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function notice() {
        return view("auth.verify-email");
    }

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->route("main.home")->with("success", "Email has been verified successfully");
    }

    public function resend(Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with("success", "Verification Link has been sent successfully");
    }
}
