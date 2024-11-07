<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();  // Log the user out
        $request->session()->invalidate();  // Invalidate the session
        $request->session()->regenerateToken();  // Regenerate the CSRF token

        return redirect()->route('login');  // Redirect to login page
    }
    public function showLoginForm()
    {
        return view('auth.login'); // Return your login view
    }

    public function login(Request $request)
    {
        // Validate the request
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            // Redirect based on role or default
            return $this->authenticated($request, Auth::user());
        }

        // If authentication fails, redirect back with an error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->isRole('admin')) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->isRole('perusahaan')) {
            return redirect()->route('perusahaan.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    }
}
