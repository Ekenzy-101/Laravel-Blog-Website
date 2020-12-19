<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function __construct() {
        $this->middleware("guest");
    }

    public function index()
    {
        return view("auth.register");
    }

    public function store(Request $request)
    {
        // Validate inputs from the form
        $this->validate($request, [
            "fullname" => ["required","max:100"],
            "username" => ["required","max:100", "unique:laravel_users"],
            "email" => ["required", "email","unique:laravel_users", "max:255"],
            "password" => ["required","confirmed", "min:8"],
        ]);

        // Create a user
        $user = User::create([
            "id" => Str::orderedUuid()->toString(),
            'fullname' => $request->fullname,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        // Sign in the user
        Auth::attempt($request->only(["email", "password"]));

        // Dispatch an event to send a verification email to the user
        event(new Registered($user));

        // Redirect to verification notice page incase user didn't see an email
        return redirect()->route("verification.notice")->with("success", "Registered Successfully");
    }
}
