<?php

namespace App\Http\Controllers;

use App\Models\PPBm;
use App\Models\TBm;
use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\Petugas;
use Carbon\Carbon;
use DataTables;
use DB;

class PPBmController extends Controller
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
        $title = 'Delete Peserta BM!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        if ($request->ajax()) {
            $data = DB::table('p_peserta_bm as ta')
            ->leftJoin('t_bm as tb', 'ta.id_bm', '=', 'tb.id')
            ->leftJoin('m_perusahaan as tc', 'ta.id_perusahaan', '=', 'tc.id')
            ->whereNull('ta.deleted_at')
            ->whereNull('tb.deleted_at')
            ->whereNull('tc.deleted_at')
            ->select('ta.*', 'tb.kode_bm', 'tc.kode_perusahaan')
            ->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $urlEdit = url('ppbm/show/'. $row->id);
                        $urlDetail = url('ppbm/detail/'. $row->id);
                        $urlDelete = url('ppbm/destroy/'. $row->id);
                        $button = '';
                        $button .= " <a href='".$urlEdit."' class='btn btn-outline-warning btn-sm btn-edit'>Edit</a>";
                        $button .= " <a href='".$urlDetail."' class='btn btn-outline-primary btn-sm btn-detail'>Detail</a>";
                        $button .= " <button data-href='".$urlDelete."' class='btn btn-outline-danger btn-sm btn-delete' >Delete</button>";
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('pp/penerima_bm/view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pp/penerima_bm/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PPBm::insert([
            'id_bm' => $request->id_bm,
            'id_perusahaan' => $request->id_perusahaan,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('ppbm');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TKonsultasi  $tKonsultasi
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $data = DB::table('p_peserta_bm as ta')
        ->leftJoin('t_bm as tb', 'ta.id_bm', '=', 'tb.id')
        ->leftJoin('m_perusahaan as tc', 'ta.id_perusahaan', '=', 'tc.id')
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->whereNull('tc.deleted_at')
        ->select('ta.*', 'tb.kode_bm', 'tc.kode_perusahaan')
        ->where('ta.id', $id)
        ->first();

        return view('pp/penerima_bm/detail', [
            'data' => $data,
            'status' => 200,
         ]);
    }

    public function show($id)
    {
        $data = DB::table('p_peserta_bm as ta')
        ->leftJoin('t_bm as tb', 'ta.id_bm', '=', 'tb.id')
        ->leftJoin('m_perusahaan as tc', 'ta.id_perusahaan', '=', 'tc.id')
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->whereNull('tc.deleted_at')
        ->select('ta.*', 'tb.kode_bm', 'tc.kode_perusahaan')
        ->where('ta.id', $id)
        ->first();

        return view('pp/penerima_bm/edit', [
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
    public function edit(PPBm $pPBm)
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

        PPBm::where('id', $request->id)->update([
            'id_bm' => $request->id_bm,
            'id_perusahaan' => $request->id_perusahaan,
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('ppbm');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TKonsultasi  $tKonsultasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = PPBm::find($id);
        $post->delete();
        return response()->json([
            "status"=>200, 
        ]);
    }
}
