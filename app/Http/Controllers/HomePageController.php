<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomePageController extends Controller
{
    public function index()
    {
        if(Auth::check()) {
            if(Auth::user()->roleuser == "Admin") {
                Alert::toast('Selamat Datang ' .Auth::user()->name. ' !', 'success');
                return redirect()->route('dashboard');
            } 
            return view('welcome');
        } 
        return view('welcome');
    }
    public function about()
    {
        return view('company_profile/about');
    }
    public function supplier()
    {
        return view('company_profile/supplier');
    }
    public function gallery()
    {
        return view('company_profile/gallery');
    }
    public function news()
    {
        return view('company_profile/news');
    }
    public function contact()
    {
        return view('company_profile/contact');
    }
}
