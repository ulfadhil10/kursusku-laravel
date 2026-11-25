<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\ProfileController;


// Authentication
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->name('login.store');

    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('/reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

// Authenticated User
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('profile.index');
});


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('courses', CourseController::class);
Route::get('/enrollments', [EnrollmentController::class, 'index'])
    ->name('enrollments.index');

Route::get('/enrollments/create', [EnrollmentController::class, 'create'])
    ->name('enrollments.create');

Route::post('/enrollments', [EnrollmentController::class, 'store'])
    ->name('enrollments.store');

$coursesData = [
    1 => ['name' => 'Web Dasar', 'quota' => 30, 'registered' => 12],
    2 => ['name' => 'PHP Dasar', 'quota' => 30, 'registered' => 18],
    3 => ['name' => 'PHP Lanjutan', 'quota' => 25, 'registered' => 24],
    4 => ['name' => 'Laravel Fundamental', 'quota' => 25, 'registered' => 25],
    5 => ['name' => 'MySQL Dasar', 'quota' => 20, 'registered' => 0],
    6 => ['name' => 'UI Web Dasar', 'quota' => 35, 'registered' => 9],
];

// Menampilkan form pendaftaran
Route::get('/pendaftaran', function () use ($coursesData) {
    $programStudi = ['Teknik Informatika', 'Sistem Informasi', 'Ilmu Komputer', 'Lainnya'];
    $metodeBelajar = ['Online', 'Offline', 'Hybrid'];
    $jumlahPaket = ['1 paket', '2 paket', '3 paket'];

    return view('pendaftaran.create', [
        'courses' => $coursesData,
        'programStudi' => $programStudi,
        'metodeBelajar' => $metodeBelajar,
        'jumlahPaket' => $jumlahPaket
    ]);
})->name('pendaftaran.create');

// Memproses dan memvalidasi form
Route::post('/pendaftaran/preview', function (Request $request) {
    $request->validate([
        'name' => ['required', 'string', 'min:3', 'max:100'],
        'email' => ['required', 'email'],
        'phone' => ['required', 'string', 'max:15'],
        'program_studi' => ['required', 'string'],
        'course_id' => ['required', 'integer'],
        'jenis_peserta' => ['required', 'in:Mahasiswa,Umum,Guru'],
        'minat_tambahan' => ['nullable', 'array'],
        'minat_tambahan.*' => ['in:UI/UX,Database,Backend,Frontend'],
        'metode_belajar' => ['required', 'string'],
        'jumlah_paket' => ['required', 'string'],
        'catatan' => ['nullable', 'string', 'max:300'],
    ]);

    return back()
        ->with('success', 'Form pendaftaran berhasil divalidasi!')
        ->withInput();
})->name('pendaftaran.preview');

// Mengecek sisa kuota kursus melalui Ajax
Route::get('/courses/{course}/availability', function (int $course) use ($coursesData) {
    abort_unless(isset($coursesData[$course]), 404);

    $data = $coursesData[$course];
    $remaining = max(0, $data['quota'] - $data['registered']);

    return response()->json([
        'course' => $data['name'],
        'remaining' => $remaining
    ]);
})->name('courses.availability');
