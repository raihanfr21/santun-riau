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
        // 1. PUTUS KONEKSI LAMA (PENTING!)
        // Ini obat untuk error "current transaction is aborted"
        DB::purge('pgsql'); 
        
        // 2. Buat Koneksi Baru yang Segar (Raw PHP)
        $pdo = DB::connection('pgsql')->getPdo();

        // 3. JALANKAN SQL MANUAL (Tanpa Laravel Wrapper)
        // Hapus schema public dan buat ulang
        $pdo->exec('DROP SCHEMA public CASCADE');
        $pdo->exec('CREATE SCHEMA public');
        $pdo->exec('GRANT ALL ON SCHEMA public TO public'); // Kembalikan izin akses
        
        // 4. JALANKAN MIGRATE
        // Sekarang database sudah 100% kosong dan segar
        Artisan::call('migrate --force');
        
        // 5. Seed (Opsional, nyalakan jika perlu)
        // Artisan::call('db:seed --class=AdminSeeder --force');

        return "<h1>ALHAMDULILLAH SUKSES!</h1> Database sudah di-reset total via Raw Connection.";
        
    } catch (\Throwable $e) {
        return "<h1>GAGAL LAGI:</h1> " . $e->getMessage() . 
               "<br><br>Trace: " . $e->getTraceAsString();
    }
});