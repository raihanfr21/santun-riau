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

// --- ROUTE INSTALL DB (HANYA UNTUK DEPLOY VERCEL) ---
Route::get('/install-db', function () {
    try {
        Artisan::call('optimize:clear'); // Bersihkan cache dulu
        Artisan::call('migrate --force');
        Artisan::call('db:seed --class=AdminSeeder --force');
        return "<h1>SUKSES! Database & Admin Siap.</h1>";
    } catch (\Throwable $e) {
        return "<h1>ERROR:</h1> " . $e->getMessage();
    }
});