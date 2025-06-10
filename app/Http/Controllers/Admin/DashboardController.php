<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Borrow;
use Carbon\Carbon;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa = User::where('role', 'student')->count();

        $totalBuku = Book::sum('stock'); 

        $totalPeminjaman = Borrow::count();

        $belumDikembalikan = Borrow::where('status', 'Dikembalikan')->count();

        $pinjamanPerBulan = Borrow::selectRaw('MONTH(created_at) as bulan, COUNT(*) as total')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupByRaw('MONTH(created_at)')
            ->pluck('total', 'bulan')
            ->toArray();

       $chartData = [];
    for ($i = 1; $i <= 12; $i++) {
        $total = Borrow::whereMonth('borrow_date', $i)->count();
        $chartData[] = $total;
    }

        return view('admin.dashboard', [
            'totalSiswa' => $totalSiswa,
            'totalBuku' => $totalBuku,
            'totalPeminjaman' => $totalPeminjaman,
            'belumDikembalikan' => $belumDikembalikan,
            'chartData' => $chartData,
        ]);
    }
}