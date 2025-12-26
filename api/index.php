<?php

// 1. BUAT FOLDER DI /tmp (MEMORY SERVER)
// Karena server Vercel read-only, kita pinjam folder /tmp
$dirs = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache', 
    '/tmp/storage/framework/sessions', 
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache'
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

// 2. PAKSA LARAVEL PAKE FOLDER TADI
// Kita suntikkan konfigurasi langsung ke environment variable server
putenv('APP_PACKAGES_CACHE=/tmp/bootstrap/cache/packages.php');
putenv('APP_SERVICES_CACHE=/tmp/bootstrap/cache/services.php');
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
putenv('SESSION_DRIVER=array'); // Matikan penyimpanan session file
putenv('LOG_CHANNEL=stderr');   // Paksa log ke layar console
putenv('APP_CONFIG_CACHE=/tmp/bootstrap/cache/config.php');
putenv('APP_ROUTES_CACHE=/tmp/bootstrap/cache/routes.php');

// 3. PANGGIL INDEX ASLI
// Setelah lingkungan "dipalsukan" ke /tmp, baru panggil Laravel asli
require __DIR__ . '/../public/index.php';