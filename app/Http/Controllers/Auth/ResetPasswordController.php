<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function __construct() {
        $this->middleware("guest");
    }

    public function showResetPasswordForm(Request $request)
    {
        $token = $request->query("token") ? $request->query("token") : "";
        return view("auth.reset-password", compact("token"));
    }

    public function resetPassword(Request $request)
    {
        // Validate inputs from the form
        $this->validate($request, [
            "token" => ["required"],
            "email" => ["required", "email"],
            "password" => ["required", "min:8", "confirmed"],

        ]);

        // Reset password with form inputs
        $status = Password::reset(
            $request->only("email", "password", "password_confirmation", "token"),
            function ($user, $password) use ($request) {
                $user->forceFill([
                    "password" => Hash::make($password)
                ])->save();

                $user->setRememberToken(Str::random(60));

                event(new PasswordReset($user));
            }
        );

        // If successful redirect to login else return back with error message
        return $status == Password::PASSWORD_RESET
            ? redirect()->route("auth.login")->with("success", __($status))
            : back()->with("error", __($status));
    }
}
