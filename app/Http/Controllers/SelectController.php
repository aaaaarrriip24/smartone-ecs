<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SelectController extends Controller
{
    public function selectbm(Request $request) {
        $data = DB::table('m_negara')
        ->whereNull('deleted_at')
        ->select('*')
        ->get();

        if($request->term) {
            $data = DB::table('m_negara')
            ->where('en_short_name', 'LIKE', '%'. $request->term. '%')
            ->get();
        }

        return $data;
    }
    public function selectperusahaan(Request $request) {
        $data = DB::table('m_perusahaan')
        ->whereNull('deleted_at')
        ->select('*')
        ->get();

        if($request->term) {
            $data = DB::table('m_perusahaan')
            ->where('nama_perusahaan', 'LIKE', '%'. $request->term. '%')
            ->get();
        }

        return $data;
    }
    public function selecttopik(Request $request) {
        $data = DB::table('m_topik')
        ->whereNull('deleted_at')
        ->select('*')
        ->get();

        if($request->term) {
            $data = DB::table('m_topik')
            ->where('nama_topik', 'LIKE', '%'. $request->term. '%')
            ->get();
        }

        return $data;
    }
    public function selectpetugas(Request $request) {
        $data = DB::table('m_petugas')
        ->whereNull('deleted_at')
        ->select('*')
        ->get();

        if($request->term) {
            $data = DB::table('m_petugas')
            ->where('nama_petugas', 'LIKE', '%'. $request->term. '%')
            ->get();
        }

        return $data;
    }
}
