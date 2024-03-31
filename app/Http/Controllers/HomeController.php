<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TKonsultasi;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $section2 = TKonsultasi::whereNotNull('deleted_at')->get();
        return view('home', [
            'section2' => $section2,
            'status' => 200,
         ]);
    }
}
