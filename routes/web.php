<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
// --- IMPORT CONTROLLER WAJIB ADA DI SINI ---
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController; // <--- INI KUNCI PERBAIKANNYA

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman Depan
Route::get('/', [ReportController::class, 'index'])->name('home');
Route::post('/lapor', [ReportController::class, 'store'])->name('lapor.store');

// --- ROUTE AUTH (LOGIN/LOGOUT) ---
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- ROUTE ADMIN ---
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::patch('/update/{id}', [AdminController::class, 'updateStatus'])->name('admin.update');
    Route::delete('/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
});

// Pastikan use ini ada di paling atas file
use Illuminate\Support\Facades\DB;

Route::get('/install-db', function () {
    try {
        // 1. NUCLEAR WIPE: Hapus Schema Public secara paksa
        // Ini akan memusnahkan semua tabel yang nyangkut/error
        DB::statement('DROP SCHEMA public CASCADE');
        DB::statement('CREATE SCHEMA public');
        
        // 2. JALANKAN MIGRATE DARI NOL
        // Karena database sudah kosong melompong, migrate pasti lancar
        Artisan::call('migrate --force');
        
        // 3. JALANKAN SEEDER (Opsional, kalau ada AdminSeeder)
        // Artisan::call('db:seed --class=AdminSeeder --force');

        return "<h1>SUKSES TOTAL!</h1> Database sudah di-reset bersih dan dimigrasi ulang.";
    } catch (\Throwable $e) {
        // Tampilkan error lengkap biar ketahuan
        return "<h1>GAGAL:</h1> " . $e->getMessage();
    }
});