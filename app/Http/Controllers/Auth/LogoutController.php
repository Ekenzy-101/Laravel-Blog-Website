<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function store(Request $request)
    {
        Auth::logout();

        // Flush the session data and regenerate the ID
        $request->session()->invalidate();

        // Regenerate the CSRF token value
        $request->session()->regenerateToken();

        return redirect()->route("auth.login");
    }
}
