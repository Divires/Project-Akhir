<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;

class BorrowController extends Controller
{
    public function index()
    {
        $borrow = Borrow::with('student', 'book')->get();
        return view('admin.borrow.index', compact('borrow'));
    }

public function create()
{
    $students = User::where('role', 'student')->get(); // asumsi nis dan nama di tabel users
    $books = Book::all();

    return view('loans.create', compact('students', 'books'));
}

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|exists:users,nis',
            'code' => 'required|exists:books,code',
        ]);

        $student = Student::where('nis', $request->nis)->first();
        $book = Book::where('code', $request->code)->first();

        if ($book->stock < 1) {
            return back()->withErrors(['stock' => 'Stok buku habis.']);
        }

        // Buat peminjaman
        Borrow::create([
            'student_id' => $student->id,
            'book_id' => $book->id,
            'borrow_date' => Carbon::now(),
            'return_date' => Carbon::now()->addDays(7),
        ]);

        // Kurangi stok
        $book->decrement('stock');

        return redirect()->route('borrow.index')->with('success', 'Peminjaman berhasil.');
    }

    public function return($id)
    {
        $borrow = Borrow::findOrFail($id);
        $borrow->return_date = Carbon::now();

        // Hitung denda
        if ($borrow->return_date->gt($borrow->return_date)) {
            $daysLate = $borrow->return_date->diffInDays($borrow->return_date);
            $borrow->denda = $daysLate * 1000;
        } else {
            $borrow->denda = 0;
        }

        $borrow->save();

        // Tambah stok buku
        $borrow->book->increment('stock');

        return redirect()->route('borrow.index')->with('success', 'Buku berhasil dikembalikan.');
    }

    public function denda()
    {
        $borrow = Borrow::whereNull('return_date')
                    ->where('return_date', '<', Carbon::now())
                    ->get();

        return view('admin.borrow.denda', compact('borrow'));
    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
