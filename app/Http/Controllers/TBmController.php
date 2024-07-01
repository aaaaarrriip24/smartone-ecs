<?php

namespace App\Http\Controllers;

use App\Models\TBm;
use App\Models\PPBm;
use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\Petugas;
use Carbon\Carbon;
use DataTables;
use DB;
use Alert;
use PDF;

class TBmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $title = 'Delete Business Matching!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        if ($request->ajax()) {
            if(isset($request->tglawal) && isset($request->tglakhir)) {
                $data = DB::table('t_bm as ta')
                ->leftJoin('m_negara as tb', 'ta.id_negara_buyer', '=', 'tb.id')
                ->leftJoin('p_peserta_bm as tc', 'ta.id', '=', 'tc.id_bm')
                ->whereNull('ta.deleted_at')
                ->whereNull('tb.deleted_at')
                ->where('ta.tanggal_bm', '>=' , date('Y-m-d', strtotime($request->tglawal)))
                ->where('ta.tanggal_bm', '<=' , date('Y-m-d', strtotime($request->tglakhir)))
                ->select('ta.*', 'tb.en_short_name', DB::raw("group_concat(tc.id_perusahaan) AS perusahaan, COUNT(tc.id_perusahaan) AS jumlah_perusahaan"))
                ->groupBy('tc.id_bm')
                ->orderBy('ta.tanggal_bm')
                ->get();
            } else {
                $data = DB::table('t_bm as ta')
                ->leftJoin('m_negara as tb', 'ta.id_negara_buyer', '=', 'tb.id')
                ->leftJoin('p_peserta_bm as tc', 'ta.id', '=', 'tc.id_bm')
                ->whereNull('ta.deleted_at')
                ->whereNull('tb.deleted_at')
                ->select('ta.*', 'tb.en_short_name', DB::raw("group_concat(tc.id_perusahaan) AS perusahaan, COUNT(tc.id_perusahaan) AS jumlah_perusahaan"))
                ->groupBy('tc.id_bm')
                ->orderBy('ta.tanggal_bm')
                ->get();
            }
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $urlPeserta = $row->id;
                        $urlEdit = url('bm/show/'. $row->id);
                        $urlDetail = url('bm/detail/'. $row->id);
                        $urlDelete = url('bm/destroy/'. $row->id);
                        $button = '<div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" class="dropdown-item btn-peserta">Peserta</a></li>
                                            <li><a href='.$urlEdit.' class="dropdown-item btn-edit">Edit</a></li>
                                            <li><a href='.$urlDetail.' class="dropdown-item btn-detail">Detail</a></li>
                                            <li><a data-href='.$urlDelete.' class="dropdown-item btn-delete">Delete</a></li>
                                        </ul>
                                    </div>';
                        return $button;
                    })
                    ->addColumn('total_perusahaan', function($row){
                        $perusahaan = Perusahaan::whereNull('deleted_at')->count();
                        return $perusahaan;
                    })
                    ->addColumn('peserta_bm', function($row){
                        $tb = DB::table('p_peserta_bm')
                        ->leftjoin('m_perusahaan','m_perusahaan.id','p_peserta_bm.id_perusahaan')
                        ->leftjoin('m_tipe_perusahaan','m_tipe_perusahaan.id','m_perusahaan.id_tipe')
                        ->select(DB::raw('m_perusahaan.kode_perusahaan,m_perusahaan.nama_perusahaan,p_peserta_bm.id,IFNULL(m_tipe_perusahaan.nama_tipe, "") as nama_tipe'))
                        ->where('p_peserta_bm.id_bm', $row->id)
                        ->get();
                        return empty($tb) ? [] : json_decode($tb);
                    })
                    ->rawColumns(['action','peserta_bm','total_perusahaan'])
                    ->make(true);
        }
        return view('transaksi/bm/view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $get_bm = TBm::orderBy('kode_bm', 'DESC')->first();
        $count_bm = explode("BM-", $get_bm->kode_bm);
        $kode_bm = "BM-" . strval($count_bm[1] + 1) ;
        
        // dd($kode_bm);
        return view('transaksi/bm/add', compact('kode_bm'));
    }

    public function pdf(Request $request) {
        if(isset($request->tglawal) && isset($request->tglakhir)) {
            $data = DB::table('t_bm as ta')
            ->leftJoin('m_negara as tb', 'ta.id_negara_buyer', '=', 'tb.id')
            ->leftJoin('p_peserta_bm as tc', 'ta.id', '=', 'tc.id_bm')
            ->whereNull('ta.deleted_at')
            ->whereNull('tb.deleted_at')
            ->where('ta.tanggal_bm', '>=' , date('Y-m-d', strtotime($request->tglawal)))
            ->where('ta.tanggal_bm', '<=' , date('Y-m-d', strtotime($request->tglakhir)))
            ->select('ta.*', 'tb.en_short_name', DB::raw("group_concat(tc.id_perusahaan) AS perusahaan, COUNT(tc.id_perusahaan) AS jumlah_perusahaan"))
            ->groupBy('tc.id_bm')
            ->orderBy('ta.tanggal_bm')
            ->get();
        } else {
            $data = DB::table('t_bm as ta')
            ->leftJoin('m_negara as tb', 'ta.id_negara_buyer', '=', 'tb.id')
            ->leftJoin('p_peserta_bm as tc', 'ta.id', '=', 'tc.id_bm')
            ->whereNull('ta.deleted_at')
            ->whereNull('tb.deleted_at')
            ->select('ta.*', 'tb.en_short_name', DB::raw("group_concat(tc.id_perusahaan) AS perusahaan, COUNT(tc.id_perusahaan) AS jumlah_perusahaan"))
            ->groupBy('tc.id_bm')
            ->orderBy('ta.tanggal_bm')
            ->get();
            
        }
        $tb = DB::table('p_peserta_bm as ta')
        ->leftjoin('m_perusahaan as tb','tb.id','ta.id_perusahaan')
        ->leftjoin('m_tipe_perusahaan as tc','tc.id','tb.id_tipe')
        ->select(DB::raw('tb.kode_perusahaan,tb.nama_perusahaan, tb.detail_produk_utama,ta.id_bm,ta.id,IFNULL(tc.nama_tipe, "") as nama_tipe'))
        ->get();
        
        // dd($tb);
    	$pdf = PDF::loadview('transaksi/bm/pdf',[
            'data' => $data,
            'tb' => $tb,
            'tglawal' => Carbon::parse($request->tglawal)->isoFormat('D MMMM'),
            'tglakhir' => Carbon::parse($request->tglakhir)->isoFormat('D MMMM Y'),
        ]);
    	return $pdf->stream('Laporan Transaksi Business Matching.pdf', array("Attachment" => false));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(!empty($request->file('foto_bm'))) {
            $file = $request->file('foto_bm');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/foto_bm/', $nama_file);
            $name = $nama_file;
        }

        TBm::insert([
            'kode_bm' => $request->kode_bm,
            'tanggal_bm' => date('Y-m-d', strtotime($request->tanggal_bm)),
            'produk_bm' => $request->produk_bm,
            'pelaksanaan_bm' => $request->pelaksanaan_bm,
            'id_negara_buyer' => $request->id_negara_buyer,
            'info_asal_buyer' => $request->info_asal_buyer,
            'nama_buyer' => $request->nama_buyer,
            'email_buyer' => $request->email_buyer,
            'telp_buyer' => $request->telp_buyer,
            'catatan' => $request->catatan,
            'foto_bm' => empty($name) ? '' : $name,
            'created_at' => Carbon::now(),
        ]);

        $id_bm = DB::getPdo()->lastInsertId();
        if(!empty($request->id_perusahaan)) {
            $perusahaanArr = array();
            foreach($request->id_perusahaan as $key) {
                $perusahaanArr = $key;
                PPBm::insert([
                    'id_bm' => $id_bm,
                    'id_perusahaan' => $perusahaanArr,
                    'created_at' => Carbon::now(),
                ]);
            }
        }

        Alert::toast('Success Add Business Matching!', 'success');
        return redirect()->route('tbm');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TKonsultasi  $tKonsultasi
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $data = DB::table('t_bm as ta')
        ->leftJoin('m_negara as tb', 'ta.id_negara_buyer', '=', 'tb.id')
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->select('ta.*', 'tb.en_short_name')
        ->where('ta.id', $id)
        ->first();

        $peserta = DB::table('p_peserta_bm as ta')
        ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
        ->where('ta.id_bm', $id)
        ->get();

        // dd($peserta);

        $file = asset('foto_bm/'.$data->foto_bm);
        return view('transaksi/bm/detail', [
            'data' => $data,
            'peserta' => $peserta,
            'file' => $file,
            'status' => 200,
         ]);
    }

    public function show($id)
    {
        $data = DB::table('t_bm as ta')
        ->leftJoin('m_negara as tb', 'ta.id_negara_buyer', '=', 'tb.id')
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->select('ta.*', 'tb.en_short_name')
        ->where('ta.id', $id)
        ->first();

        $peserta = DB::table('p_peserta_bm as ta')
        ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
        ->where('ta.id_bm', $id)
        ->get();

        $file = asset('foto_bm/'.$data->foto_bm);
        return view('transaksi/bm/edit', [
            'data' => $data,
            'peserta' => $peserta,
            'file' => $file,
            'status' => 200,
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tKonsultasi  $tKonsultasi
     * @return \Illuminate\Http\Response
     */
    public function edit(TBm $tBm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TKonsultasi  $tKonsultasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if(!empty($request->foto_bm)){
            $file = $request->file('foto_bm');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/foto_bm/', $nama_file);
            $name = $nama_file;  
        }

        TBm::where('id', $request->id)->update([
            'kode_bm' => $request->kode_bm_old,
            'tanggal_bm' => date('Y-m-d', strtotime($request->tanggal_bm)),
            'produk_bm' => $request->produk_bm,
            'pelaksanaan_bm' => $request->pelaksanaan_bm,
            'id_negara_buyer' => $request->id_negara_buyer,
            'info_asal_buyer' => $request->info_asal_buyer,
            'nama_buyer' => $request->nama_buyer,
            'email_buyer' => $request->email_buyer,
            'telp_buyer' => $request->telp_buyer,
            'catatan' => $request->catatan,
            'foto_bm' => (!empty($request->foto_bm) ? $name : $request->foto_bm_lama),
            'updated_at' => Carbon::now(),
        ]);

        $id_bm = $request->id;
        $post = PPBm::where('id_bm', $id_bm)->delete();

        $perusahaanArr = array();
        foreach($request->id_perusahaan as $key) {
            $perusahaanArr = $key;
            PPBm::insert([
                'id_bm' => $id_bm,
                'id_perusahaan' => $perusahaanArr,
                'created_at' => Carbon::now(),
            ]);
        }

        Alert::toast('Success Edit Business Matching!', 'success');
        return redirect()->route('tbm');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TKonsultasi  $tKonsultasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = TBm::find($id)->delete();
        $post2 = PPBm::where('id_bm', $id)->delete();
        return response()->json([
            "status"=>200, 
        ]);
    }
}
