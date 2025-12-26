<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL; // <--- BARIS INI WAJIB ADA!

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Paksa HTTPS kalau di Vercel/Production
        if (env('VERCEL') || env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }

        Paginator::useTailwind();
    }
}