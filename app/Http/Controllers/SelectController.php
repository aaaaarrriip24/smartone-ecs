<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DataTables;

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

    public function select_sub_kategori(Request $request) {
        $data = DB::table('m_sub_kategori')
        ->whereNull('deleted_at')
        ->select('*')
        ->where('id_kategori', $request->id_kategori)
        ->orderBy('nama_sub_kategori', 'ASC')
        ->get();

        if($request->term) {
            $data = DB::table('m_sub_kategori')
            ->where('nama_sub_kategori', 'LIKE', '%'. $request->term. '%')
            ->where('id_kategori', $request->id_kategori)
            ->orderBy('nama_sub_kategori', 'ASC')
            ->get();
        }

        return $data;
    }

    public function select_sub_kategori2(Request $request) {
        $data = DB::table('t_sub_kategori_perusahaan as ta')
        ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
        ->leftJoin('m_sub_kategori as tc', 'ta.id_sub_kategori', '=', 'tc.id')
        ->select('*')
        ->whereNull('ta.deleted_at')
        ->where('tc.id_kategori', $request->id_kategori);

        if($request->term) {
            $data->where('nama_sub_kategori', 'LIKE', '%'. $request->term. '%');
        }

        $data
        ->groupBy('ta.id_sub_kategori')
        ->orderBy('tc.nama_sub_kategori', 'ASC')->get();
        $data = $data->get();
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

    public function filterperusahaan(Request $request) {
        $data = DB::table('m_perusahaan as ta')
        ->leftJoin('m_tipe_perusahaan as tb', 'ta.id_tipe', '=', 'tb.id')
        ->leftJoin('m_k_produk as tc', 'ta.id_kategori_produk', '=', 'tc.id')
        ->leftJoin('m_sub_kategori as td', 'ta.id_sub_kategori', '=', 'td.id')
        ->select(DB::raw('ta.*, IFNULL(tb.nama_tipe, "") as nama_tipe'), 'td.nama_sub_kategori')
        ->whereNull('ta.deleted_at')
        ->orderBy('ta.kode_perusahaan', 'ASC')
        ->get();

        if($request->term) {
            $data = DB::table('m_perusahaan as ta')
            ->leftJoin('m_tipe_perusahaan as tb', 'ta.id_tipe', '=', 'tb.id')
            ->leftJoin('m_k_produk as tc', 'ta.id_kategori_produk', '=', 'tc.id')
            ->leftJoin('m_sub_kategori as td', 'ta.id_sub_kategori', '=', 'td.id')
            ->select(DB::raw('ta.*, IFNULL(tb.nama_tipe, "") as nama_tipe'), 'td.nama_sub_kategori')
            ->whereNull('ta.deleted_at')
            ->where('ta.nama_perusahaan', 'LIKE' , '%'. $request->term. '%')
            ->orWhere('ta.kode_perusahaan', 'LIKE', '%'. $request->term. '%')
            ->orderBy('ta.kode_perusahaan', 'ASC')
            ->get();
        }

        return $data;
    }

    public function selectperusahaan(Request $request) {
        $data = DB::table('m_perusahaan as ta')
        ->leftJoin('m_tipe_perusahaan as tb', 'ta.id_tipe', '=', 'tb.id')
        ->leftJoin('m_k_produk as tc', 'ta.id_kategori_produk', '=', 'tc.id')
        ->leftJoin('m_sub_kategori as td', 'ta.id_sub_kategori', '=', 'td.id')
        ->select(DB::raw('ta.*, IFNULL(tb.nama_tipe, "") as nama_tipe'), 'td.nama_sub_kategori')
        ->whereNull('ta.deleted_at')
        ->orderBy('ta.nama_perusahaan', 'ASC')
        ->get();

        if($request->term) {
            $data = DB::table('m_perusahaan as ta')
            ->leftJoin('m_tipe_perusahaan as tb', 'ta.id_tipe', '=', 'tb.id')
            ->leftJoin('m_k_produk as tc', 'ta.id_kategori_produk', '=', 'tc.id')
            ->leftJoin('m_sub_kategori as td', 'ta.id_sub_kategori', '=', 'td.id')
            ->select(DB::raw('ta.*, IFNULL(tb.nama_tipe, "") as nama_tipe'), 'td.nama_sub_kategori')
            ->whereNull('ta.deleted_at')
            ->where('ta.nama_perusahaan', 'LIKE' , '%'. $request->term. '%')
            ->orWhere('ta.kode_perusahaan', 'LIKE', '%'. $request->term. '%')
            ->orderBy('ta.nama_perusahaan', 'ASC')
            ->get();
        }

        return $data;
    }

    public function select_perusahaan_sub_kategori(Request $request) {
        if ($request->ajax()) {
            $data = DB::table('t_sub_kategori_perusahaan as ta')
            ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
            ->leftJoin('m_sub_kategori as tc', 'ta.id_sub_kategori', '=', 'tc.id')
            ->select('*')
            ->whereNull('ta.deleted_at')
            ->whereIn('ta.id_sub_kategori', $request->id_sub_kategori);

            if($request->term) {
                $data->where('nama_sub_kategori', 'LIKE', '%'. $request->term. '%');
            }

            $data->orderBy('tc.nama_sub_kategori', 'ASC')->get();
            $data = $data->get();
            
            $data = collect($data)->map(function ($item, $index) {
                $item->in = $index+1;
                return $item;
            })->toArray();

            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('checkbox', function($row){
                $input = "<input hidden type='text' name='test[$row->in][id_sub_kategori]' value='$row->id_sub_kategori'>"; 
                $input .= "<input hidden type='text' name='test[$row->in][email]' value='$row->email'>"; 
                $input .= "<input hidden type='text' name='test[$row->in][nama_perusahaan]' value='$row->nama_perusahaan'>"; 
                return $input .= "<input type='checkbox' class='perusahaan-checkbox' name='test[$row->in][id_perusahaan]' value='$row->id_perusahaan'>";
            })
            ->rawColumns(['checkbox'])
            ->make(true);
        }
    }

    public function select_perusahaan_id_template(Request $request) {
        if ($request->ajax()) {
            $data = DB::table('t_sub_kategori_perusahaan as ta')
            ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
            ->leftJoin('m_sub_kategori as tc', 'ta.id_sub_kategori', '=', 'tc.id')
            ->leftJoin('m_draft as td', 'ta.id_sub_kategori', '=', 'td.id')
            ->select('*')
            ->whereNull('ta.deleted_at')
            ->where('td.id_template', $request->id_template);

            if($request->term) {
                $data->where('nama_sub_kategori', 'LIKE', '%'. $request->term. '%');
            }

            $data->orderBy('tc.nama_sub_kategori', 'ASC')->get();
            $data = $data->get();
            
            $data = collect($data)->map(function ($item, $index) {
                $item->in = $index+1;
                return $item;
            })->toArray();

            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('checkbox', function($row){
                $input = "<input hidden type='text' name='test[$row->in][id_sub_kategori]' value='$row->id_sub_kategori'>"; 
                $input .= "<input hidden type='text' name='test[$row->in][email]' value='$row->email'>"; 
                $input .= "<input hidden type='text' name='test[$row->in][nama_perusahaan]' value='$row->nama_perusahaan'>"; 
                return $input .= "<input type='checkbox' class='perusahaan-checkbox' name='test[$row->in][id_perusahaan]' value='$row->id_perusahaan'>";
            })
            ->rawColumns(['checkbox'])
            ->make(true);
        }
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
