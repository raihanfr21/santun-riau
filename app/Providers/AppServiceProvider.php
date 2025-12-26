<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL; 

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Paksa HTTPS kalau di Vercel/Production
        if (config('app.env') === 'production' || env('VERCEL')) {
            URL::forceScheme('https');
        }

        Paginator::useTailwind();
    }
}