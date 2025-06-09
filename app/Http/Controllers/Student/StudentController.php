<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrow;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function borrow()
    {
         // Ambil data siswa login (anggap menggunakan Auth::user()->id sebagai student_id)
        $studentId = Auth::user()->id;

        $borrow = Borrow::with('book')
            ->where('student_id', $studentId)
            ->orderByDesc('borrow_date')
            ->get();

        return view('student.borrow', compact('borrow'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
