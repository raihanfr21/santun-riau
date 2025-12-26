<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator; // <--- Tambahkan Baris Ini

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if (env('VERCEL') || env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }
        Paginator::useTailwind(); // <--- Tambahkan Baris Ini
    }
}