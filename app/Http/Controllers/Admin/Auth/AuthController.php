<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Show the login form
    public function index()
    {
        return view('admin.auth.login');
    }

    // Handle admin login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            // Redirect to dashboard if login is successful
            return redirect()->intended('admin/dashboard')->with('success', 'You have successfully logged in.');
        }

        // Redirect back with an error message if login fails
        return redirect()->route('login.admin')->withErrors(['email' => 'Invalid credentials.']);
    }

    // Handle admin logout
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        
        // Invalidate and regenerate session token for security
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to login with a success message
        return redirect()->route('login.admin')->with('success', 'You have successfully logged out.');
    }

    // Admin dashboard view
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Home page view (if needed for admin)
    public function HomePage()
    {
        return view('admin.Home');
    }
}
