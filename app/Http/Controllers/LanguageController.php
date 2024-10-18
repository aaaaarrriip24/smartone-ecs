<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function changeLanguage($lang)
    {
        // Mengubah bahasa
        session(['app_locale' => $lang]);

        return redirect()->back();
    }
}
