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

use Illuminate\Support\Facades\DB;

Route::get('/install-db', function () {
    try {
        // 1. Putus semua koneksi lama
        DB::disconnect('pgsql');
        
        // 2. Gunakan koneksi mentah tanpa transaksi
        $pdo = DB::connection('pgsql')->getPdo();
        
        // 3. Bersihkan sisa-sisa yang mungkin nyangkut (lagi)
        $pdo->exec('DROP SCHEMA IF EXISTS public CASCADE');
        $pdo->exec('CREATE SCHEMA public');
        $pdo->exec('GRANT ALL ON SCHEMA public TO public');

        // 4. Jalankan migrasi melalui Artisan dengan flag --force
        // Kita tidak pakai migrate:fresh di sini karena kita sudah DROP manual
        Artisan::call('migrate', ['--force' => true]);

        return "<h1>ALHAMDULILLAH!</h1> Database berhasil dimigrasi dari nol.";
    } catch (\Throwable $e) {
        return "<h1>GAGAL LAGI:</h1> " . $e->getMessage();
    }
});
