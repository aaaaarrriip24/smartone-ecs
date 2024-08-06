<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Perusahaan;
use DB;

class DataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function provinces(Request $request)
    {
        $data = DB::table('indonesia_provinces')
        ->orderBy('name', 'ASC')
        ->get();

        if($request->term) {
            $data = DB::table('indonesia_provinces')
            ->where('name', 'LIKE', '%'. $request->term. '%')
            ->orderBy('name', 'ASC')
            ->get();
        }

        return $data;
    }

    public function cities(Request $request)
    {
        $data = DB::table('indonesia_cities')
        ->where('province_code', $request->province_id)
        ->orderBy('name', 'ASC')
        ->get();

        if($request->term) {
            $data = DB::table('indonesia_cities')
            ->where('province_code', $request->province_id)
            ->where('name', 'LIKE', '%'. $request->term. '%')
            ->orderBy('name', 'ASC')
            ->get();
        }

        return $data;
    }

    public function perusahaan_provinces(Request $request)
    {
        $sql = Perusahaan::select('id_provinsi')->whereNotNull('id_provinsi')->groupBy('id_provinsi')->get()->toArray();
        // $array = json_decode(json_encode($sql), true);
        // dd($sql);
        $data = DB::table('indonesia_provinces')
        ->whereIn('code', $sql)
        ->orderBy('name', 'ASC')
        ->get();

        if($request->term) {
            $data = DB::table('indonesia_provinces')
            ->whereIn('code', $sql)
            ->where('name', 'LIKE', '%'. $request->term. '%')
            ->orderBy('name', 'ASC')
            ->get();
        }

        return $data;
    }

    public function perusahaan_cities(Request $request)
    {
        $sql = Perusahaan::select('id_kabkota')->whereNotNull('id_kabkota')->groupBy('id_kabkota')->get()->toArray();
        // dd($sql);

        if(empty($request->province_id)) {
            $data = DB::table('indonesia_cities')
            ->whereIn('code', $sql)
            ->orderBy('name', 'ASC')
            ->get();
        } else {
            if($request->term) {
                $data = DB::table('indonesia_cities')
                ->whereIn('code', $sql)
                ->where('province_code', $request->province_id)
                ->where('name', 'LIKE', '%'. $request->term. '%')
                ->orderBy('name', 'ASC')
                ->get();
            }
        }


        return $data;
    }
}
