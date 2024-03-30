<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\Provinsi;
use App\Models\KabKota;
use App\Models\Tipe;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DataTables;
use DB;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Delete Perusahaan!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        if ($request->ajax()) {
            $data = DB::table('m_perusahaan as ta')
            ->leftJoin('m_tipe_perusahaan as tb', 'ta.id_tipe', '=', 'tb.id')
            ->whereNull('ta.deleted_at')
            ->whereNull('tb.deleted_at')
            ->select('ta.*', 'tb.nama_tipe')
            ->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $urlEdit = url('perusahaan/show/'. $row->id);
                        $urlDetail = url('perusahaan/detail/'. $row->id);
                        $urlDelete = url('perusahaan/destroy/'. $row->id);
                        $button = '';
                        $button .= " <a href='".$urlEdit."' class='btn btn-outline-warning btn-sm btn-edit'>Edit</a>";
                        $button .= " <a href='".$urlDetail."' class='btn btn-outline-primary btn-sm btn-detail'>Detail</a>";
                        $button .= " <button data-href='".$urlDelete."' class='btn btn-outline-danger btn-sm btn-delete' >Delete</button>";
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('master/m_perusahaan/view');
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
        Perusahaan::insert([
            'nama_perusahaan' => $request->nama_perusahaan,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $provinsi = DB::table('indonesia_provinces')
        ->get();
        
        $kabkota = DB::table('indonesia_cities as ta')
        ->leftJoin('indonesia_provinces as tb', 'tb.code', '=', 'ta.province_code')
        ->select('*')
        ->get();
        
        $tipe = Tipe::all();
        $petugas = Petugas::all();

        $data = DB::table('m_perusahaan as ta')
        ->leftJoin('m_tipe_perusahaan as tb', 'ta.id_tipe', '=', 'tb.id')
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->where('ta.id', $id)
        ->select('ta.*', 'tb.nama_tipe')
        ->get();
        
        return view('master/m_perusahaan/edit', compact('data', 'provinsi', 'kabkota', 'tipe', 'petugas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Perusahaan $perusahaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Perusahaan::where('id', $request->id)
        ->update([
            'nama_perusahaan' => $request->nama_perusahaan,
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Perusahaan::find($id);
        $post->delete();
        return response()->json([
            "status"=>200, 
        ]);
    }
}
