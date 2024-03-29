<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;
use DB;

class DataController extends Controller
{
    public function provinsi(Request $request)
    {
        $data = Provinsi::where('nama_provinsi','like','%'.$request->q.'%')->get();
        return response()->json([
            "status"=>200,
            "data"=>$data, 
        ]);
    }
    public function kabkota(Request $request)
    {   
        $search = $request->q;
        $data = DB::table('t_kabupaten_kota as ta')
        ->leftJoin('t_provinsi as tb', 'ta.id_provinsi', '=', 'tb.id')
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->where('nama_kabupaten_kota','LIKE',"%$search%")
        ->get();

        return response()->json([
            "status"=>200,
            "data"=>$data, 
        ]);
    }
}
