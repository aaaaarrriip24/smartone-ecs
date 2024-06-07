<?php

namespace App\Http\Controllers;

use App\Models\PPBm;
use App\Models\TBm;
use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\Petugas;
use Carbon\Carbon;
use DataTables;
use DB;
use Alert;

class PPBmController extends Controller
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
        $title = 'Delete Peserta BM!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        if ($request->ajax()) {
            $get_pt = DB::table('p_peserta_bm as ta')->get();
            $label = collect($get_pt)->pluck("id_perusahaan")->toArray();
            // dd($label);
            
            $data = DB::table('p_peserta_bm as ta')
            ->leftJoin('t_bm as tb', 'ta.id_bm', '=', 'tb.id')
            ->leftJoin('m_perusahaan as tc', 'ta.id_perusahaan', '=', 'tc.id')
            ->leftJoin('m_negara as tn', 'tb.id_negara_buyer', '=', 'tn.id')
            ->whereNull('ta.deleted_at')
            ->whereNull('tb.deleted_at')
            ->whereNull('tc.deleted_at')
            ->select('ta.*', 'tb.tanggal_bm', 'tb.nama_buyer', 'tn.en_short_name','tb.produk_bm','tb.kode_bm', 'tc.kode_perusahaan', 'ta.id_perusahaan')
            ->get();
            // dd($data);


            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $urlAddPeserta = $row->id;
                        $urlListPeserta = url('ppbm/list/'. $row->id);
                        $urlEdit = url('ppbm/show/'. $row->id);
                        $urlDetail = url('ppbm/detail/'. $row->id);
                        $urlDelete = url('ppbm/destroy/'. $row->id);
                        $button = '<div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><button data-id='.$urlAddPeserta.' class="dropdown-item btn-peserta" data-bs-toggle="modal" data-bs-target="#addPesertaBM">Add Peserta</button></li>
                                            <li><a href='.$urlListPeserta.' class="dropdown-item btn-peserta">List Peserta</a></li>
                                            <li><a href='.$urlEdit.' class="dropdown-item btn-edit">Edit</a></li>
                                            <li><a href='.$urlDetail.' class="dropdown-item btn-detail">Detail</a></li>
                                            <li><button data-href='.$urlDelete.' class="dropdown-item btn-delete">Delete</button></li>
                                        </ul>
                                    </div>';
                        // $button .= " <a href='".$urlEdit."' class='btn btn-outline-warning btn-sm btn-edit'>Edit</a>";
                        // $button .= " <a href='".$urlDetail."' class='btn btn-outline-primary btn-sm btn-detail'>Detail</a>";
                        // $button .= " <button data-href='".$urlDelete."' class='btn btn-outline-danger btn-sm btn-delete' >Delete</button>";
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('pp/penerima_bm/view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pp/penerima_bm/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = PPBm::where('id_bm', $request->id_bm)->delete();

        $perusahaanArr = array();
        foreach($request->id_perusahaan as $key) {
            $perusahaanArr = $key;
            PPBm::insert([
                'id_bm' => $request->id_bm,
                'id_perusahaan' => $perusahaanArr,
                'created_at' => Carbon::now(),
            ]);
            // dd($perusahaanArr);
        }
        
        Alert::toast('Success Add Peserta Business Matching!', 'success');
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
        $data = DB::table('p_peserta_bm as ta')
        ->leftJoin('t_bm as tb', 'ta.id_bm', '=', 'tb.id')
        ->leftJoin('m_perusahaan as tc', 'ta.id_perusahaan', '=', 'tc.id')
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->whereNull('tc.deleted_at')
        ->select('ta.*', 'tb.kode_bm', 'tc.kode_perusahaan')
        ->where('ta.id', $id)
        ->first();

        return view('pp/penerima_bm/detail', [
            'data' => $data,
            'status' => 200,
         ]);
    }

    public function list($id) {
        $data = DB::table('p_peserta_bm as ta')
        ->leftJoin('t_bm as tb', 'ta.id_bm', '=', 'tb.id')
        ->leftJoin('m_perusahaan as tc', 'ta.id_perusahaan', '=', 'tc.id')
        ->leftJoin('m_tipe_perusahaan as td', 'tc.id_tipe', '=', 'td.id')
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->whereNull('tc.deleted_at')
        ->select('ta.*', 'tb.kode_bm', 'tc.nama_perusahaan', 'td.nama_tipe', 'tc.kode_perusahaan')
        ->where('ta.id', $id)
        ->first();

        $label = collect($data)->pluck("id_perusahaan")->toArray();
        $pt = DB::table('m_perusahaan')
        ->select('nama_perusahaan')
        ->whereIn('id', [$data->id_perusahaan])
        ->get();
        // dd($data->id_perusahaan, $pt, $label);

        return view('pp/penerima_bm/list', [
            'pt' => $pt,
            'status' => 200,
        ]);
    }

    public function show(Request $request)
    {
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tKonsultasi  $tKonsultasi
     * @return \Illuminate\Http\Response
     */
    public function edit(PPBm $pPBm)
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
        PPBm::where('id', $request->id)->update([
            'id_bm' => $request->id_bm,
            'id_perusahaan' => $request->id_perusahaan,
            'updated_at' => Carbon::now(),
        ]);
        Alert::toast('Success Edit Peserta Business Matching!', 'success');
        return redirect()->route('ppbm');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TKonsultasi  $tKonsultasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = PPBm::find($id);
        $post->delete();
        return response()->json([
            "status"=>200, 
        ]);
    }
}
