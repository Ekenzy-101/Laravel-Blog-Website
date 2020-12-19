<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct() {
        $this->middleware("guest");
    }

    public function index()
    {
        return view("auth.login");
    }

    public function store(Request $request)
    {
        // Validate inputs from the form
        $this->validate($request, [
            "email" => "required|email",
            "password" => "required",
        ]);

        // If user cannot be signed in return back with an error message
        if(!Auth::attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with("error", "Invalid Email and Password");
        }

        return back()->with("success", "Login Successfully");
    }
}
