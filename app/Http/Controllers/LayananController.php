<?php

namespace App\Http\Controllers;

use App\Models\TransaksiLain;
use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;
use Alert;

class LayananController extends Controller
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
        $title = 'Delete Layanan!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        $get_code = TransaksiLain::whereNull('deleted_at')->orderBy('kode_layanan_lainnya', 'DESC')->first();
        if($get_code == null) {
            $kode_code = "KLL-" . 1000 ;
        } else {
            $count_code = explode("KLL-", $get_code->kode_layanan_lainnya);
            $kode_code = "KLL-" . strval($count_code[1] + 1) ;
        }

        if ($request->ajax()) {
            $data = TransaksiLain::whereNull('deleted_at')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $url = url('layanan/destroy/'. $row->id);
                        $button = '';
                        $button .= " <button type='button' class='btn btn-outline-warning btn-sm btn-edit' value='".$row->id."'>Edit</button>";
                        $button .= " <button type='button' class='btn btn-outline-primary btn-sm btn-detail' value='".$row->id."'>Detail</button>";
                        $button .= " <button data-href='".$url."' class='btn btn-outline-danger btn-sm btn-delete' >Delete</button>";
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('master/layanan/view', compact('kode_code'));
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
        TransaksiLain::insert([
            'kode_layanan_lainnya' => $request->kode_layanan_lainnya . "-" . date('y', strtotime($request->tgl_partisipasi)),
            'bentuk_layanan' => $request->bentuk_layanan,
            'created_at' => Carbon::now(),
        ]);
        Alert::toast('Success Add Layanan!', 'success');
        return redirect()->route('layanan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = TransaksiLain::findOrFail($id);
        return response()->json([
            "status"=>200,
            "data"=>$data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        TransaksiLain::where('id', $request->id)
        ->update([
            'bentuk_layanan' => $request->bentuk_layanan,
            'updated_at' => Carbon::now(),
        ]);
        Alert::toast('Success Edit Topik!', 'success');
        return redirect()->route('layanan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = TransaksiLain::find($id)->delete();
        return response()->json([
            "status"=>200, 
        ]);
    }
}
