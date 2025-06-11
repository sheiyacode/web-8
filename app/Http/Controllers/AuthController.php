<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = \App\Models\User::create([
            'name' => $request->full_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user',
        ]);

        Auth::login($user);
        return redirect()->route('dashboard.user')->with('success', 'Registrasi berhasil! Selamat datang.');
    }

    public function showLoginFormAdmin()
    {
        return view('auth.login_admin', ['role' => 'admin']);
    }

    public function showLoginFormUser()
    {
        return view('auth.login_user', ['role' => 'user']);
    }

    public function showLoginFormTutor()
    {
        return view('auth.login_tutor', ['role' => 'tutor']);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|in:user,tutor,admin',
        ]);

        $role = $credentials['role'];
        $email = $credentials['email'];
        $password = $credentials['password'];

        if ($role === 'admin') {
            $admin = \App\Models\Admin::where('email', $email)->first();
            if (!$admin) {
                return back()->withErrors(['email' => 'Email admin tidak ditemukan.'])->withInput();
            }

            if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password])) {
                $request->session()->regenerate();
                return redirect()->route('dashboard.admin');
            }

            return back()->withErrors(['password' => 'Password admin salah.'])->withInput();
        }

        if ($role === 'tutor') {
            $tutor = \App\Models\Tutor::where('email', $email)->first();
            if (!$tutor) {
                return back()->withErrors(['email' => 'Email tutor tidak ditemukan.'])->withInput();
            }

            if (Auth::guard('tutor')->attempt(['email' => $email, 'password' => $password])) {
                $request->session()->regenerate();
                return redirect()->route('dashboard.tutor');
            }

            return back()->withErrors(['password' => 'Password tutor salah.'])->withInput();
        }

        // USER default
        $user = \App\Models\User::where('email', $email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Email user tidak ditemukan.'])->withInput();
        }

        if (Auth::guard('web')->attempt(['email' => $email, 'password' => $password])) {
            $request->session()->regenerate();
            return redirect()->route('dashboard.user');
        }

        return back()->withErrors(['password' => 'Password user salah.'])->withInput();
    }

    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } elseif (Auth::guard('tutor')->check()) {
            Auth::guard('tutor')->logout();
        } else {
            Auth::logout(); // default 'web'
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
