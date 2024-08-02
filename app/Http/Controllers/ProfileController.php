<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;
use Alert;
use Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = User::find(Auth::user()->id);
        return view('profile/index', compact('data'));
    }

    public function update(Request $request) 
    {
        User::where('id', $request->id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'updated_at' => Carbon::now(),
        ]);

        Alert::toast('Success Edit Profile!', 'success');
        return redirect()->route('profile');
    }

    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        Alert::toast('Success Update Password!', 'success');
        return redirect()->route('profile');
    }
}
