<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/install-db', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate --force');
        \Illuminate\Support\Facades\Artisan::call('db:seed --class=AdminSeeder --force');
        
        return '<h1>SUKSES!</h1> Database berhasil dimigrasi dan Akun Admin sudah dibuat.';
    } catch (\Exception $e) {
        return '<h1>GAGAL :(</h1>' . $e->getMessage();
    }
});