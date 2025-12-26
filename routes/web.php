<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

Route::get('/', [ReportController::class, 'index'])->name('home');
Route::post('/lapor', [ReportController::class, 'store'])->name('lapor.store');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::patch('/update/{id}', [AdminController::class, 'updateStatus'])->name('admin.update');
    Route::delete('/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
});

// Route Debugging & Install
Route::get('/install-db', function () {
    try {
        echo "<h1>Memulai Perbaikan...</h1>";

        // 1. BERSIHKAN CACHE (PENTING!)
        Artisan::call('optimize:clear');
        echo "✅ Cache Aplikasi Dibersihkan.<br>";
        
        Artisan::call('config:clear');
        echo "✅ Config Cache Dihapus.<br>";

        // 2. MIGRASI DATABASE
        Artisan::call('migrate --force');
        echo "✅ Tabel Database Berhasil Dibuat.<br>";
        
        // 3. SEEDER (Bikin Admin)
        Artisan::call('db:seed --class=AdminSeeder --force');
        echo "✅ Akun Admin Berhasil Dibuat.<br>";
        
        return "<h1>SUKSES TOTAL! Silakan Login.</h1>";
        
    } catch (\Throwable $e) {
        // Tampilkan Error Lengkap
        return '<h1 style="color:red">MASIH ERROR :(</h1>' .
               '<pre>' . $e->getMessage() . '</pre><br>' .
               '<small>File: ' . $e->getFile() . ' baris ' . $e->getLine() . '</small>';
    }
});