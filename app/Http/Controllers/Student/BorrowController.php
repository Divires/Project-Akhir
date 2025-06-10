<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\Student;

class BorrowController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if ($user->role !== 'student') {
            abort(403, 'Hanya siswa yang dapat mengakses halaman ini.');
        }

        $query = Borrow::with(['book', 'student'])
            ->where('student_id', $user->id); 

        if ($request->has('status') && in_array($request->status, ['Dipinjam', 'Dikembalikan'])) {
            $query->where('status', $request->status);
        }

        $borrows = $query->orderByDesc('borrow_date')->get();

        return view('student.borrow', compact('borrows'));
    }
}
