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
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Student\ProfileController as StudentProfileController;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use App\Http\Controllers\Student\BorrowController as StudentBorrowController;

Route::get('/', function () {
    return redirect()->route('login.form');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('books', BookController::class);
    Route::resource('students', StudentController::class);
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/borrow', [BorrowController::class, 'index'])->name('borrow.index');
    Route::get('/borrow/create', [BorrowController::class, 'create'])->name('borrow.create');
    Route::post('/borrow', [BorrowController::class, 'store'])->name('borrow.store');
    Route::get('/borrow/{id}/return', [BorrowController::class, 'returnForm'])->name('borrow.returnForm');
    Route::post('/borrow/{id}/return', [BorrowController::class, 'returnBook'])->name('borrow.returnBook');
});


Route::middleware(['auth', 'student'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', [StudentDashboardController::class, 'index'])
    ->name('dashboard');
    Route::get('/borrow', [StudentBorrowController::class, 'index'])->name('borrow');

});

// Route::get('/dashboard', function () {
//         return view('dashboard');
//     });
    
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

// Route::get('/peminjaman', function () {
//     return view('peminjaman');
// });

// Route::get('/createpeminjaman', function () {
//     return view('createpeminjaman');
// });

// Route::get('/peminjaman/pengembalian', function () {
//     return view('pengembalian');
// });

// Route::get('/login', function () {
//     return view('login');
// });

// Route::get('/register', function () {
//     return view('register');
// });

// Route::get('/profil', function () {
//     return view('profil');
// });

// Route::get('/editprofil', function () {
//     return view('editprofil');
// });



// Route::get('/resources/views/buku', function () {
//     return view('buku');
// });


Route::resource('books', BookController::class);
Route::resource('students', StudentController::class);


Route::get('/profile', [StudentProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/edit', [StudentProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile', [StudentProfileController::class, 'update'])->name('profile.update');