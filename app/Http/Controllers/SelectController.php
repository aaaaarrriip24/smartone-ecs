<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SelectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function selectnegara(Request $request) {
        $data = DB::table('m_negara')
        ->whereNull('deleted_at')
        ->select('*')
        ->orderBy('en_short_name', 'ASC')
        ->get();

        if($request->term) {
            $data = DB::table('m_negara')
            ->where('en_short_name', 'LIKE', '%'. $request->term. '%')
            ->orderBy('en_short_name', 'ASC')
            ->get();
        }

        return $data;
    }

    public function selectk_produk(Request $request) {
        $data = DB::table('m_k_produk')
        ->whereNull('deleted_at')
        ->select('*')
        ->orderBy('nama_kategori_produk', 'ASC')
        ->get();

        if($request->term) {
            $data = DB::table('m_k_produk')
            ->where('nama_kategori_produk', 'LIKE', '%'. $request->term. '%')
            ->orderBy('nama_kategori_produk', 'ASC')
            ->get();
        }

        return $data;
    }

    public function selecttipe(Request $request) {
        $data = DB::table('m_tipe_perusahaan')
        ->whereNull('deleted_at')
        ->select('*')
        ->orderBy('nama_tipe', 'ASC')
        ->get();

        if($request->term) {
            $data = DB::table('m_tipe_perusahaan')
            ->where('nama_tipe', 'LIKE', '%'. $request->term. '%')
            ->orderBy('nama_tipe', 'ASC')
            ->get();
        }

        return $data;
    }

    public function selectperusahaan(Request $request) {
        $data = DB::table('m_perusahaan as ta')
        ->leftJoin('m_tipe_perusahaan as tb', 'ta.id_tipe', '=', 'tb.id')
        ->whereNull('ta.deleted_at')
        ->select('ta.*', 'tb.nama_tipe')
        ->orderBy('ta.nama_perusahaan', 'ASC')
        ->get();

        if($request->term) {
            $data = DB::table('m_perusahaan as ta')
            ->leftJoin('m_tipe_perusahaan as tb', 'ta.id_tipe', '=', 'tb.id')
            ->whereNull('ta.deleted_at')
            ->select('ta.*', 'tb.nama_tipe')
            ->where('ta.nama_perusahaan', 'LIKE', '%'. $request->term. '%')
            ->orderBy('ta.nama_perusahaan', 'ASC')
            ->get();
        }

        return $data;
    }

    public function selecttopik(Request $request) {
        $data = DB::table('m_topik')
        ->whereNull('deleted_at')
        ->select('*')
        ->orderBy('nama_topik', 'ASC')
        ->get();

        if($request->term) {
            $data = DB::table('m_topik')
            ->where('nama_topik', 'LIKE', '%'. $request->term. '%')
            ->orderBy('nama_topik', 'ASC')
            ->get();
        }

        return $data;
    }

    public function selectpetugas(Request $request) {
        $data = DB::table('m_petugas')
        ->whereNull('deleted_at')
        ->select('*')
        ->orderBy('nama_petugas', 'ASC')
        ->get();

        if($request->term) {
            $data = DB::table('m_petugas')
            ->where('nama_petugas', 'LIKE', '%'. $request->term. '%')
            ->orderBy('nama_petugas', 'ASC')
            ->get();
        }

        return $data;
    }

    public function selectbm(Request $request) {
        $data = DB::table('t_bm')
        ->whereNull('deleted_at')
        ->select('*')
        ->orderBy('kode_bm', 'ASC')
        ->get();

        if($request->term) {
            $data = DB::table('t_bm')
            ->where('kode_bm', 'LIKE', '%'. $request->term. '%')
            ->orderBy('kode_bm', 'ASC')
            ->get();
        }

        return $data;
    }
    
    public function selectinquiry(Request $request) {
        $data = DB::table('t_profile_inquiry')
        ->whereNull('deleted_at')
        ->select('*')
        ->orderBy('kode_inquiry', 'ASC  ')
        ->get();

        if($request->term) {
            $data = DB::table('t_profile_inquiry')
            ->where('kode_inquiry', 'LIKE', '%'. $request->term. '%')
            ->orderBy('kode_inquiry', 'ASC  ')
            ->get();
        }

        return $data;
    }
}
