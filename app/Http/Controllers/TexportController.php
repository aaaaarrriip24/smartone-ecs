<?php

namespace App\Http\Controllers;

use App\Models\Texport;
use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\Petugas;
use Carbon\Carbon;
use DataTables;
use DB;
use Alert;

class TexportController extends Controller
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
        $title = 'Delete Export!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        if ($request->ajax()) {
            $data = DB::table('t_p_export as ta')
            ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
            ->leftJoin('m_tipe_perusahaan as td', 'tb.id_tipe', '=', 'td.id')
            ->leftJoin('m_negara as tc', 'ta.id_negara_tujuan', '=', 'tc.id')
            ->whereNull('ta.deleted_at')
            ->whereNull('tb.deleted_at')
            ->whereNull('tc.deleted_at')
            ->select('ta.*', 'tb.kode_perusahaan', 'tb.nama_perusahaan', 'tb.detail_produk_utama', 'td.nama_tipe', 'tc.en_short_name')
            ->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $urlEdit = url('export/show/'. $row->id);
                        $urlDetail = url('export/detail/'. $row->id);
                        $urlDelete = url('export/destroy/'. $row->id);
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
        return view('transaksi/texport/view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $get_trn = DB::table('t_p_export')->orderBy('id', 'DESC')->orderBy('created_at', 'DESC')->first();
        $count_trn = explode("-", $get_trn->kode_export);
        $kode_trn = "TRS-" . strval($count_trn[1] + 1) ;

        // dd($kode_trn);
        return view('transaksi/texport/add', compact('kode_trn'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if(!empty($request->file('dok_pendukung'))) {
        //     $file = $request->file('dok_pendukung');
        //     $nama_file = time()."_".$file->getClientOriginalName();
        //     $file->move(public_path().'/folder_dok_pendukung/', $nama_file);
        //     $dok_pendukung = $nama_file;
        // }
        if(!empty($request->file('bukti_dok'))) {
            $file = $request->file('bukti_dok');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/folder_bukti_dok/', $nama_file);
            $bukti_dok = $nama_file;
        }

        Texport::insert([
            'kode_export' => $request->kode_export,
            'id_perusahaan' => $request->id_perusahaan,
            'tanggal_export' => date('Y-m-d', strtotime($request->tanggal_export)),
            'tanggal_lapor' => date('Y-m-d', strtotime($request->tanggal_lapor)),
            'produk' => empty($request->produk) ? "" : $request->produk,
            'nilai_transaksi' => $request->nilai_transaksi,
            'id_negara_tujuan' => $request->id_negara_tujuan,
            'nama_buyer' => $request->nama_buyer,
            'email_buyer' => $request->email_buyer,
            'telp_buyer' => $request->telp_buyer,
            // 'dok_pendukung' => empty($dok_pendukung) ? '' : $dok_pendukung,
            'dok_pendukung' => $request->dok_pendukung,
            'bukti_dok' => empty($bukti_dok) ? '' : $bukti_dok,
            'created_at' => Carbon::now(),
        ]);
        Alert::toast('Success Add Realisasi Export!', 'success');
        return redirect()->route('texport');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TKonsultasi  $tKonsultasi
     * @return \Illuminate\Http\Response
     */
    public function download_dok($file) 
    {
        $myFile = public_path().'/folder_dok_pendukung/'. $file;
        return response()->download($myFile);
    }
    public function download_bukti($file) 
    {
        $myFile = public_path().'/folder_bukti_dok/'. $file;
        return response()->download($myFile);
    }

    public function detail($id)
    {
        $data = DB::table('t_p_export as ta')
        ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
        ->leftJoin('m_tipe_perusahaan as td', 'tb.id_tipe', '=', 'td.id')
        ->leftJoin('m_negara as tc', 'ta.id_negara_tujuan', '=', 'tc.id')
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->whereNull('tc.deleted_at')
        ->select('ta.*', 'tb.kode_perusahaan', 'tb.nama_perusahaan', 'tb.detail_produk_utama', 'td.nama_tipe', 'tc.en_short_name')
        ->where('ta.id', $id)
        ->first();

        return view('transaksi/texport/detail', [
            'data' => $data,
            'status' => 200,
         ]);
    }

    public function show($id)
    {
        $data = DB::table('t_p_export as ta')
        ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
        ->leftJoin('m_tipe_perusahaan as td', 'tb.id_tipe', '=', 'td.id')
        ->leftJoin('m_negara as tc', 'ta.id_negara_tujuan', '=', 'tc.id')
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->whereNull('tc.deleted_at')
        ->select('ta.*', 'tb.kode_perusahaan', 'tb.nama_perusahaan', 'tb.detail_produk_utama', 'td.nama_tipe', 'tc.en_short_name')
        ->where('ta.id', $id)
        ->first();

        return view('transaksi/texport/edit', [
            'data' => $data,
            'status' => 200,
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tKonsultasi  $tKonsultasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Texport $texport)
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
        // if(!empty($request->dok_pendukung)){
        //     $file = $request->file('dok_pendukung');
        //     $nama_file = time()."_".$file->getClientOriginalName();
        //     $file->move(public_path().'/folder_dok_pendukung/', $nama_file);
        //     $dok_pendukung = $nama_file;
        // }

        if(!empty($request->bukti_dok)){
            $file = $request->file('bukti_dok');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/folder_bukti_dok/', $nama_file);
            $bukti_dok = $nama_file;
        }

        Texport::where('id', $request->id)->update([
            'kode_export' => $request->kode_export,
            'id_perusahaan' => $request->id_perusahaan,
            'tanggal_export' => date('Y-m-d', strtotime($request->tanggal_export)),
            'tanggal_lapor' => date('Y-m-d', strtotime($request->tanggal_lapor)),
            'produk' => empty($request->produk) ? "" : $request->produk,
            'nilai_transaksi' => $request->nilai_transaksi,
            'id_negara_tujuan' => $request->id_negara_tujuan,
            'nama_buyer' => $request->nama_buyer,
            'email_buyer' => $request->email_buyer,
            'telp_buyer' => $request->telp_buyer,
            // 'dok_pendukung' => (!empty($request->dok_pendukung) ? $dok_pendukung : $request->dok_pendukung_lama),
            'dok_pendukung' => $request->dok_pendukung,
            'bukti_dok' => (!empty($request->bukti_dok) ? $bukti_dok : $request->bukti_dok_lama),
            'updated_at' => Carbon::now(),
        ]);
        Alert::toast('Success Edit Realisasi Export!', 'success');
        return redirect()->route('texport');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TKonsultasi  $tKonsultasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Texport::find($id);
        $post->delete();
        return response()->json([
            "status"=>200, 
        ]);
    }
}
