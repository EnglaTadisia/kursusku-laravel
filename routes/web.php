<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\AuthController;


// ========================================
// ROUTE BERANDA
// ========================================

Route::get('/', [HomeController::class, 'index'])
    ->name('home');


// ========================================
// ROUTE LOGIN
// ========================================

Route::middleware('guest')->group(function () {

    // Menampilkan halaman login
    Route::get('/login', [AuthController::class, 'login'])
        ->name('login');

    // Proses login
    Route::post('/login', [AuthController::class, 'authenticate'])
        ->name('login.process');

});


// ========================================
// ROUTE PENDAFTARAN
// ========================================

Route::get('/pendaftaran', function () {
    return redirect()->route('enrollments.create');
})->name('pendaftaran');


// ========================================
// ROUTE VALIDASI FORM PENDAFTARAN
// ========================================

Route::post('/pendaftaran/preview', function (Request $request) {

    $data = $request->validate([
        'name' => ['required', 'string', 'min:3', 'max:100'],
        'email' => ['required', 'email'],
        'course_id' => ['required', 'integer'],
    ]);

    return back()
        ->with('success', 'Form lolos validasi.')
        ->withInput();

})->name('enrollments.preview');


// ========================================
// ROUTE KETERSEDIAAN KURSI
// ========================================

Route::get('/courses/{course}/availability', function (int $course) {

    $availability = [
        1 => [
            'course' => 'Web Dasar',
            'remaining' => 12,
        ],
        2 => [
            'course' => 'PHP Dasar',
            'remaining' => 8,
        ],
        3 => [
            'course' => 'Laravel Dasar',
            'remaining' => 4,
        ],
    ];

    abort_unless(isset($availability[$course]), 404);

    return response()->json($availability[$course]);

})->name('courses.availability');


// ========================================
// ROUTE CRUD COURSE
// ========================================

Route::resource('courses', CourseController::class);


// ========================================
// ROUTE ENROLLMENT
// ========================================

Route::resource('enrollments', EnrollmentController::class)
    ->only(['index', 'create', 'store']);


// ========================================
// ROUTE HALAMAN AKUN SETELAH LOGIN
// ========================================

Route::middleware('auth')->group(function () {

    // Informasi akun
    Route::get('/akun', [AuthController::class, 'profile'])
        ->name('account.profile');

    // Ganti password
    Route::put('/akun/password', [AuthController::class, 'changePassword'])
        ->name('account.password');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

});
