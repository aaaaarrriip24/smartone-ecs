<?php

namespace App\Http\Controllers;

use App\Models\TKonsultasi;
use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\Petugas;
use Carbon\Carbon;
use DataTables;
use DB;
use Alert;

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
            ->leftJoin('m_topik as tc', 'ta.id_topik', '=', 'tc.id')
            ->leftJoin('m_petugas as td', 'ta.id_petugas', '=', 'td.id')
            ->whereNull('ta.deleted_at')
            ->whereNull('tb.deleted_at')
            ->whereNull('tc.deleted_at')
            ->whereNull('td.deleted_at')
            ->select('ta.*', 'tb.nama_perusahaan', 'te.nama_tipe', 'tb.kode_perusahaan', 'tc.nama_topik', 'td.nama_petugas' )
            ->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $urlEdit = url('konsultasi/show/'. $row->id);
                        $urlDetail = url('konsultasi/detail/'. $row->id);
                        $urlDelete = url('konsultasi/destroy/'. $row->id);
                        $button = '';
                        $button .= " <a href='".$urlEdit."' class='btn btn-outline-warning btn-sm btn-edit'>Edit</a>";
                        $button .= " <a href='".$urlDetail."' class='btn btn-outline-primary btn-sm btn-detail'>Detail</a>";
                        $button .= " <button data-href='".$urlDelete."' class='btn btn-outline-danger btn-sm btn-delete' >Delete</button>";
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
        $last_kon = explode("-", $get_kon->kode_konsultasi); 
        $kode_kon = "KON-" . strval($last_kon[1] + 1) ;

        return view('transaksi/konsultasi/add', compact('kode_kon'));
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
            'kode_konsultasi' => $requset->kode_konsultasi,
            'id_perusahaan' => $request->id_perusahaan,
            'tanggal_konsultasi' => date('Y-m-d', strtotime($request->tanggal_konsultasi)),
            'cara_konsultasi' => $request->cara_konsultasi,
            'tempat_pertemuan' => $request->tempat_pertemuan,
            'id_topik' => $request->id_topik,
            'isi_konsultasi' => $request->isi_konsultasi,
            'foto_pertemuan' => empty($name) ? '' : $name,
            'id_petugas' => $request->id_petugas,
            'created_at' => Carbon::now(),
        ]);
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
        ->leftJoin('m_topik as tc', 'ta.id_topik', '=', 'tc.id')
        ->leftJoin('m_petugas as td', 'ta.id_petugas', '=', 'td.id')
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->whereNull('tc.deleted_at')
        ->whereNull('td.deleted_at')
        ->select('ta.*', 'tb.nama_perusahaan', 'te.nama_tipe', 'tb.kode_perusahaan', 'tc.nama_topik', 'td.nama_petugas' )
        ->where('ta.id', $id)
        ->first();

        $file = asset('foto_pertemuan/'.$data->foto_pertemuan);
        return view('transaksi/konsultasi/detail', [
            'data' => $data,
            'file' => $file,
            'status' => 200,
         ]);
    }

    public function show($id)
    {
        $data = DB::table('t_konsultasi as ta')
        ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
        ->leftJoin('m_tipe_perusahaan as te', 'tb.id_tipe', '=', 'te.id')
        ->leftJoin('m_topik as tc', 'ta.id_topik', '=', 'tc.id')
        ->leftJoin('m_petugas as td', 'ta.id_petugas', '=', 'td.id')
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->whereNull('tc.deleted_at')
        ->whereNull('td.deleted_at')
        ->select('ta.*', 'tb.nama_perusahaan', 'te.nama_tipe', 'tb.kode_perusahaan', 'tc.nama_topik', 'td.nama_petugas' )
        ->where('ta.id', $id)
        ->first();

        $file = asset('foto_pertemuan/'.$data->foto_pertemuan);
        return view('transaksi/konsultasi/edit', [
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
            'id_topik' => $request->id_topik,
            'isi_konsultasi' => $request->isi_konsultasi,
            'foto_pertemuan' => (!empty($request->foto_pertemuan) ? $name : $request->foto_pertemuan_lama),
            'id_petugas' => $request->id_petugas,
            'updated_at' => Carbon::now(),
        ]);
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
        $post = TKonsultasi::find($id);
        $post->delete();
        return response()->json([
            "status"=>200, 
        ]);
    }
}
