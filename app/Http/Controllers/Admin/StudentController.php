<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index(Request $request)
    {
        $query = Student::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%$search%")
                    ->orWhere('nis', 'like', "%$search%")
                    ->orWhere('class', 'like', "%$search%");

        }

        $students = $query->orderBy('created_at', 'desc')->get();

        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
   public function create()
    {
        return view('admin.students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:student,email|unique:users,email',
            'password' => 'required|string|min:2|confirmed',
            'class' => 'required|string|max:50',
            'nis' => 'required|string|unique:student,nis|unique:users,nis',
        ]);

        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'class' => $request->class,
            'nis' => $request->nis,
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
            'role' => 'student',
            'nis' => $request->nis,
            'class' => $request->class,
        ]);

        return redirect()->route('admin.students.index')->with('success', 'Student berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
      public function show(string $id)
    {
        $student = Student::findOrFail($id);
        return view('admin.students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
      public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view('admin.students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, string $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:student,email,' . $student->id . '|unique:users,email,' . $student->email . ',email',
            'password' => 'nullable|string|min:2|confirmed',
            'class' => 'required|string|max:50',
            'nis' => 'required|unique:student,nis,' . $student->id . '|unique:users,nis,' . $student->nis . ',nis',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'class' => $request->class,
            'nis' => $request->nis,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $student->update($data);

        $user = User::where('email', $student->email)->first();
        if ($user) {
            $user->update($data);
        }

        return redirect()->route('admin.students.index')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);

        User::where('email', $student->email)->delete();

        $student->delete();

        return redirect()->route('admin.students.index')->with('success', 'Student deleted successfully.');
    }

}
