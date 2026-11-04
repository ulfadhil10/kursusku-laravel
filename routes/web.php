<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('courses', CourseController::class);

$coursesData = [
    1 => ['name' => 'Web Dasar', 'quota' => 30, 'registered' => 12],
    2 => ['name' => 'PHP Dasar', 'quota' => 30, 'registered' => 18],
    3 => ['name' => 'PHP Lanjutan', 'quota' => 25, 'registered' => 24],
    4 => ['name' => 'Laravel Fundamental', 'quota' => 25, 'registered' => 25],
    5 => ['name' => 'MySQL Dasar', 'quota' => 20, 'registered' => 0],
    6 => ['name' => 'UI Web Dasar', 'quota' => 35, 'registered' => 9],
];

// 1. Route untuk menampilkan form
Route::get('/pendaftaran', function () use ($coursesData) {
    // Data tambahan untuk mengisi dropdown di form sesuai gambar
    $programStudi = ['Teknik Informatika', 'Sistem Informasi', 'Ilmu Komputer', 'Lainnya'];
    $metodeBelajar = ['Online', 'Offline', 'Hybrid'];
    $jumlahPaket = ['1 paket', '2 paket', '3 paket'];

    return view('enrollments.create', [
        'courses' => $coursesData,
        'programStudi' => $programStudi,
        'metodeBelajar' => $metodeBelajar,
        'jumlahPaket' => $jumlahPaket
    ]);
})->name('enrollments.create');

// 2. Route untuk memproses form (Validasi disesuaikan dengan gambar)
Route::post('/pendaftaran/preview', function (Request $request) {
    $request->validate([
        'name' => ['required', 'string', 'min:3', 'max:100'],
        'email' => ['required', 'email'],
        'phone' => ['required', 'string', 'max:15'], // Tambahan No HP
        'program_studi' => ['required', 'string'], // Tambahan Program Studi
        'course_id' => ['required', 'integer'],
        'jenis_peserta' => ['required', 'in:Mahasiswa,Umum,Guru'], // Radio button
        'minat_tambahan' => ['nullable', 'array'], // Checkbox (bisa lebih dari satu)
        'minat_tambahan.*' => ['in:UI/UX,Database,Backend,Frontend'],
        'metode_belajar' => ['required', 'string'], // Dropdown metode
        'jumlah_paket' => ['required', 'string'], // Dropdown paket
        'catatan' => ['nullable', 'string', 'max:300'], // Textarea max 300 karakter
    ]);

    // Jika validasi lolos, kembalikan ke halaman sebelumnya dengan pesan sukses
    return back()->with('success', 'Form pendaftaran berhasil divalidasi!')->withInput();
})->name('enrollments.preview');

// 3. Route untuk cek sisa kuota (tidak ada perubahan)
Route::get('/courses/{course}/availability', function (int $course) use ($coursesData) {
    abort_unless(isset($coursesData[$course]), 404);
    $data = $coursesData[$course];
    $remaining = max(0, $data['quota'] - $data['registered']);
    return response()->json(['course' => $data['name'], 'remaining' => $remaining]);
})->name('courses.availability');