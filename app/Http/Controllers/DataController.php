<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;
use DB;

class DataController extends Controller
{
    public function provinces(Request $request)
    {
        $data = DB::table('indonesia_provinces')
        ->get();

        if($request->term) {
            $data = DB::table('indonesia_provinces')
            ->where('name', 'LIKE', '%'. $request->term. '%')
            ->get();
        }

        return $data;
    }

    public function cities(Request $request)
    {
        $data = DB::table('indonesia_cities')
        ->where('province_id', $request->province_id)
        ->get();

        if($request->term) {
            $data = DB::table('indonesia_cities')
            ->where('province_id', $request->province_id)
            ->where('name', 'LIKE', '%'. $request->term. '%')
            ->get();
        }

        return $data;
    }

    public function districts(Request $request)
    {
        $data = DB::table('indonesia_districts')
        ->where('city_id', $request->city_id)
        ->get();

        if($request->term) {
            $data = DB::table('indonesia_districts')
            ->where('city_id', $request->city_id)
            ->where('name', 'LIKE', '%'. $request->term. '%')
            ->get();
        }
        return $data;
    }

    public function villages(Request $request)
    {
        $data = DB::table('indonesia_villages')
        ->where('district_id', $request->district_id)
        ->get();

        if($request->term) {
            $data = DB::table('indonesia_villages')
            ->where('district_id', $request->district_id)
            ->where('name', 'LIKE', '%'. $request->term. '%')
            ->get();
        }
        return $data;
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
