<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class WebAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

      if (!Auth::attempt($credentials)) {
    $user = User::where('email', $request->email)->first();

    if (!$user) {
        // البريد غير موجود
        return back()->withErrors(['email' => 'البريد الإلكتروني غير موجود']);
    } elseif (!\Hash::check($request->password, $user->password)) {
        // كلمة المرور خاطئة
        return back()->withErrors(['password' => 'كلمة المرور خاطئة']);
    }
}

        return redirect()->route('dashboard');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
