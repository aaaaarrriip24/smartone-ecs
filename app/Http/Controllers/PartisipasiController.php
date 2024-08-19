<?php

namespace App\Http\Controllers;

use App\Models\Partisipasi;
use App\Models\PartisipasiPerusahaan;
use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;
use Alert;
use DB;
use PDF;

class PartisipasiController extends Controller
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
        $title = 'Delete Perusahaan!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        if ($request->ajax()) {
            $data = DB::table('t_partisipasi as ta')
            ->leftJoin('t_partisipasi_perusahaan as tb', 'ta.id', '=', 'tb.id_partisipasi')
            ->leftJoin('m_perusahaan as tc', 'tc.id', '=', 'tb.id_perusahaan')
            ->leftJoin('m_tipe_perusahaan as td', 'td.id', '=', 'tc.id_tipe')
            ->whereNull('ta.deleted_at')
            ;
            
            if(isset($request->id_perusahaan)) {
                $data->where('tb.id_perusahaan', '=' , $request->id_perusahaan);
            }
            if(isset($request->tglawal)) {
                $data->where('ta.tgl_partisipasi', '>=' , date('Y-m-d', strtotime($request->tglawal)));
            } 
            if(isset($request->tglakhir)) {
                $data->where('ta.tgl_partisipasi', '<=' , date('Y-m-d', strtotime($request->tglakhir)));
            } 
            
            $data->select(DB::raw('group_concat( tc.nama_perusahaan ) as perusahaan, ta.*'))
            ->groupBy('ta.id')
            ->orderBy('ta.id', 'ASC')
            ->get();

            $data = $data->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $urlEdit = url('partisipasi/show/'. $row->id);
                        $urlDetail = url('partisipasi/detail/'. $row->id);
                        $urlDelete = url('partisipasi/destroy/'. $row->id);
                        $button = '<div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href='.$urlEdit.' class="dropdown-item btn-edit">Edit</a></li>
                                            <li><a href='.$urlDetail.' class="dropdown-item btn-detail">Detail</a></li>
                                            <li><a data-href='.$urlDelete.' class="dropdown-item btn-delete">Delete</a></li>
                                        </ul>
                                    </div>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('transaksi/partisipasi/view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $get_code = Partisipasi::whereNull('deleted_at')->orderBy('kode_partisipasi', 'DESC')->first();
        if($get_code == null) {
            $kode_code = "PP-" . 1000 ;
        } else {
            $count_code = explode("PP-", $get_code->kode_partisipasi);
            $kode_code = "PP-" . strval($count_code[1] + 1) ;
        }
        
        // dd($kode_bm);
        return view('transaksi/partisipasi/add', compact('kode_code'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!empty($request->id_perusahaan)) {
            Partisipasi::insert([
                'kode_partisipasi' => $request->kode_partisipasi . "-" . date('y', strtotime($request->tgl_partisipasi)),
                'tgl_partisipasi' => date('Y-m-d', strtotime($request->tgl_partisipasi)),
                'kegiatan' => $request->kegiatan,
                'created_at' => Carbon::now(),
            ]);

            $id_partisipasi = DB::getPdo()->lastInsertId();
            $perusahaanArr = array();
            foreach($request->id_perusahaan as $key) {
                $perusahaanArr = $key;
                PartisipasiPerusahaan::insert([
                    'id_partisipasi' => $id_partisipasi,
                    'id_perusahaan' => $perusahaanArr,
                    'created_at' => Carbon::now(),
                ]);
            }
            Alert::toast('Success Add Partisipasi Perusahaan!', 'success');
            return redirect()->route('t_partisipasi');
        } else {
            Alert::toast('Perusahaan Masih Kosong!', 'error');
            return redirect()->back();
        }

    }

    public function pdf(Request $request) {
        $data = DB::table('t_partisipasi as ta')
        ->leftJoin('t_partisipasi_perusahaan as tb', 'ta.id', '=', 'tb.id_partisipasi')
        ->leftJoin('m_perusahaan as tc', 'tc.id', '=', 'tb.id_perusahaan')
        ->leftJoin('m_tipe_perusahaan as td', 'td.id', '=', 'tc.id_tipe')
        ->whereNull('ta.deleted_at')
        ;
        
        if(isset($request->kegiatan)) {
            $data->where('ta.kegiatan', '=' , $request->kegiatan);
        }
        if(isset($request->tglawal)) {
            $data->where('ta.tgl_partisipasi', '>=' , date('Y-m-d', strtotime($request->tglawal)));
        } 
        if(isset($request->tglakhir)) {
            $data->where('ta.tgl_partisipasi', '<=' , date('Y-m-d', strtotime($request->tglakhir)));
        } 
        
        $data->select(DB::raw('group_concat( tc.nama_perusahaan ) as perusahaan, ta.*'))
        ->groupBy('ta.id')
        ->orderBy('ta.id', 'ASC')
        ->get();

        $data = $data->get();
        
        $tb = DB::table('t_partisipasi_perusahaan as ta')
        ->leftjoin('m_perusahaan as tb','tb.id','ta.id_perusahaan')
        ->leftjoin('m_tipe_perusahaan as tc','tc.id','tb.id_tipe')
        ->select(DB::raw('tb.kode_perusahaan, tb.nama_perusahaan, tb.detail_produk_utama, ta.id_partisipasi, ta.id, IFNULL(tc.nama_tipe, "") as nama_tipe'))
        ->get();

        // dd($tb);
    	$pdf = PDF::loadview('transaksi/partisipasi/pdf',[
            'data' => $data,
            'tb' => $tb,
            'tglawal' => Carbon::parse($request->tglawal)->isoFormat('D MMMM'),
            'tglakhir' => Carbon::parse($request->tglakhir)->isoFormat('D MMMM Y'),
        ]);
    	return $pdf->stream('Laporan Transaksi Partisipasi Perusahaan.pdf', array("Attachment" => false));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partisipasi  $partisipasi
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $data = DB::table('t_partisipasi as ta')
        ->leftJoin('t_partisipasi_perusahaan as tb', 'ta.id', '=', 'tb.id_partisipasi')
        ->leftJoin('m_perusahaan as tc', 'tc.id', '=', 'tb.id_perusahaan')
        ->leftJoin('m_tipe_perusahaan as td', 'td.id', '=', 'tc.id_tipe')
        ->whereNull('ta.deleted_at')
        ->where('ta.id', $id)
        ->groupBy('ta.id')
        ->orderBy('ta.id', 'ASC')
        ->first();

        $peserta = DB::table('t_partisipasi_perusahaan as ta')
        ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
        ->leftJoin('m_tipe_perusahaan as tc', 'tb.id_tipe', '=', 'tc.id')
        ->where('ta.id_partisipasi', $id)
        ->get();

        // dd($peserta);

        return view('transaksi/partisipasi/detail', [
            'data' => $data,
            'peserta' => $peserta,
            'status' => 200,
        ]);
    }

    public function show($id)
    {
        $data = DB::table('t_partisipasi as ta')
        ->leftJoin('t_partisipasi_perusahaan as tb', 'ta.id', '=', 'tb.id_partisipasi')
        ->leftJoin('m_perusahaan as tc', 'tc.id', '=', 'tb.id_perusahaan')
        ->leftJoin('m_tipe_perusahaan as td', 'td.id', '=', 'tc.id_tipe')
        ->whereNull('ta.deleted_at')
        ->where('ta.id', $id)
        ->groupBy('ta.id')
        ->orderBy('ta.id', 'ASC')
        ->first();

        $peserta = DB::table('t_partisipasi_perusahaan as ta')
        ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
        ->leftJoin('m_tipe_perusahaan as tc', 'tb.id_tipe', '=', 'tc.id')
        ->where('ta.id_partisipasi', $id)
        ->get();

        // dd($data);

        return view('transaksi/partisipasi/edit', [
            'id' => $id,
            'data' => $data,
            'peserta' => $peserta,
            'status' => 200,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partisipasi  $partisipasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Partisipasi $partisipasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partisipasi  $partisipasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Partisipasi::where('id', $request->id)->update([
            'kegiatan' => $request->kegiatan,
            'tgl_partisipasi' => date('Y-m-d', strtotime($request->tgl_partisipasi)),
            'updated_at' => Carbon::now(),
        ]);

        $id_partisipasi = $request->id;
        $post = PartisipasiPerusahaan::where('id_partisipasi', $id_partisipasi)->delete();

        $perusahaanArr = array();
        foreach($request->id_perusahaan as $key) {
            $perusahaanArr = $key;
            PartisipasiPerusahaan::insert([
                'id_partisipasi' => $id_partisipasi,
                'id_perusahaan' => $perusahaanArr,
                'created_at' => Carbon::now(),
            ]);
        }

        Alert::toast('Success Edit Partisipasi Perusahaan!', 'success');
        return redirect()->route('t_partisipasi');
    }

    public function partperusahaan(Request $request) {
        $data = DB::table('m_perusahaan as ta')
        ->leftJoin('m_tipe_perusahaan as tb', 'ta.id_tipe', '=', 'tb.id')
        ->whereNull('ta.deleted_at')
        ->select(DB::raw('ta.*, IFNULL(tb.nama_tipe, "") as nama_tipe'))
        ->get();

        if($request->term) {
            $data = DB::table('m_perusahaan as ta')
            ->leftJoin('m_tipe_perusahaan as tb', 'ta.id_tipe', '=', 'tb.id')
            ->whereNull('ta.deleted_at')
            ->select(DB::raw('ta.*, IFNULL(tb.nama_tipe, "") as nama_tipe'))
            ->where('ta.nama_perusahaan', 'LIKE', '%'. $request->term. '%')
            ->get();
        }
        return $data;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partisipasi  $partisipasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Partisipasi::find($id)->delete();
        return response()->json([
            "status"=>200, 
        ]);
    }
}
