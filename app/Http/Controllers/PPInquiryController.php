<?php

namespace App\Http\Controllers;

use App\Models\PPInquiry;
use App\Models\Tinquiry;
use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\Petugas;
use Carbon\Carbon;
use DataTables;
use DB;
use Alert;

class PPInquiryController extends Controller
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
        $title = 'Delete Penerima Inquiry!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        if ($request->ajax()) {
            $data = DB::table('p_penerima_inquiry as ta')
            ->leftJoin('t_profile_inquiry as tb', 'ta.id_inquiry', '=', 'tb.id')
            ->leftJoin('m_perusahaan as tc', 'ta.id_perusahaan', '=', 'tc.id')
            ->whereNull('ta.deleted_at')
            ->whereNull('tb.deleted_at')
            ->whereNull('tc.deleted_at')
            ->select('ta.*', 'tb.kode_inquiry', 'tc.kode_perusahaan')
            ->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $urlEdit = url('p_inquiry/show/'. $row->id);
                        $urlDetail = url('p_inquiry/detail/'. $row->id);
                        $urlDelete = url('p_inquiry/destroy/'. $row->id);
                        $button = '';
                        $button .= " <a href='".$urlEdit."' class='btn btn-outline-warning btn-sm btn-edit'>Edit</a>";
                        $button .= " <a href='".$urlDetail."' class='btn btn-outline-primary btn-sm btn-detail'>Detail</a>";
                        $button .= " <button data-href='".$urlDelete."' class='btn btn-outline-danger btn-sm btn-delete' >Delete</button>";
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('pp/penerima_inquiry/view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pp/penerima_inquiry/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_inquiry = $request->id_inquiry;

        $post = PPInquiry::where('id_inquiry', $id_inquiry)->delete();

        $perusahaanArr = array();
        foreach($request->id_perusahaan as $key) {
            
            $get_rec = PPInquiry::whereNull('deleted_at')->orderBy('created_at', 'DESC')->first();
            if($get_rec == null) {
                $kode_rec = "INPR-" . 1000 . "-" . date('y');
            } else {
                $count_rec = explode("-", $get_rec->kode_rec_inquiry);
                $kode_rec = "INPR-" . strval($count_rec[1] + 1) . "-" . date('y');
            }

            $perusahaanArr = $key;
            PPInquiry::insert([
                'kode_rec_inquiry' => $kode_rec . "-" . date('y'),
                'id_inquiry' => $id_inquiry,
                'id_perusahaan' => $perusahaanArr,
                'created_at' => Carbon::now(),
            ]);
        }
        Alert::toast('Success Add Penerima Inquiry!', 'success');
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
        $data = DB::table('p_penerima_inquiry as ta')
        ->leftJoin('t_profile_inquiry as tb', 'ta.id_inquiry', '=', 'tb.id')
        ->leftJoin('m_perusahaan as tc', 'ta.id_perusahaan', '=', 'tc.id')
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->whereNull('tc.deleted_at')
        ->select('ta.*', 'tb.kode_inquiry', 'tc.kode_perusahaan')
        ->where('ta.id', $id)
        ->first();

        return view('pp/penerima_inquiry/detail', [
            'data' => $data,
            'status' => 200,
         ]);
    }

    public function show(Request $request)
    {
        $data = DB::table('p_penerima_inquiry as ta')
        ->leftJoin('t_profile_inquiry as tb', 'ta.id_inquiry', '=', 'tb.id')
        ->leftJoin('m_perusahaan as tc', 'ta.id_perusahaan', '=', 'tc.id')
        ->leftJoin('m_tipe_perusahaan as td', 'tc.id_tipe', '=', 'td.id')
        ->whereNull('ta.deleted_at')
        ->whereNotNull('ta.id_perusahaan')
        ->whereNull('tb.deleted_at')
        ->whereNull('tc.deleted_at')
        ->select(DB::raw('ta.*, IFNULL(tb.nama_tipe, "") as nama_tipe'))
        ->get();

        if($request->term) {
            $data = DB::table('p_penerima_inquiry as ta')
            ->leftJoin('t_profile_inquiry as tb', 'ta.id_inquiry', '=', 'tb.id')
            ->leftJoin('m_perusahaan as tc', 'ta.id_perusahaan', '=', 'tc.id')
            ->leftJoin('m_tipe_perusahaan as td', 'tc.id_tipe', '=', 'td.id')
            ->whereNull('ta.deleted_at')
            ->whereNotNull('ta.id_perusahaan')
            ->whereNull('tb.deleted_at')
            ->whereNull('tc.deleted_at')
            ->select(DB::raw('IFNULL(td.nama_tipe, "") as nama_tipe, ta.*, tb.kode_inquiry, tc.kode_perusahaan'))
            ->where('tc.nama_perusahaan', 'LIKE', '%'. $request->term. '%')
            ->get();
        }
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tKonsultasi  $tKonsultasi
     * @return \Illuminate\Http\Response
     */
    public function edit(PPInquiry $pPInquiry)
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

        PPInquiry::where('id', $request->id)->update([
            'id_inquiry' => $request->id_inquiry,
            'id_perusahaan' => $request->id_perusahaan,
            'updated_at' => Carbon::now(),
        ]);
        Alert::toast('Success Edit Penerima Inquiry!', 'success');
        return redirect()->route('p_inquiry');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TKonsultasi  $tKonsultasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = PPInquiry::find($id);
        $post->delete();
        return response()->json([
            "status"=>200, 
        ]);
    }
}
