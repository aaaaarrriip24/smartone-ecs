<?php

namespace App\Http\Controllers;

use App\Models\MSubKategori;
use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;
use Alert;
use DB;

class MSubKategoriController extends Controller
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
        $title = 'Delete Sub Kategori Produk!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        $data = DB::table('m_sub_kategori as ta')
        ->leftJoin('m_k_produk as tb', 'tb.id', '=', 'ta.id_kategori')
        ->select('ta.id as id_sub', 'tb.id as id_kategori', 'ta.nama_sub_kategori', 'tb.id','tb.nama_kategori_produk')
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->orderBy('tb.nama_kategori_produk', 'ASC')
        ->orderBy('ta.nama_sub_kategori', 'ASC')
        ->get();
        // $data = MSubKategori::whereNull('deleted_at')->get();
        if ($request->ajax()) {
            $data = DB::table('m_sub_kategori as ta')
            ->leftJoin('m_k_produk as tb', 'tb.id', '=', 'ta.id_kategori')
            ->select('ta.id as id_sub', 'tb.id as id_kategori', 'ta.nama_sub_kategori', 'tb.id','tb.nama_kategori_produk')
            ->whereNull('ta.deleted_at')
            ->whereNull('tb.deleted_at')
            ->orderBy('tb.nama_kategori_produk', 'ASC')
            ->orderBy('ta.nama_sub_kategori', 'ASC')
            ->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $url = url('sub_kategori/destroy/'. $row->id_sub);
                        $button = '';
                        $button .= " <button type='button' class='btn btn-outline-warning btn-sm btn-edit' value='".$row->id_sub."'>Edit</button>";
                        $button .= " <button type='button' class='btn btn-outline-primary btn-sm btn-detail' value='".$row->id_sub."'>Detail</button>";
                        $button .= " <button data-href='".$url."' class='btn btn-outline-danger btn-sm btn-delete' >Delete</button>";
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('master/m_sub_kategori/view');
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
        MSubKategori::insert([
            'id_kategori' => $request->id_kategori,
            'nama_sub_kategori' => $request->nama_sub_kategori,
            'created_at' => Carbon::now(),
        ]);
        Alert::toast('Success Add Sub Kategori Produk!', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MSubKategori  $mSubKategori
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('m_sub_kategori as ta')
        ->leftJoin('m_k_produk as tb', 'tb.id', '=', 'ta.id_kategori')
        ->select('ta.id as id_sub', 'tb.id as id_kategori', 'ta.nama_sub_kategori', 'tb.id','tb.nama_kategori_produk')
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->orderBy('tb.nama_kategori_produk', 'ASC')
        ->orderBy('ta.nama_sub_kategori', 'ASC')
        ->where('ta.id', $id)
        ->first();
        // $data = MSubKategori::findOrFail($id);
        return response()->json([
            "status"=>200,
            "data"=>$data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MSubKategori  $mSubKategori
     * @return \Illuminate\Http\Response
     */
    public function edit(MSubKategori $mSubKategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MSubKategori  $mSubKategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        MSubKategori::where('id', $request->id)
        ->update([
            'id_kategori' => $request->id_kategori,
            'nama_sub_kategori' => $request->nama_sub_kategori,
            'updated_at' => Carbon::now(),
        ]);
        Alert::toast('Success Edit Sub Kategori Produk!', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MSubKategori  $mSubKategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = MSubKategori::find($id);
        $post->delete();
        return response()->json([
            "status"=>200, 
        ]);
    }
}
