<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;
use DB;

class DataController extends Controller
{
    public function provinces()
    {
        return \Indonesia::allProvinces();
    }

    public function cities(Request $request)
    {
        return \Indonesia::findProvince($request->id, ['cities'])->cities->pluck('name', 'id');
    }

    public function districts(Request $request)
    {
        return \Indonesia::findCity($request->id, ['districts'])->districts->pluck('name', 'id');
    }

    public function villages(Request $request)
    {
        return \Indonesia::findDistrict($request->id, ['villages'])->villages->pluck('name', 'id');
    }
    // public function provinsi(Request $request)
    // {
    //     $data = Provinsi::where('nama_provinsi','like','%'.$request->q.'%')->get();
    //     return response()->json([
    //         "status"=>200,
    //         "data"=>$data, 
    //     ]);
    // }
    // public function kabkota(Request $request)
    // {   
    //     $search = $request->q;
    //     $data = DB::table('t_kabupaten_kota as ta')
    //     ->leftJoin('t_provinsi as tb', 'ta.id_provinsi', '=', 'tb.id')
    //     ->whereNull('ta.deleted_at')
    //     ->whereNull('tb.deleted_at')
    //     ->where('nama_kabupaten_kota','LIKE',"%$search%")
    //     ->get();

    //     return response()->json([
    //         "status"=>200,
    //         "data"=>$data, 
    //     ]);
    // }
}
