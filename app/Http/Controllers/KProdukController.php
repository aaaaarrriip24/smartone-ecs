<?php

namespace App\Http\Controllers;

use App\Models\KProduk;
use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;

class KProdukController extends Controller
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
        $title = 'Delete Kategori Produk!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        if ($request->ajax()) {
            $data = KProduk::whereNull('deleted_at')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $url = url('k_produk/destroy/'. $row->id);
                        $button = '';
                        $button .= " <button type='button' class='btn btn-outline-warning btn-sm btn-edit' value='".$row->id."'>Edit</button>";
                        $button .= " <button type='button' class='btn btn-outline-primary btn-sm btn-detail' value='".$row->id."'>Detail</button>";
                        $button .= " <button data-href='".$url."' class='btn btn-outline-danger btn-sm btn-delete' >Delete</button>";
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('master/m_k_produk/view');
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
        KProduk::insert([
            'nama_kategori_produk' => $request->nama_kategori_produk,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KProduk  $kProduk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $data = KProduk::findOrFail($id);
        return response()->json([
            "status"=>200,
            "data"=>$data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KProduk  $kProduk
     * @return \Illuminate\Http\Response
     */
    public function edit(KProduk $kProduk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KProduk  $KProduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        KProduk::where('id', $request->id)
        ->update([
            'nama_kategori_produk' => $request->nama_kategori_produk,
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = KProduk::find($id);
        $post->delete();
        return response()->json([
            "status"=>200, 
        ]);
    }
}
