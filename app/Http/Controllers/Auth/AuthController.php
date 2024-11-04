<?php

//php artisan make:controller Auth/AuthController
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{

    public function showLoginForm(){
        return view('auth.login');
    }

    public function showRegisterForm(){
        return view('auth.register');
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
     
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        $rememberCookieName = 'remember_web_' . sha1(config('auth.guards.web.provider.model'));
        $cookie = cookie($rememberCookieName, null, -1);
    
        return redirect()->route('login')->with('success', 'Account has been logged out')->cookie($cookie);
    }
    

    

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember'); // 检查是否选中“记住我”
    
        // 尝试登录
        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended('dashboard')->with('success', 'You have successfully logged in.');
        }
    
        // 登录失败，返回错误
        return redirect()->route('login')->withErrors(['email' => 'Invalid credentials.']);
    }
    

    public function Register(Request $request){

         $request->validate([
            'name'=> 'required|string',
            'email' =>'required|string|email',
            'password'=>'required|string|min:8|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=>Hash::make($request->password)
        ]);

        return redirect()->route('login')->with('success','Account created successfully');

    }

    public function dashboard(){
        return view('dashboard')->with('name', Auth::user()->name);
    }
}
