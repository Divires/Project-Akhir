<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // Tampilkan form register
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|unique:student,email',
            'password' => 'required|string|min:2|confirmed',
            'role' => 'required|in:admin,student',
            'nis' => 'required_if:role,student|nullable|string|unique:student,nis',
            'class' => 'required_if:role,student|nullable|string',
            'position' => 'required_if:role,admin|nullable|string',
        ]);

        // Simpan ke tabel users
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'nis' => $request->role === 'student' ? $request->nis : null,
            'class' => $request->role === 'student' ? $request->class : null,
            'position' => $request->role === 'admin' ? $request->position : null,
            'remember_token' => Str::random(60),
        ]);

        // Jika student → Simpan juga ke tabel student
        if ($request->role === 'student') {
            Student::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'class' => $request->class,
                'nis' => $request->nis,
                'remember_token' => Str::random(60),
            ]);
        }

        return redirect()->route('login.form')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // Tampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if(Auth::user()->role == 'admin') {
                return redirect()->intended('/admin/dashboard');
            } else {
                return redirect()->intended('/student/dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
