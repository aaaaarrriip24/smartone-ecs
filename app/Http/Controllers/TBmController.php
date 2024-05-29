<?php

namespace App\Http\Controllers;

use App\Models\TBm;
use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\Petugas;
use Carbon\Carbon;
use DataTables;
use DB;

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
            $data = DB::table('t_bm as ta')
            ->leftJoin('m_negara as tb', 'ta.id_negara_buyer', '=', 'tb.id')
            ->whereNull('ta.deleted_at')
            ->whereNull('tb.deleted_at')
            ->select('ta.*', 'tb.en_short_name')
            ->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $urlPeserta = $row->id;
                        $urlEdit = url('bm/show/'. $row->id);
                        $urlDetail = url('bm/detail/'. $row->id);
                        $urlDelete = url('bm/destroy/'. $row->id);
                        $button = '';
                        $button .= " <button data-id='".$urlPeserta."' class='btn btn-outline-dark btn-sm btn-peserta' data-bs-toggle='modal' data-bs-target='#pesertaBM'>Peserta</button>";
                        $button .= " <a href='".$urlEdit."' class='btn btn-outline-warning btn-sm btn-edit'>Edit</a>";
                        $button .= " <a href='".$urlDetail."' class='btn btn-outline-primary btn-sm btn-detail'>Detail</a>";
                        $button .= " <button data-href='".$urlDelete."' class='btn btn-outline-danger btn-sm btn-delete' >Delete</button>";
                        return $button;
                    })
                    ->rawColumns(['action'])
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
        $get_bm = DB::table('t_bm')->get();
        $count_bm = $get_bm->count();
        $kode_bm = "BM-" . strval($count_bm + 1) ;

        return view('transaksi/bm/add', compact('kode_bm'));
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

        $get_bm = TBm::whereNull('deleted_at')->get();
        $count_bm = $get_bm->count();
        $kode_bm = "BM-" . strval($count_bm + 1) ;

        TBm::insert([
            'kode_bm' => $kode_bm,
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

        $file = asset('foto_bm/'.$data->foto_bm);
        return view('transaksi/bm/detail', [
            'data' => $data,
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

        $file = asset('foto_bm/'.$data->foto_bm);
        return view('transaksi/bm/edit', [
            'data' => $data,
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
        $post = TBm::find($id);
        $post->delete();
        return response()->json([
            "status"=>200, 
        ]);
    }
}
