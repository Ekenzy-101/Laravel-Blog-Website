<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function __construct() {
        $this->middleware("guest");
    }

    public function showLinkRequestForm()
    {
        return view("auth.forgot-password");
    }

    public function sendResetLinkEmail(Request $request)
    {
        // Validate inputs from the form
        $this->validate($request, ["email" => ["required", "email"]]);

        // Send password reset email
        $status = Password::sendResetLink($request->only("email"));

        // Notify the user with a message depending on the status
        return $status === Password::RESET_LINK_SENT
            ? back()->with("success", __($status))
            : back()->with("error", __($status));

    }
}
