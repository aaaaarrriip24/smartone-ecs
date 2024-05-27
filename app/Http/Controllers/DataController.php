<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
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
        ->where('province_code', $request->province_id)
        ->get();

        if($request->term) {
            $data = DB::table('indonesia_cities')
            ->where('province_code', $request->province_id)
            ->where('name', 'LIKE', '%'. $request->term. '%')
            ->get();
        }

        return $data;
    }
}
