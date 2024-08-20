<?php

namespace App\Http\Controllers;

use App\Mail\SendPasswordMail;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;
use DataTables;
use Alert;
use Auth;
use Mail;
use DB;

class ManagementUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        if ($request->ajax()) {
            $data = User::where('id', '!=', Auth::user()->id)->where('email', '!=', 'arifsyahputra137@gmail.com')->whereNull('deleted_at')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action',    function($row){
                        $url = url('user/destroy/'. $row->id);
                        $urlSend = url('user/send/'. $row->id);
                        $button = '';
                        $button .= " <button type='button' class='btn btn-outline-warning btn-sm btn-edit' value='".$row->id."'>Edit</button>";
                        $button .= " <button type='button' class='btn btn-outline-primary btn-sm btn-detail' value='".$row->id."'>Detail</button>";
                        $button .= " <button data-href='".$urlSend."' data-id='".$row->id."' class='btn btn-outline-success btn-sm btn-send' >Send Password</button>";
                        $button .= " <button data-href='".$url."' class='btn btn-outline-danger btn-sm btn-delete' >Delete</button>";
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('setting/m_user/view');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email = DB::table('users')->where('email', $request->email)->first();
        if(empty($email)) {
            User::insert([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'roleuser' => $request->roleuser,
                'password' => Hash::make(Str::random(8)),
                'created_at' => Carbon::now(),
                // Hash::make($data['password'])
            ]);
            Alert::toast('Success Add User!', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Email Sudah Terdaftar!', 'error');
            return redirect()->back();
        }
    }

    public function send(Request $request)
    {
        $data = User::findOrFail($request->id);
        $password = Str::random(8);
        $update = User::where('id', $data->id)->update([
            'password' => Hash::make($password),
        ]);
        $details = [
            'name' => $data->name,
            'email' => $data->email,
            'password' => $password
        ];
        Mail::to($data->email)->queue(new SendPasswordMail($details));
        return response()->json([
            "status" => 200
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::findOrFail($id);
        return response()->json([
            "status"=>200,
            "data"=>$data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function edit(Petugas $petugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        User::where('id', $request->id)
        ->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'roleuser' => $request->roleuser,
            'updated_at' => Carbon::now(),
        ]);
        Alert::toast('Success Edit User!', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = User::find($id);
        $post->delete();
        return response()->json([
            "status"=>200, 
        ]);
    }
}
