<?php

namespace App\Http\Controllers;

use App\Models\Partisipasi;
use App\Models\PartisipasiPerusahaan;
use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;
use Alert;
use DB;

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
        $get_code = Partisipasi::orderBy('kode_partisipasi', 'DESC')->first();
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
                'kode_partisipasi' => $request->kode_partisipasi,
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partisipasi  $partisipasi
     * @return \Illuminate\Http\Response
     */
    public function show(Partisipasi $partisipasi)
    {
        //
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
    public function update(Request $request, Partisipasi $partisipasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partisipasi  $partisipasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partisipasi $partisipasi)
    {
        //
    }
}
