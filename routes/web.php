<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\BorrowController;
use App\Http\Controllers\Admin\DashboardController;

// Landing Page
Route::get('/', function () {
    return view('landing');
})->name('landing');

// Auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Dashboard
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('admin.dashboard');
    // })->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/borrow', [BorrowController::class, 'index'])->name('borrow.index');
    
});

// Student Dashboard
Route::middleware(['auth', 'student'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', function () {
        return view('student.dashboard');
    })->name('dashboard');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

// Route::get('/buku', function () {
//     return view('buku');
// });

// Route::get('/createbuku', function () {
//     return view('createbuku');
// });

// Route::get('/readbuku', function () {
//     return view('readbuku');
// });

// Route::get('/editbuku', function () {
//     return view('editbuku');
// });

// Route::get('/siswa', function () {
//     return view('siswa');
// });

// Route::get('/createsiswa', function () {
//     return view('createsiswa');
// });

// Route::get('/editsiswa', function () {
//     return view('editsiswa');
// });

// Route::get('/readsiswa', function () {
//     return view('readsiswa');
// });

// Route::get('/login', function () {
//     return view('login');
// });
// Route::get('/register', function () {
//     return view('register');
// });




// Route::get('/resources/views/buku', function () {
//     return view('buku');
// });


Route::resource('books', BookController::class);
Route::resource('students', StudentController::class);
Route::get('/borrow', [BorrowController::class, 'index'])->name('borrow.index');
Route::get('/borrow/create', [BorrowController::class, 'create'])->name('borrow.create');
Route::post('/borrow', [BorrowController::class, 'store'])->name('borrow.store');
Route::get('/borrow/{id}/return', [BorrowController::class, 'returnForm'])->name('borrow.returnForm');
Route::post('/borrow/{id}/return', [BorrowController::class, 'returnBook'])->name('borrow.returnBook');