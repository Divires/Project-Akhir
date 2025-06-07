<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = Book::query();

    // Cek apakah ada keyword pencarian
    if ($request->has('search')) {
        $search = $request->search;
        $query->where('title', 'like', "%$search%")
              ->orWhere('code', 'like', "%$search%");
    }

    $books = $query->orderBy('created_at', 'asc')->get();
    return view('admin.books.index', compact('books'));
}

    /**
     * Show the form for creating a new resource.
     */
  public function create()
{
    // Ambil kode terakhir
    $lastBook = Book::orderBy('id', 'desc')->first();
    $lastCode = $lastBook ? intval(substr($lastBook->code, 2)) : 0;

    // Buat kode baru dengan format BK001, BK002, dst.
    $newCode = 'BK' . str_pad($lastCode + 1, 3, '0', STR_PAD_LEFT);

    // Kirim kode ke view
    return view('admin.books.create', compact('newCode'));
}


    /**
     * Store a newly created resource in storage.
     */
 public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'stock' => 'required|integer|min:0',
    ]);

    // Ambil kode terakhir
    $lastBook = Book::orderBy('id', 'desc')->first();
    $lastCode = $lastBook ? intval(substr($lastBook->code, 2)) : 0;

    // Buat kode baru dengan format BK001, BK002, dst.
    $newCode = 'BK' . str_pad($lastCode + 1, 3, '0', STR_PAD_LEFT);

    Book::create([
        'code' => $newCode,
        'title' => $request->title,
        'stock' => $request->stock,
    ]);

    return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        return view('admin.books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);

        $request->validate([
            'code' => 'required|unique:books,code,' . $book->id,
            'title' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
        ]);

        $book->update([
            'code' => $request->code,
            'title' => $request->title,
            'stock' => $request->stock,
        ]);

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
