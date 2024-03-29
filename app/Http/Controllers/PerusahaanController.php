<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\Provinsi;
use App\Models\KabKota;
use App\Models\Tipe;
use App\Models\Petugas;
use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;
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
            $data = DB::table('master_perusahaan as ta')
            ->leftJoin('master_tipe_perusahaan as tb', 'ta.id_tipe', '=', 'tb.id')
            ->whereNull('ta.deleted_at')
            ->whereNull('tb.deleted_at')
            ->select('ta.*', 'tb.nama_tipe')
            ->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $url = url('perusahaan/destroy/'. $row->id);
                        $button = '';
                        $button .= " <button type='button' class='btn btn-outline-warning btn-sm btn-edit' value='".$row->id."'>Edit</button>";
                        $button .= " <button type='button' class='btn btn-outline-primary btn-sm btn-detail' value='".$row->id."'>Detail</button>";
                        $button .= " <button data-href='".$url."' class='btn btn-outline-danger btn-sm btn-delete' >Delete</button>";
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('master/perusahaan/view');
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
        // $provinsi = Provinsi::all();
        // $kabkota = DB::table('t_kabupaten_kota as ta')
        // ->leftJoin('t_provinsi as tb', 'ta.id_provinsi', '=', 'tb.id')
        // ->whereNull('ta.deleted_at')
        // ->whereNull('tb.deleted_at')
        // ->get();
        
        // $tipe = Tipe::all();
        // $petugas = Petugas::all();

        $data = DB::table('master_perusahaan as ta')
        ->leftJoin('master_tipe_perusahaan as tb', 'ta.id_tipe', '=', 'tb.id')
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->select('ta.*', 'tb.nama_tipe')
        ->where('ta.id', $id)
        ->get();
        
        return response()->json([
            "status"=> 200,
            "data"=> $data,
            // "provinsi"=> $provinsi,
            // "kabkota"=> $kabkota,
            // "tipe"=> $tipe, 
            // "petugas"=> $petugas,
        ]);
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
