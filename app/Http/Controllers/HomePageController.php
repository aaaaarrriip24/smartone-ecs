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
    public function services()
    {
        return view('company_profile/services');
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
    public function our_konsultasi()
    {
        return view('company_profile/our-konsultasi');
    }
    public function our_inquiries()
    {
        return view('company_profile/our-inquiries');
    }
    public function our_bm()
    {
        return view('company_profile/our-bm');
    }
    public function our_panduan()
    {
        return view('company_profile/our-panduan');
    }
    public function other_service()
    {
        return view('company_profile/other-service');
    }
    public function our_supplier()
    {
        return view('company_profile/our-supplier');
    }
    public function our_market()
    {
        return view('company_profile/our-market');
    }
    public function other_relasi()
    {
        return view('company_profile/other-relasi');
    }
}
