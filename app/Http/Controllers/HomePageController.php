<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Alert;

class HomePageController extends Controller
{
    public function index()
    {
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
