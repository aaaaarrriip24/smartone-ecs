<?php

namespace App\Http\Controllers;

use App\Models\Tinquiry;
use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\Petugas;
use Carbon\Carbon;
use DataTables;
use DB;

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
            $data = DB::table('t_profile_inquiry as ta')
            ->leftJoin('m_negara as tb', 'ta.id_negara_asal_inquiry', '=', 'tb.id')
            ->whereNull('ta.deleted_at')
            ->whereNull('tb.deleted_at')
            ->select('ta.*', 'tb.en_short_name')
            ->get();

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
                                            <li><a data-id='.$urlPenerima.' class="dropdown-item btn-penerima" data-bs-toggle="modal" data-bs-target="#penerimaInquiry">Penerima</a></li>
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
        return view('transaksi/tinquiry/view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $get_inq = DB::table('t_profile_inquiry')->get();
        $count_inq = $get_inq->count();
        $kode_inq = "INQ-" . strval($count_inq + 1) ;

        return view('transaksi/tinquiry/add', compact('kode_inq'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!empty($request->file('attached_dokumen'))) {
            $file = $request->file('attached_dokumen');
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
            'attached_dokumen' => empty($request->attached_dokumen) ? '': $name,
            'created_at' => Carbon::now(),
        ]);
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

        return view('transaksi/tinquiry/detail', [
            'data' => $data,
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

        return view('transaksi/tinquiry/edit', [
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
        Tinquiry::where('id', $request->id)->update([
            'kode_inquiry' => $request->kode_inquiry,
            'tanggal_inquiry' => $request->tanggal_inquiry,
            'produk_yang_diminta' => $request->produk_yang_diminta,
            'qty' => $request->qty,
            'satuan_qty' => $request->satuan_qty,
            'id_negara_asal_inquiry' => $request->id_negara_asal_inquiry,
            'pihak_buyer' => $request->pihak_buyer,
            'nama_buyer' => $request->nama_buyer,
            'email_buyer' => $request->email_buyer,
            'telp_buyer' => $request->telp_buyer,
            'updated_at' => Carbon::now(),
        ]);
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
        $post = Tinquiry::find($id);
        $post->delete();
        return response()->json([
            "status"=>200, 
        ]);
    }
}
