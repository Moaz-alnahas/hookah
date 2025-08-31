<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ApiAuthController extends Controller
{

    private function formatUser(User $user) {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'coin' => $user->coin,
            'image' => url("assets/images/{$user->image}"),
        ];
    }

    // تسجيل الدخول
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'بيانات تسجيل الدخول غير صحيحة'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('flutter-app')->plainTextToken;
        $message = "success";

        return response()->json([
            'message' => $message,
            'token' => $token,
            'user' => $this->formatUser($user),
        ]);
    }

    // تسجيل مستخدم جديد
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed',
            'phone' => 'required|string',
            'address' => 'nullable|string',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone' => $data['phone'],
            'address' => $data['address'] ?? null,
            'image' => 'user.png', // الصورة الافتراضية
            'coin' => 0,
        ]);

        $token = $user->createToken('flutter-app')->plainTextToken;
        $message = "success";

        return response()->json([
            'message' => $message,
            'token' => $token,
            'user' => $this->formatUser($user),
        ]);
    }

    // استرجاع بيانات المستخدم الحالي
    public function user(Request $request)
    {
        $user = $request->user();
        return response()->json($this->formatUser($user));
    }

    // تسجيل الخروج
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'تم تسجيل الخروج']);
    }
}
