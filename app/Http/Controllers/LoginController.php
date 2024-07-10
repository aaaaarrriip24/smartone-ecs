<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Alert;

class LoginController extends Controller
{   
    /**
    * Write code on Method
    *
    * @return response()
    */

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Alert::toast('Selamat Datang ' .Auth::user()->name. ' !', 'success');
            return redirect()->route('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout ()
    {
        Auth::logout();
        return redirect('/');
    }
}
