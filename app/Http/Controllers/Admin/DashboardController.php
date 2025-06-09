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
        // Total siswa (anggap guard 'siswa' atau role siswa)
        $totalSiswa = User::where('role', 'student')->count();

        // Total buku berdasarkan jumlah stok
        $totalBuku = Book::sum('stock'); // atau Book::all()->sum('stock');

        // Total semua peminjaman
        $totalPeminjaman = Borrow::count();

        // Total peminjaman dengan status belum dikembalikan
        $belumDikembalikan = Borrow::where('status', 'Dipinjam')->count();

        // Data peminjaman per bulan (1 tahun berjalan)
        $pinjamanPerBulan = Borrow::selectRaw('MONTH(created_at) as bulan, COUNT(*) as total')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupByRaw('MONTH(created_at)')
            ->pluck('total', 'bulan')
            ->toArray();

        // Menyusun data peminjaman per bulan dari Jan ke Des
        $dataChart = [];
        for ($i = 1; $i <= 12; $i++) {
            $dataChart[] = $pinjamanPerBulan[$i] ?? 0;
        }

        return view('admin.dashboard', [
            'totalSiswa' => $totalSiswa,
            'totalBuku' => $totalBuku,
            'totalPeminjaman' => $totalPeminjaman,
            'belumDikembalikan' => $belumDikembalikan,
            'chartData' => json_encode($dataChart),
        ]);
    }
}