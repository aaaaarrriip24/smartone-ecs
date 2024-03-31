<?php

namespace App\Http\Controllers;

use App\Models\PPInaexport;
use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\Petugas;
use Carbon\Carbon;
use DataTables;
use DB;

class PPInaexportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Delete Peserta Inaexport!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        if ($request->ajax()) {
            $data = DB::table('p_peserta_inaexport as ta')
            ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
            ->leftJoin('m_petugas as tc', 'ta.id_petugas', '=', 'tc.id')
            ->whereNull('ta.deleted_at')
            ->whereNull('tb.deleted_at')
            ->whereNull('tc.deleted_at')
            ->select('ta.*', 'tb.kode_perusahaan', 'tc.nama_petugas')
            ->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $urlEdit = url('p_inaexport/show/'. $row->id);
                        $urlDetail = url('p_inaexport/detail/'. $row->id);
                        $urlDelete = url('p_inaexport/destroy/'. $row->id);
                        $button = '';
                        $button .= " <a href='".$urlEdit."' class='btn btn-outline-warning btn-sm btn-edit'>Edit</a>";
                        $button .= " <a href='".$urlDetail."' class='btn btn-outline-primary btn-sm btn-detail'>Detail</a>";
                        $button .= " <button data-href='".$urlDelete."' class='btn btn-outline-danger btn-sm btn-delete' >Delete</button>";
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('pp/peserta_inaexport/view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pp/peserta_inaexport/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PPInaexport::insert([
            'id_perusahaan' => $request->id_perusahaan,
            'tanggal_registrasi_inaexport' => $request->tanggal_registrasi_inaexport,
            'id_petugas' => $request->id_petugas,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('p_inaexport');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TKonsultasi  $tKonsultasi
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $data = DB::table('p_peserta_inaexport as ta')
        ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
        ->leftJoin('m_petugas as tc', 'ta.id_petugas', '=', 'tc.id')
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->whereNull('tc.deleted_at')
        ->select('ta.*', 'tb.kode_perusahaan', 'tc.nama_petugas')
        ->where('ta.id', $id)
        ->first();

        return view('pp/peserta_inaexport/detail', [
            'data' => $data,
            'status' => 200,
         ]);
    }

    public function show($id)
    {
        $data = DB::table('p_peserta_inaexport as ta')
        ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
        ->leftJoin('m_petugas as tc', 'ta.id_petugas', '=', 'tc.id')
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->whereNull('tc.deleted_at')
        ->select('ta.*', 'tb.kode_perusahaan', 'tc.nama_petugas')
        ->where('ta.id', $id)
        ->first();

        return view('pp/peserta_inaexport/edit', [
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
    public function edit(PPInaexport $pPInaexport)
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
        PPInaexport::where('id', $request->id)->update([
            'id_perusahaan' => $request->id_perusahaan,
            'tanggal_registrasi_inaexport' => $request->tanggal_registrasi_inaexport,
            'id_petugas' => $request->id_petugas,
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('p_inaexport');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TKonsultasi  $tKonsultasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = PPInaexport::find($id);
        $post->delete();
        return response()->json([
            "status"=>200, 
        ]);
    }
}
