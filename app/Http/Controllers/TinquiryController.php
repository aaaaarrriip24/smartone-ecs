<?php

namespace App\Http\Controllers;

use App\Models\Tinquiry;
use App\Models\PPInquiry;
use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\Petugas;
use Carbon\Carbon;
use DataTables;
use DB;
use Alert;
use PDF;

class TinquiryController extends Controller
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
        $title = 'Delete Profile Inquiry!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        if ($request->ajax()) {
            if(isset($request->tglawal) && isset($request->tglakhir)) {
                $data = DB::table('t_profile_inquiry as ta')
                ->leftJoin('m_negara as tb', 'ta.id_negara_asal_inquiry', '=', 'tb.id')
                ->leftJoin('p_penerima_inquiry as tc', 'ta.id', '=', 'tc.id_inquiry')
                ->whereNull('ta.deleted_at')
                ->whereNull('tb.deleted_at')
                ->where('ta.tanggal_inquiry', '>=' , date('Y-m-d', strtotime($request->tglawal)))
                ->where('ta.tanggal_inquiry', '<=' , date('Y-m-d', strtotime($request->tglakhir)))
                ->select('ta.*', 'tb.en_short_name', DB::raw("group_concat(tc.id_perusahaan) AS perusahaan, COUNT(ta.id) AS jumlah_inquiry,COUNT(tc.id_perusahaan) AS jumlah_perusahaan"))
                ->groupBy('tc.id_inquiry')
                ->orderBy('ta.tanggal_inquiry')
                ->get();
            } else {
                $data = DB::table('t_profile_inquiry as ta')
                ->leftJoin('m_negara as tb', 'ta.id_negara_asal_inquiry', '=', 'tb.id')
                ->leftJoin('p_penerima_inquiry as tc', 'ta.id', '=', 'tc.id_inquiry')
                ->whereNull('ta.deleted_at')
                ->whereNull('tb.deleted_at')
                ->select('ta.*', 'tb.en_short_name', DB::raw("group_concat(tc.id_perusahaan) AS perusahaan, COUNT(ta.id) AS jumlah_inquiry,COUNT(tc.id_perusahaan) AS jumlah_perusahaan"))
                ->groupBy('tc.id_inquiry')
                ->orderBy('ta.tanggal_inquiry')
                ->get();
            }

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $urlPenerima = $row->id;
                        $urlEdit = url('inquiry/show/'. $row->id);
                        $urlDetail = url('inquiry/detail/'. $row->id);
                        $urlDelete = url('inquiry/destroy/'. $row->id);
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
                                        // <li><a data-id='.$urlPenerima.' class="dropdown-item btn-penerima" data-bs-toggle="modal" data-bs-target="#penerimaInquiry">Penerima</a></li>
                                    })
                    ->addColumn('total_inquiry', function($row){
                        $inquiry = Tinquiry::whereNull('deleted_at')->count();
                        return $inquiry;
                    })
                    ->addColumn('penerima_inquiry', function($row){
                        $tq = DB::table('p_penerima_inquiry as ta')
                        ->leftjoin('t_profile_inquiry as tb','tb.id','ta.id_inquiry')
                        ->leftjoin('m_perusahaan as tc','tc.id','ta.id_perusahaan')
                        ->leftjoin('m_tipe_perusahaan as td','td.id','tc.id_tipe')
                        ->where('ta.id', $row->id)
                        ->get();
                        return empty($tq) ? [] : json_decode($tq);
                    })
                    ->rawColumns(['action', 'penerima_inquiry','total_inquiry'])
                    ->make(true);
        }
        return view('transaksi/tinquiry/view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $get_inq = Tinquiry::orderBy('kode_inquiry', 'DESC')->first();
        $count_inq = explode("INQ-", $get_inq->kode_inquiry);
        $kode_inq = "INQ-" . strval($count_inq[1] + 1) ;

        return view('transaksi/tinquiry/add', compact('kode_inq'));
    }

    public function pdf(Request $request) {
        if(isset($request->tglawal) && isset($request->tglakhir)) {
            $data = DB::table('t_profile_inquiry as ta')
            ->leftJoin('m_negara as tb', 'ta.id_negara_asal_inquiry', '=', 'tb.id')
            ->leftJoin('p_penerima_inquiry as tc', 'ta.id', '=', 'tc.id_inquiry')
            ->whereNull('ta.deleted_at')
            ->whereNull('tb.deleted_at')
            ->where('ta.tanggal_inquiry', '>=' , date('Y-m-d', strtotime($request->tglawal)))
            ->where('ta.tanggal_inquiry', '<=' , date('Y-m-d', strtotime($request->tglakhir)))
            ->select('ta.*', 'tb.en_short_name', DB::raw("group_concat(tc.id_perusahaan) AS perusahaan, COUNT(ta.id) AS jumlah_inquiry,COUNT(tc.id_perusahaan) AS jumlah_perusahaan"))
            ->groupBy('tc.id_inquiry')
            ->orderBy('ta.tanggal_inquiry')
            ->get();

            foreach($data as $d) {
                $tq = DB::table('p_penerima_inquiry as ta')
                ->leftjoin('t_profile_inquiry as tb','tb.id','ta.id_inquiry')
                ->leftjoin('m_perusahaan as tc','tc.id','ta.id_perusahaan')
                ->leftjoin('m_tipe_perusahaan as td','td.id','tc.id_tipe')
                ->where('ta.id', $d->id)
                ->get();
            }
        } else {
            $data = DB::table('t_profile_inquiry as ta')
            ->leftJoin('m_negara as tb', 'ta.id_negara_asal_inquiry', '=', 'tb.id')
            ->leftJoin('p_penerima_inquiry as tc', 'ta.id', '=', 'tc.id_inquiry')
            ->whereNull('ta.deleted_at')
            ->whereNull('tq.deleteq_at')
            ->select('ta.*', 'tb.en_short_name', DB::raw("group_concat(tc.id_perusahaan) AS perusahaan, COUNT(ta.id) AS jumlah_inquiry,COUNT(tc.id_perusahaan) AS jumlah_perusahaan"))
            ->groupBy('tc.id_inquiry')
            ->orderBy('ta.tanggal_inquiry')
            ->get();

            foreach($data as $d) {
                $tq = DB::table('p_penerima_inquiry as ta')
                ->leftjoin('t_profile_inquiry as tb','tb.id','ta.id_inquiry')
                ->leftjoin('m_perusahaan as tc','tc.id','ta.id_perusahaan')
                ->leftjoin('m_tipe_perusahaan as td','td.id','tc.id_tipe')
                ->where('ta.id', $d->id)
                ->get();
            }
        }

        // dd($tb);
    	$pdf = PDF::loadview('transaksi/tinquiry/pdf',[
            'data' => $data,
            'tq' => $tq,
            'tglawal' => Carbon::parse($request->tglawal)->isoFormat('D MMMM'),
            'tglakhir' => Carbon::parse($request->tglakhir)->isoFormat('D MMMM Y'),
        ]);
    	return $pdf->stream('Laporan Transaksi Inquiry.pdf', array("Attachment" => false));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!empty($request->file('file'))) {
            $file = $request->file('file');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/attached_dokumen/', $nama_file);
            $name = $nama_file;
        }
        
        Tinquiry::insert([
            'kode_inquiry' => $request->kode_inquiry,
            'tanggal_inquiry' => date('Y-m-d', strtotime($request->tanggal_inquiry)),
            'produk_yang_diminta' => $request->produk_yang_diminta,
            'qty' => $request->qty,
            'satuan_qty' => $request->satuan_qty,
            'id_negara_asal_inquiry' => $request->id_negara_asal_inquiry,
            'pihak_buyer' => $request->pihak_buyer,
            'nama_buyer' => $request->nama_buyer,
            'email_buyer' => $request->email_buyer,
            'telp_buyer' => $request->telp_buyer,
            'attached_dokumen' => empty($request->file) ? '': $name,
            'created_at' => Carbon::now(),
        ]);

        $id_inquiry = DB::getPdo()->lastInsertId();
        
        $perusahaanArr = array();
        foreach($request->id_perusahaan as $key) {
            
            $get_rec = PPInquiry::orderBy('kode_rec_inquiry', 'DESC')->first();
            $count_rec = explode("INPR-", $get_rec->kode_rec_inquiry);
            $kode_rec = "INPR-" . strval($count_rec[1] + 1) ; 
            
            $perusahaanArr = $key;
            PPInquiry::insert([
                'kode_rec_inquiry' => $kode_rec,
                'id_inquiry' => $id_inquiry,
                'id_perusahaan' => $perusahaanArr,
                'created_at' => Carbon::now(),
            ]);
        }

        Alert::toast('Success Add Inquiry!', 'success');
        return redirect()->route('tinquiry');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TKonsultasi  $tKonsultasi
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $data = DB::table('t_profile_inquiry as ta')
        ->leftJoin('m_negara as tb', 'ta.id_negara_asal_inquiry', '=', 'tb.id')
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->select('ta.*', 'tb.en_short_name')
        ->where('ta.id', $id)
        ->first();

        $peserta = DB::table('p_penerima_inquiry as ta')
        ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
        ->where('ta.id_inquiry', $id)
        ->whereNull('ta.deleted_at')
        ->get();
        
        return view('transaksi/tinquiry/detail', [
            'data' => $data,
            'peserta' => $peserta,
            'status' => 200,
         ]);
    }

    public function show($id)
    {
        $data = DB::table('t_profile_inquiry as ta')
        ->leftJoin('m_negara as tb', 'ta.id_negara_asal_inquiry', '=', 'tb.id')
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->select('ta.*', 'tb.en_short_name')
        ->where('ta.id', $id)
        ->first();

        $peserta = DB::table('p_penerima_inquiry as ta')
        ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
        ->where('ta.id_inquiry', $id)
        ->whereNull('ta.deleted_at')
        ->get();

        return view('transaksi/tinquiry/edit', [
            'data' => $data,
            'peserta' => $peserta,
            'status' => 200,
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tKonsultasi  $tKonsultasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Tinquiry $tinquiry)
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
        if(!empty($request->file('file'))) {
            $file = $request->file('file');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/attached_dokumen/', $nama_file);
            $name = $nama_file;
        }

        Tinquiry::where('id', $request->id)->update([
            'kode_inquiry' => $request->kode_inquiry,
            'tanggal_inquiry' => date('Y-m-d', strtotime($request->tanggal_inquiry)),
            'produk_yang_diminta' => $request->produk_yang_diminta,
            'qty' => $request->qty,
            'satuan_qty' => $request->satuan_qty,
            'id_negara_asal_inquiry' => $request->id_negara_asal_inquiry,
            'pihak_buyer' => $request->pihak_buyer,
            'nama_buyer' => $request->nama_buyer,
            'email_buyer' => $request->email_buyer,
            'telp_buyer' => $request->telp_buyer,
            'attached_dokumen' => (!empty($request->file) ? $name : $request->file_lama),
            'updated_at' => Carbon::now(),
        ]);

        $id_inquiry = $request->id;
        $post = PPInquiry::where('id_inquiry', $id_inquiry)->delete();
        
        $perusahaanArr = array();
        foreach($request->id_perusahaan as $key) {
            
            $get_rec = PPInquiry::orderBy('kode_rec_inquiry', 'DESC')->first();
            $count_rec = explode("INPR-", $get_rec->kode_rec_inquiry);
            $kode_rec = "INPR-" . strval($count_rec[1] + 1) ; 
            
            $perusahaanArr = $key;
            PPInquiry::insert([
                'kode_rec_inquiry' => $kode_rec,
                'id_inquiry' => $id_inquiry,
                'id_perusahaan' => $perusahaanArr,
                'created_at' => Carbon::now(),
            ]);
        }

        Alert::toast('Success Edit Inquiry!', 'success');
        return redirect()->route('tinquiry');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TKonsultasi  $tKonsultasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Tinquiry::find($id)->delete();
        $post2 = PPInquiry::where('id_inquiry', $id)->delete();
        return response()->json([
            "status"=>200, 
        ]);
    }
}
