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
    public function showRegisterForm()
    {
        return view('auth.register');
    }

public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:2|confirmed',
        'role' => 'required|in:admin,student',
        'nis' => 'required_if:role,student|nullable|string|unique:student,nis',
        'class' => 'required_if:role,student|nullable|string',
        'position' => 'required_if:role,admin|nullable|string',
    ]);

    $hashedPassword = Hash::make($request->password);

    // Simpan ke tabel users
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $hashedPassword,
        'role' => $request->role,
        'nis' => $request->role === 'student' ? $request->nis : null,
        'class' => $request->role === 'student' ? $request->class : null,
        'position' => $request->role === 'admin' ? $request->position : null,
        'remember_token' => Str::random(60),
    ]);

    // Jika role student dan kamu memang butuh data di tabel students
    if ($request->role === 'student') {
        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'nis' => $request->nis,
            'class' => $request->class,
            'password' => $hashedPassword,
            'user_id' => $user->id, // lebih baik relasi
        ]);
    }

    return redirect()->route('login.form')->with('success', 'Registrasi berhasil! Silakan login.');
}

    public function showLoginForm()
    {
        return view('auth.login');
    }

public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        // Paksa agar tidak redirect ke 'intended'
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard.index');
        } elseif ($user->role === 'student') {
            return redirect()->route('student.dashboard');
        }

        Auth::logout(); // fallback kalau role tidak dikenali
        return redirect()->route('login')->withErrors(['email' => 'Role tidak dikenali.']);
    }

    return redirect()->route('login')->withErrors(['email' => 'Email atau password salah']);
}


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}