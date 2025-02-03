<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Log; 
class SetLanguage
{
    public function handle($request, Closure $next)
    {
        if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        } else {
            // Set default locale jika session tidak ada
            App::setLocale('en');
        }

        // Debug log untuk memeriksa locale yang aktif
        Log::info('Locale aktif: ' . App::getLocale());

        return $next($request);
    }
}
