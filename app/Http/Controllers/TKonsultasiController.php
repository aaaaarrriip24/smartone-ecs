<?php

namespace App\Http\Controllers;

use App\Models\TKonsultasi;
use App\Models\TKonsultasiTopik;
use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\Petugas;
use Carbon\Carbon;
use DataTables;
use DB;
use Alert;
use PDF;

class TKonsultasiController extends Controller
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
        $title = 'Delete Konsultasi!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        if ($request->ajax()) {
            $data = DB::table('t_konsultasi as ta')
            ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
            ->leftJoin('m_tipe_perusahaan as te', 'tb.id_tipe', '=', 'te.id')
            ->leftJoin('t_konsultasi_topik as tf', 'ta.id', '=', 'tf.id_konsultasi')
            ->leftJoin('m_topik as tc', 'tf.id_topik', '=', 'tc.id')
            ->leftJoin('m_petugas as td', 'ta.id_petugas', '=', 'td.id')
            ->whereNull('ta.deleted_at')
            ->whereNull('tb.deleted_at')
            ->whereNull('tc.deleted_at')
            ->whereNull('td.deleted_at')
            ->where('ta.tanggal_konsultasi', '>=' , date('Y-m-d', strtotime($request->tglawal)))
            ->where('ta.tanggal_konsultasi', '<=' , date('Y-m-d', strtotime($request->tglakhir)))
            ->select('ta.*', 'tb.nama_perusahaan', DB::raw('IFNULL(te.nama_tipe, "") as nama_tipe'), 'tb.kode_perusahaan', DB::raw("GROUP_CONCAT( tc.nama_topik SEPARATOR ', ' ) AS nama_topik"), 'td.nama_petugas' )
            ->groupBy('ta.id')
            ->orderBy('ta.tanggal_konsultasi', 'ASC')
            ->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $urlEdit = url('konsultasi/show/'. $row->id);
                        $urlDetail = url('konsultasi/detail/'. $row->id);
                        $urlDelete = url('konsultasi/destroy/'. $row->id);
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
        return view('transaksi/konsultasi/view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $get_kon = TKonsultasi::whereNull('deleted_at')->orderBy('created_at', 'DESC')->first();
        if($get_kon == null) {
            $kode_kon = "KON-" . 1000 ;
        } else {
            $last_kon = explode("-", $get_kon->kode_konsultasi);
            $kode_kon = "KON-" . strval($last_kon[1] + 1);
        }
        // dd($kode_kon);
        return view('transaksi/konsultasi/add', compact('kode_kon'));
    }

    public function pdf(Request $request) {
        $data = DB::table('t_konsultasi as ta')
        ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
        ->leftJoin('m_tipe_perusahaan as te', 'tb.id_tipe', '=', 'te.id')
        ->leftJoin('t_konsultasi_topik as tf', 'ta.id', '=', 'tf.id_konsultasi')
        ->leftJoin('m_topik as tc', 'tf.id_topik', '=', 'tc.id')
        ->leftJoin('m_petugas as td', 'ta.id_petugas', '=', 'td.id')
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->whereNull('tc.deleted_at')
        ->whereNull('td.deleted_at')
        ->where('ta.tanggal_konsultasi', '>=' , date('Y-m-d', strtotime($request->tglawal)))
        ->where('ta.tanggal_konsultasi', '<=' , date('Y-m-d', strtotime($request->tglakhir)))
        ->select('ta.*', 'tb.nama_perusahaan', DB::raw('IFNULL(te.nama_tipe, "") as nama_tipe'), 'tb.kode_perusahaan', DB::raw("GROUP_CONCAT( tc.nama_topik SEPARATOR ', ' ) AS nama_topik"), 'td.nama_petugas' )
        ->groupBy('ta.id')
        ->orderBy('ta.tanggal_konsultasi', 'ASC')
        ->get();

    	$pdf = PDF::loadview('transaksi/konsultasi/pdf',[
            'data' => $data,
            'tglawal' => Carbon::parse($request->tglawal)->isoFormat('D MMMM'),
            'tglakhir' => Carbon::parse($request->tglakhir)->isoFormat('D MMMM Y'),
        ])->setPaper('A4', 'landscape');
    	return $pdf->stream('Laporan Konsultasi.pdf', array("Attachment" => false));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!empty($request->file('foto_pertemuan'))) {
            $file = $request->file('foto_pertemuan');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/foto_pertemuan/', $nama_file);
            $name = $nama_file;
        }

        TKonsultasi::insert([
            'kode_konsultasi' => $request->kode_konsultasi . "-" . date('y', strtotime($request->tanggal_konsultasi)),
            'id_perusahaan' => $request->id_perusahaan,
            'tanggal_konsultasi' => date('Y-m-d', strtotime($request->tanggal_konsultasi)),
            'cara_konsultasi' => $request->cara_konsultasi,
            'tempat_pertemuan' => $request->tempat_pertemuan,
            'isi_konsultasi' => $request->isi_konsultasi,
            'foto_pertemuan' => empty($name) ? '' : $name,
            'id_petugas' => $request->id_petugas,
            'created_at' => Carbon::now(),
        ]);

        $id_konsultasi = DB::getPdo()->lastInsertId();
        $topikArr = array();
        foreach($request->id_topik as $key) {
            $topikArr = $key;
            TKonsultasiTopik::insert([
                'id_konsultasi' => $id_konsultasi,
                'id_topik' => $topikArr,
                'created_at' => Carbon::now(),
            ]);
        }
        Alert::toast('Success Add Konsultasi!', 'success');
        return redirect()->route('tkonsultasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TKonsultasi  $tKonsultasi
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $data = DB::table('t_konsultasi as ta')
        ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
        ->leftJoin('m_tipe_perusahaan as te', 'tb.id_tipe', '=', 'te.id')
        ->leftJoin('t_konsultasi_topik as tf', 'ta.id', '=', 'tf.id_konsultasi')
        ->leftJoin('m_topik as tc', 'tf.id_topik', '=', 'tc.id')
        ->leftJoin('m_petugas as td', 'ta.id_petugas', '=', 'td.id')
        ->leftJoin('m_k_produk as tkp', 'tb.id_kategori_produk', '=', 'tkp.id')
        ->leftJoin('t_sub_kategori_perusahaan as tg', 'tg.id_perusahaan', '=', 'tb.id')
        ->leftJoin('m_sub_kategori as th', 'tg.id_sub_kategori', '=', 'th.id')
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->whereNull('tc.deleted_at')
        ->whereNull('td.deleted_at')
        ->select(DB::raw('ta.*, group_concat( th.nama_sub_kategori ) AS sub_kategori, tkp.nama_kategori_produk, tb.detail_produk_utama, tb.nama_perusahaan, te.nama_tipe, tb.kode_perusahaan, tc.nama_topik, td.nama_petugas'))
        ->where('ta.id', $id)
        ->first();

        $topik = DB::table('t_konsultasi as ta')
        ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
        ->leftJoin('t_konsultasi_topik as tf', 'ta.id', '=', 'tf.id_konsultasi')
        ->leftJoin('m_topik as tc', 'tf.id_topik', '=', 'tc.id')
        ->select('tc.id', 'tc.nama_topik')
        ->where('ta.id', $data->id)
        ->get();

        // dd($topik);
        $file = asset('foto_pertemuan/'.$data->foto_pertemuan);
        return view('transaksi/konsultasi/detail', [
            'data' => $data,
            'topik' => $topik,
            'file' => $file,
            'status' => 200,
         ]);
    }

    public function show($id)
    {
        $data = DB::table('t_konsultasi as ta')
        ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
        ->leftJoin('m_tipe_perusahaan as te', 'tb.id_tipe', '=', 'te.id')
        ->leftJoin('t_konsultasi_topik as tf', 'ta.id', '=', 'tf.id_konsultasi')
        ->leftJoin('m_topik as tc', 'tf.id_topik', '=', 'tc.id')
        ->leftJoin('m_petugas as td', 'ta.id_petugas', '=', 'td.id')
        ->leftJoin('m_k_produk as tkp', 'tb.id_kategori_produk', '=', 'tkp.id')
        ->leftJoin('t_sub_kategori_perusahaan as tg', 'tg.id_perusahaan', '=', 'tb.id')
        ->leftJoin('m_sub_kategori as th', 'tg.id_sub_kategori', '=', 'th.id')
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->whereNull('tc.deleted_at')
        ->whereNull('td.deleted_at')
        ->select(DB::raw('ta.*, group_concat( th.nama_sub_kategori ) AS sub_kategori, tkp.nama_kategori_produk, tb.detail_produk_utama, tb.nama_perusahaan, te.nama_tipe, tb.kode_perusahaan, tc.nama_topik, td.nama_petugas'))
        ->where('ta.id', $id)
        ->first();

        $topik = DB::table('t_konsultasi as ta')
        ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
        ->leftJoin('t_konsultasi_topik as tf', 'ta.id', '=', 'tf.id_konsultasi')
        ->leftJoin('m_topik as tc', 'tf.id_topik', '=', 'tc.id')
        ->select('tc.id', 'tc.nama_topik')
        ->where('ta.id', $data->id)
        ->get();

        $file = asset('foto_pertemuan/'.$data->foto_pertemuan);
        return view('transaksi/konsultasi/edit', [
            'data' => $data,
            'topik' => $topik,
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
    public function edit(TKonsultasi $tKonsultasi)
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
        if(!empty($request->foto_pertemuan)){
            $file = $request->file('foto_pertemuan');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/foto_pertemuan/', $nama_file);
            $name = $nama_file;  
        }

        TKonsultasi::where('id', $request->id)->update([
            'kode_konsultasi' => $request->kode_konsultasi,
            'id_perusahaan' => $request->id_perusahaan,
            'tanggal_konsultasi' => date('Y-m-d', strtotime($request->tanggal_konsultasi)),
            'cara_konsultasi' => $request->cara_konsultasi,
            'tempat_pertemuan' => $request->tempat_pertemuan,
            'isi_konsultasi' => $request->isi_konsultasi,
            'foto_pertemuan' => (!empty($request->foto_pertemuan) ? $name : $request->foto_pertemuan_lama),
            'id_petugas' => $request->id_petugas,
            'updated_at' => Carbon::now(),
        ]);

        $post = TKonsultasiTopik::where('id_konsultasi', $request->id);
        $post->delete();

        $id_konsultasi = $request->id;
        $topikArr = array();
        foreach($request->id_topik as $key) {
            $topikArr = $key;
            TKonsultasiTopik::insert([
                'id_konsultasi' => $id_konsultasi,
                'id_topik' => $topikArr,
                'created_at' => Carbon::now(),
            ]);
        }

        Alert::toast('Success Edit Konsultasi!', 'success');
        return redirect()->route('tkonsultasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TKonsultasi  $tKonsultasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = TKonsultasi::find($id)->delete();
        $post2 = TKonsultasiTopik::where('id_konsultasi', $id)->delete();

        return response()->json([
            "status"=>200, 
        ]);
    }
}
