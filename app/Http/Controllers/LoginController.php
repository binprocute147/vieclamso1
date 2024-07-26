<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Kiểm tra đăng nhập cho user
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::guard('web')->user();
            if ($user) {
                $user->is_online = true;
                $user->save();
            }

            return redirect()->intended(route('index'));
        }

        // Kiểm tra đăng nhập cho admin
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không đúng.',
        ]);
    }

    // Đăng xuất
    public function logout(Request $request)
    {
        // Kiểm tra và cập nhật trạng thái online trước khi đăng xuất
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } else if (Auth::guard('web')->check()) {
            $user = Auth::guard('web')->user();
            Auth::guard('web')->logout();

            // Cập nhật trạng thái offline nếu có người dùng
            if ($user) {
                $user->is_online = false;
                $user->save();
            }
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
