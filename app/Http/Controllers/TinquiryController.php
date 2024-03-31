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
    public function index(Request $request)
    {
        $title = 'Delete Profile Inquiry!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        if ($request->ajax()) {
            $data = DB::table('t_profile_inquiry as ta')
            ->leftJoin('m_negara as tb', 'ta.id_negara_buyer', '=', 'tb.id')
            ->whereNull('ta.deleted_at')
            ->whereNull('tb.deleted_at')
            ->select('ta.*', 'tb.en_short_name')
            ->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $urlEdit = url('inquiry/show/'. $row->id);
                        $urlDetail = url('inquiry/detail/'. $row->id);
                        $urlDelete = url('inquiry/destroy/'. $row->id);
                        $button = '';
                        $button .= " <a href='".$urlEdit."' class='btn btn-outline-warning btn-sm btn-edit'>Edit</a>";
                        $button .= " <a href='".$urlDetail."' class='btn btn-outline-primary btn-sm btn-detail'>Detail</a>";
                        $button .= " <button data-href='".$urlDelete."' class='btn btn-outline-danger btn-sm btn-delete' >Delete</button>";
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
        return view('transaksi/tinquiry/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tinquiry::insert([
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
        ->leftJoin('m_negara as tb', 'ta.id_negara_buyer', '=', 'tb.id')
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
        ->leftJoin('m_negara as tb', 'ta.id_negara_buyer', '=', 'tb.id')
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
