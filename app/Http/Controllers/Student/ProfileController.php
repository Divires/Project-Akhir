<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $student = Auth::user();
        if ($student->role !== 'student') {
            abort(403, 'Unauthorized');
        }
        return view('student.profile.index', compact('student'));
    }

    public function edit()
    {
        $student = Auth::user();
        return view('student.profile.edit', compact('student'));
    }

    public function update(Request $request)
    {
        $student = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . $student->id,
            'nis' => 'nullable|string|max:255',
            'class' => 'nullable|string|max:255',
            'photo' => 'nullable|image|max:2048', // optional photo upload
        ]);

        $student->name = $request->name;
        $student->email = $request->email;
        $student->nis = $request->nis;
        $student->class = $request->class;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $student->photo = $photoPath;
        }

        $student->save();

        return redirect()->route('student.profile.index')->with('success', 'Profile berhasil diperbarui.');
    }

    public function updatePassword(Request $request)
    {
        $student = Auth::user();

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if (!Hash::check($request->current_password, $student->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini salah']);
        }

        $student->password = Hash::make($request->password);
        $student->save();

        return redirect()->route('student.profile.index')->with('success', 'Password berhasil diperbarui.');
    }
}
