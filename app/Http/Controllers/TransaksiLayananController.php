<?php

namespace App\Http\Controllers;

use App\Models\TransaksiLain;
use App\Models\TransaksiLainPerusahaan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DataTables;
use DB;
use Alert;
use PDF;

class TransaksiLayananController extends Controller
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
        $title = 'Delete Transaksi Layanan!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        if ($request->ajax()) {
            $data = DB::table('t_lain_perusahaan as ta')
            ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
            ->leftJoin('m_tipe_perusahaan as te', 'tb.id_tipe', '=', 'te.id')
            ->leftJoin('t_lain as tf', 'ta.id_transaksi_lain', '=', 'tf.id')
            ->whereNull('ta.deleted_at')
            ->select('ta.*', 'tb.nama_perusahaan', 'te.nama_tipe', 'tf.bentuk_layanan');
            if(!empty($request->tglawal) && !empty($request->tglakhir)) {
                $data->where('ta.tanggal_transaksi', '>=' , date('Y-m-d', strtotime($request->tglawal)))
                ->where('ta.tanggal_transaksi', '<=' , date('Y-m-d', strtotime($request->tglakhir)));
            }
            $data->get();
            $data = $data->get();
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $urlEdit = url('lain/show/'. $row->id);
                        $urlDetail = url('lain/detail/'. $row->id);
                        $urlDelete = url('lain/destroy/'. $row->id);
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
        return view('transaksi/lain/view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $get_code = TransaksiLainPerusahaan::whereNull('deleted_at')->orderBy('kode_transaksi_layanan_lainnya', 'DESC')->first();
        if($get_code == null) {
            $kode_code = "TLL-" . 1000 ;
        } else {
            $count_code = explode("TLL-", $get_code->kode_transaksi_layanan_lainnya);
            $kode_code = "TLL-" . strval($count_code[1] + 1) ;
        }
        // dd($kode_kon);
        return view('transaksi/lain/add', compact('kode_code'));
    }

    public function pdf(Request $request) {
        $data = DB::table('t_lain_perusahaan as ta')
        ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
        ->leftJoin('m_tipe_perusahaan as te', 'tb.id_tipe', '=', 'te.id')
        ->leftJoin('t_lain as tf', 'ta.id_transaksi_lain', '=', 'tf.id')
        ->whereNull('ta.deleted_at')
        ->select('ta.*', 'tb.nama_perusahaan', 'te.nama_tipe', 'tf.bentuk_layanan');
        if(!empty($request->tglawal) && !empty($request->tglakhir)) {
            $data->where('ta.tanggal_transaksi', '>=' , date('Y-m-d', strtotime($request->tglawal)))
            ->where('ta.tanggal_transaksi', '<=' , date('Y-m-d', strtotime($request->tglakhir)));
        }
        $data->get();
        $data = $data->get();

    	$pdf = PDF::loadview('transaksi/lain/pdf',[
            'data' => $data,
            'tglawal' => Carbon::parse($request->tglawal)->isoFormat('D MMMM'),
            'tglakhir' => Carbon::parse($request->tglakhir)->isoFormat('D MMMM Y'),
        ]);
    	return $pdf->stream('Laporan Transaksi Layanan Lainnya.pdf', array("Attachment" => false));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!empty($request->file('lampiran'))) {
            $file = $request->file('lampiran');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/lampiran_lainnya/', $nama_file);
            $name = $nama_file;
        }

        TransaksiLainPerusahaan::insert([
            'kode_transaksi_layanan_lainnya' => $request->kode_transaksi_layanan_lainnya,
            'id_transaksi_lain' => $request->id_transaksi_lain,
            'id_perusahaan' => $request->id_perusahaan,
            'tanggal_transaksi' => date('Y-m-d', strtotime($request->tanggal_transaksi)),
            'keterangan' => $request->keterangan,
            'lampiran' => empty($name) ? '' : $name,
            'created_at' => Carbon::now(),
        ]);
        Alert::toast('Success Add Transaksi Layanan!', 'success');
        return redirect()->route('lain');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TKonsultasi  $tKonsultasi
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $data = DB::table('t_lain_perusahaan as ta')
        ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
        ->leftJoin('m_tipe_perusahaan as te', 'tb.id_tipe', '=', 'te.id')
        ->leftJoin('t_lain as tf', 'ta.id_transaksi_lain', '=', 'tf.id')
        ->whereNull('ta.deleted_at')
        ->where('ta.id', $id)
        ->select('ta.*', 'tb.nama_perusahaan', 'te.nama_tipe', 'tf.bentuk_layanan')
        ->first();

        $file = asset('lampiran_lainnya/'.$data->lampiran);
        return view('transaksi/lain/detail', [
            'data' => $data,
            'file' => $file,
            'status' => 200,
         ]);
    }

    public function show($id)
    {
        $data = DB::table('t_lain_perusahaan as ta')
        ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
        ->leftJoin('m_tipe_perusahaan as te', 'tb.id_tipe', '=', 'te.id')
        ->leftJoin('t_lain as tf', 'ta.id_transaksi_lain', '=', 'tf.id')
        ->whereNull('ta.deleted_at')
        ->where('ta.id', $id)
        ->select('ta.*', 'tb.nama_perusahaan', 'te.nama_tipe', 'tf.bentuk_layanan')
        ->first();

        $file = asset('lampiran_lainnya/'.$data->lampiran);
        return view('transaksi/lain/edit', [
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
        if(!empty($request->file('lampiran'))) {
            $file = $request->file('lampiran');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/lampiran_lainnya/', $nama_file);
            $name = $nama_file;
        }

        TransaksiLainPerusahaan::where('id', $request->id)->update([
            'kode_transaksi_layanan_lainnya' => $request->kode_transaksi_layanan_lainnya,
            'id_transaksi_lain' => $request->id_transaksi_lain,
            'id_perusahaan' => $request->id_perusahaan,
            'tanggal_transaksi' => date('Y-m-d', strtotime($request->tanggal_transaksi)),
            'keterangan' => $request->keterangan,
            'lampiran' => (!empty($request->lampiran) ? $name : $request->lampiran_lama),
            'updated_at' => Carbon::now(),
        ]);
        Alert::toast('Success Edit Transaksi Layanan!', 'success');
        return redirect()->route('lain');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TKonsultasi  $tKonsultasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = TransaksiLainPerusahaan::find($id)->delete();
        return response()->json([
            "status"=>200, 
        ]);
    }
}
