<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Student;
use Carbon\Carbon;

class BorrowController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status');

        $borrows = Borrow::with(['student', 'book'])
            ->when($status, fn($query) => $query->where('status', $status))
            ->orderByDesc('borrow_date')
            ->get();

        return view('admin.borrow.index', compact('borrows', 'status'));
    }

    public function create()
    {
        return view('admin.borrow.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nis' => 'required|exists:student,nis',
        'book_code' => 'required|exists:books,code',
        'borrow_date' => 'required|date',
    ]);

    $student = Student::where('nis', $request->nis)->first();
    $book = Book::where('code', $request->book_code)->first();

    if (!$book) {
        return back()->with('error', 'Buku tidak ditemukan.');
    }

    if ($book->stock <= 0) {
        return back()->with('error', 'Stok buku habis.');
    }

    // Kurangi stok
    $book->decrement('stock');

    // Buat peminjaman
    Borrow::create([
        'student_id' => $student->id,
        'book_id' => $book->id,
        'borrow_date' => $request->borrow_date,
        'expected_return_date' => Carbon::parse($request->borrow_date)->addDays(7),
        'status' => 'Dipinjam',
    ]);

    return redirect()->route('borrow.index')->with('success', 'Peminjaman berhasil.');
}
    public function returnForm($id)
    {
        $borrow = Borrow::with('book', 'student')->findOrFail($id);
        return view('admin.borrow.return', compact('borrow'));
    }

    public function returnBook(Request $request, $id)
    {
        $borrow = Borrow::findOrFail($id);
        $request->validate([
            'actual_return_date' => 'required|date',
        ]);

        // Hitung denda
        $expected = Carbon::parse($borrow->expected_return_date);
        $actual = Carbon::parse($request->actual_return_date);
        $fine = 0;
            if ($actual->gt($expected)) {
                $lateDays = $actual->diffInDays($expected);
                $fine = $lateDays * 1000;
            }
        // Kembalikan stok
        $borrow->book->increment('stock');

        $borrow->update([
            'actual_return_date' => $actual,
            'denda' => $fine,
            'status' => 'Dikembalikan'
        ]);

        return redirect()->route('borrow.index')->with('success', 'Buku berhasil dikembalikan.');
    }
}