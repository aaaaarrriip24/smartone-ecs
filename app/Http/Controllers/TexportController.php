<?php

namespace App\Http\Controllers;

use App\Models\Texport;
use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\Petugas;
use Carbon\Carbon;
use DataTables;
use DB;

class TexportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Delete Export!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        if ($request->ajax()) {
            $data = DB::table('t_p_export as ta')
            ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
            ->leftJoin('m_negara as tc', 'ta.id_negara_tujuan', '=', 'tc.id')
            ->whereNull('ta.deleted_at')
            ->whereNull('tb.deleted_at')
            ->whereNull('tc.deleted_at')
            ->select('ta.*', 'tb.kode_perusahaan', 'tc.en_short_name')
            ->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $urlEdit = url('export/show/'. $row->id);
                        $urlDetail = url('export/detail/'. $row->id);
                        $urlDelete = url('export/destroy/'. $row->id);
                        $button = '';
                        $button .= " <a href='".$urlEdit."' class='btn btn-outline-warning btn-sm btn-edit'>Edit</a>";
                        $button .= " <a href='".$urlDetail."' class='btn btn-outline-primary btn-sm btn-detail'>Detail</a>";
                        $button .= " <button data-href='".$urlDelete."' class='btn btn-outline-danger btn-sm btn-delete' >Delete</button>";
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
        return view('transaksi/texport/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('dok_pendukung');
        $nama_file = time()."_".$file->getClientOriginalName();
        $file->move(public_path().'/folder_dok_pendukung/', $nama_file);
        $dok_pendukung = $nama_file;

        $file = $request->file('bukti_dok');
        $nama_file = time()."_".$file->getClientOriginalName();
        $file->move(public_path().'/folder_bukti_dok/', $nama_file);
        $bukti_dok = $nama_file;

        Texport::insert([
            'kode_export' => $request->kode_export,
            'id_perusahaan' => $request->id_perusahaan,
            'tanggal_export' => $request->tanggal_export,
            'produk' => $request->produk,
            'nilai_transaksi' => $request->nilai_transaksi,
            'id_negara_tujuan' => $request->id_negara_tujuan,
            'nama_buyer' => $request->nama_buyer,
            'email_buyer' => $request->email_buyer,
            'telp_buyer' => $request->telp_buyer,
            'dok_pendukung' => $dok_pendukung,
            'bukti_dok' => $bukti_dok,
            'created_at' => Carbon::now(),
        ]);
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
        ->leftJoin('m_negara as tc', 'ta.id_negara_tujuan', '=', 'tc.id')
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->whereNull('tc.deleted_at')
        ->select('ta.*', 'tb.kode_perusahaan', 'tc.en_short_name')
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
        ->leftJoin('m_negara as tc', 'ta.id_negara_tujuan', '=', 'tc.id')
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->whereNull('tc.deleted_at')
        ->select('ta.*', 'tb.kode_perusahaan', 'tc.en_short_name')
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
        if(!empty($request->dok_pendukung)){
            $file = $request->file('dok_pendukung');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/folder_dok_pendukung/', $nama_file);
            $dok_pendukung = $nama_file;
        }

        if(!empty($request->bukti_dok)){
            $file = $request->file('bukti_dok');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/folder_bukti_dok/', $nama_file);
            $bukti_dok = $nama_file;
        }

        Texport::where('id', $request->id)->update([
            'kode_export' => $request->kode_export,
            'id_perusahaan' => $request->id_perusahaan,
            'tanggal_export' => $request->tanggal_export,
            'produk' => $request->produk,
            'nilai_transaksi' => $request->nilai_transaksi,
            'id_negara_tujuan' => $request->id_negara_tujuan,
            'nama_buyer' => $request->nama_buyer,
            'email_buyer' => $request->email_buyer,
            'telp_buyer' => $request->telp_buyer,
            'dok_pendukung' => (!empty($request->dok_pendukung) ? $dok_pendukung : $request->dok_pendukung_lama),
            'bukti_dok' => (!empty($request->bukti_dok) ? $bukti_dok : $request->bukti_dok_lama),
            'updated_at' => Carbon::now(),
        ]);
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
