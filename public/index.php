<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// 1. Cek Maintenance Mode
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// 2. Register Composer
require __DIR__.'/../vendor/autoload.php';

// 3. Bootstrap Laravel
$app = require_once __DIR__.'/../bootstrap/app.php';

/* --- JURUS SAKTI VERCEL ---
   Memaksa Laravel menggunakan folder /tmp untuk penyimpanan 
   karena folder lain Read-Only.
*/
$app->useStoragePath('/tmp/storage');

// 4. Handle Request
$app->handleRequest(Request::capture());