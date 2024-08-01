<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\TKonsultasi;
use App\Models\Tinquiry;
use App\Models\PPInquiry;
use App\Models\Texport;
use App\Models\TBm;
use App\Models\PPBm;
use App\Models\Topik;
use Carbon\Carbon;
use Auth;
use DB;
use Alert;
use DataTables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request) {
        if(Auth::check()) {
            if(Auth::user()->roleuser == "Admin" || Auth::user()->roleuser == "Superadmin") {
                $perusahaan = Perusahaan::all()->whereNull('deleted_at')->count();

                // $layanan = TKonsultasi::all()->whereNull('deleted_at')->count();
                $layanan = DB::table('t_konsultasi as ta')
                ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
                ->whereNull('ta.deleted_at')
                ->whereNull('tb.deleted_at')
                ->count();
                
                $topik = DB::table('t_konsultasi as ta')
                ->leftJoin('t_konsultasi_topik as td', 'ta.id', '=', 'td.id_konsultasi')
                ->leftJoin('m_topik as tb', 'td.id_topik', '=', 'tb.id')
                ->select(\DB::raw('count(td.id_topik) as total, tb.nama_topik'))
                ->whereNull('ta.deleted_at')
                ->groupBy('tb.id')
                ->get();

                if ($request->ajax()) {
                    return Datatables::of($topik)
                    ->addIndexColumn()
                    ->make(true);
                }

                $export = DB::table('t_p_export as ta')
                ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
                ->select(\DB::raw('sum(ta.nilai_transaksi) as total'))
                ->whereNull('ta.deleted_at')
                ->whereNull('tb.deleted_at')
                ->first();

                $bm = TBm::all()->whereNull('deleted_at')->count();
                $ptbm = PPBm::select(DB::raw('COUNT(DISTINCT id_perusahaan) as count_perusahaan'))->whereNull('deleted_at')->first();
                $iq = Tinquiry::all()->whereNull('deleted_at')->count();
                $ptiq = PPInquiry::select(DB::raw('COUNT(DISTINCT id_perusahaan) as count_perusahaan'))->whereNull('deleted_at')->first();
                return view('home', compact('perusahaan', 'layanan', 'export', 'bm', 'ptbm', 'iq', 'ptiq')); 
            } else {
                return redirect('/'); 
            }
        }
        return redirect('/'); 
        
    }

    public function data_topik(Request $request) {

        $topik = DB::table('t_konsultasi as ta')
        ->leftJoin('t_konsultasi_topik as td', 'ta.id', '=', 'td.id_konsultasi')
        ->leftJoin('m_topik as tb', 'td.id_topik', '=', 'tb.id')
        ->select(\DB::raw('count(td.id_topik) as total, tb.nama_topik'))
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->whereNotNull('tb.id')
        ->groupBy('tb.id')
        ->orderBy('tb.id')
        ->get();

        // return DataTables::of($topik)->toJson();
        // $query = DB::table('users');
        
        if ($request->ajax()) {
            return DataTables::of($topik)->addIndexColumn()->toJson();
        }

    }

    public function section2()
    {
        // $data = TKonsultasi::select(\DB::raw('count(*) as total, MONTH(tanggal_konsultasi) as month'))
        // ->whereNull('deleted_at')
        // ->groupByRaw('MONTH(tanggal_konsultasi)')
        // ->get();
        $data = DB::table('t_konsultasi as ta')
        ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
        ->select(\DB::raw('count(*) as total, MONTH(ta.tanggal_konsultasi) as month'))
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->groupByRaw('MONTH(tanggal_konsultasi)')
        ->get();
        
        $arrData = array();
        for ($i=1; $i <= 12 ; $i++) { 
            $toMonth = str_pad($i,2,0,STR_PAD_LEFT);
            $toMonthName = date('M', strtotime("2024-".$toMonth."-01"));
            
            $row = collect($data)->where('month', $i)->first();
            $arrData[] = array('bulan' => $toMonthName , 'total' => (!empty($row) ? $row->total : 0) ); 
        }
        $label = collect($arrData)->pluck("bulan")->toArray();
        $dataset = collect($arrData)->pluck("total")->toArray();
        return response()->json([
            "label"=> $label,
            "data" => $dataset 
        ]);
    }

    public function section3()
    {
        $data = DB::table('t_konsultasi as ta')
        ->leftJoin('t_konsultasi_topik as td', 'ta.id', '=', 'td.id_konsultasi')
        ->leftJoin('m_topik as tb', 'td.id_topik', '=', 'tb.id')
        ->leftJoin('m_perusahaan as tc', 'ta.id_perusahaan', '=', 'tc.id')
        ->select(\DB::raw('count(td.id_topik) as total, tb.nama_topik'))
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->whereNull('tc.deleted_at')
        ->groupBy('td.id_topik')
        ->get();

     
        $label = collect($data)->pluck("nama_topik")->toArray();
        $dataset = collect($data)->pluck("total")->toArray();
        return response()->json([
            "label"=> $label,
            "data" => $dataset 
        ]);
    }
}
