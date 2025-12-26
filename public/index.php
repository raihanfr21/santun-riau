<?php

// 1. Paksa Tampilkan Error PHP (Biar tidak blank putih)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Cek apakah file ini terpanggil
echo "\n";

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// 2. Cek Maintenance Mode
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// 3. Cek Vendor Autoload (Sering error disini kalau composer gagal)
echo "\n";
if (!file_exists(__DIR__.'/../vendor/autoload.php')) {
    die("<h1>FATAL ERROR: Folder vendor tidak ditemukan! Composer belum jalan.</h1>");
}
require __DIR__.'/../vendor/autoload.php';
echo "\n";

// 4. Bootstrap Laravel
echo "\n";
try {
    /** @var Application $app */
    $app = require_once __DIR__.'/../bootstrap/app.php';
} catch (\Throwable $e) {
    die("<h1>ERROR BOOTSTRAP:</h1> " . $e->getMessage());
}
echo "\n";

// 5. Jalankan Request
echo "\n";
try {
    $app->handleRequest(Request::capture());
} catch (\Throwable $e) {
    die("<h1>ERROR SAAT REQUEST:</h1> " . $e->getMessage() . "<br>Line: " . $e->getLine() . "<br>File: " . $e->getFile());
}

echo "\n";