<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageMiddleware
{
    public function handle($request, Closure $next)
    {
        // Ambil locale dari session atau gunakan default
        $locale = Session::get('locale', config('app.locale'));
        App::setLocale($locale);

        // Path ke file JSON
        $filePath = resource_path("lang/{$locale}.json");

        // Periksa apakah file ada
        if (file_exists($filePath)) {
            // Baca isi file dan decode JSON
            $translations = json_decode(file_get_contents($filePath), true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                \Log::error("JSON Error: " . json_last_error_msg());
            }
            view()->share('translations', $translations);
        } else {
            \Log::error("Language file not found: " . $filePath);
        }
    
        return $next($request);
    }
}
