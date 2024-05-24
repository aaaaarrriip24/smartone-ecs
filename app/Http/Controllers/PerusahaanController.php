<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\Provinsi;
use App\Models\KabKota;
use App\Models\Tipe;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DataTables;
use DB;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Delete Perusahaan!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        if ($request->ajax()) {
            $data = DB::table('m_perusahaan as ta')
            ->leftJoin('m_tipe_perusahaan as tb', 'ta.id_tipe', '=', 'tb.id')
            ->leftJoin('indonesia_provinces as tc', 'ta.id_provinsi', '=', 'tc.id')
            ->leftJoin('indonesia_cities as td', 'ta.id_kabkota', '=', 'td.id')
            ->leftJoin('m_k_produk as te', 'ta.id_kategori_produk', '=', 'te.id')
            ->leftJoin('m_petugas as tf', 'ta.id_petugas', '=', 'tf.id')
            ->whereNull('ta.deleted_at')
            ->whereNull('tb.deleted_at')
            ->whereNull('tc.deleted_at')
            ->whereNull('td.deleted_at')
            ->whereNull('te.deleted_at')
            ->whereNull('tf.deleted_at')
            ->select('ta.*', 'tb.nama_tipe', 'tc.name as provinsi', 'td.name as cities', 'te.nama_kategori_produk', 'tf.nama_petugas')
            ->get();
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $urlEdit = url('perusahaan/show/'. $row->id);
                        $urlDetail = url('perusahaan/detail/'. $row->id);
                        $urlDelete = url('perusahaan/destroy/'. $row->id);
                        $button = '';
                        $button .= " <a href='".$urlEdit."' class='btn btn-outline-warning btn-sm btn-edit'>Edit</a>";
                        $button .= " <a href='".$urlDetail."' class='btn btn-outline-primary btn-sm btn-detail'>Detail</a>";
                        $button .= " <button data-href='".$urlDelete."' class='btn btn-outline-danger btn-sm btn-delete' >Delete</button>";
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('master/m_perusahaan/view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master/m_perusahaan/add');
    }

    public function detail($id)
    {
        $data = DB::table('m_perusahaan as ta')
        ->leftJoin('m_tipe_perusahaan as tb', 'ta.id_tipe', '=', 'tb.id')
        ->leftJoin('indonesia_provinces as tc', 'ta.id_provinsi', '=', 'tc.id')
        ->leftJoin('indonesia_cities as td', 'ta.id_kabkota', '=', 'td.id')
        ->leftJoin('m_k_produk as te', 'ta.id_kategori_produk', '=', 'te.id')
        ->leftJoin('m_petugas as tf', 'ta.id_petugas', '=', 'tf.id')
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->whereNull('tc.deleted_at')
        ->whereNull('td.deleted_at')
        ->whereNull('te.deleted_at')
        ->whereNull('tf.deleted_at')
        ->select('ta.*', 'tb.nama_tipe', 'tc.name as provinsi', 'td.name as cities', 'te.nama_kategori_produk', 'tf.nama_petugas')
        ->where('ta.id', $id)
        ->first();

        return view('master/m_perusahaan/detail', [
            'data' => $data,
            'status' => 200,
         ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('foto_produk_1');
        $nama_file = time()."_".$file->getClientOriginalName();
        $file->move(public_path().'/foto_produk_1/', $nama_file);
        $name1 = $nama_file;

        $file = $request->file('foto_produk_2');
        $nama_file = time()."_".$file->getClientOriginalName();
        $file->move(public_path().'/foto_produk_2/', $nama_file);
        $name2 = $nama_file;
        
        Perusahaan::insert([
            'kode_perusahaan' => $request->kode_perusahaan,
            'nama_perusahaan' => $request->nama_perusahaan,
            'id_tipe' => $request->id_tipe,
            'id_provinsi' => $request->id_provinsi,
            'id_kabkota' => $request->id_kabkota,
            'alamat_perusahaan' => $request->alamat_perusahaan,
            'alamat_pabrik' => $request->alamat_pabrik,
            'nama_contact_person' => $request->nama_contact_person,
            'telp_contact_person' => $request->telp_contact_person,
            'email' => $request->email,
            'website' => $request->website,
            'status_kepemilikan' => $request->status_kepemilikan,
            'skala_perusahaan' => $request->skala_perusahaan,
            'jumlah_karyawan' => $request->jumlah_karyawan,
            'id_kategori_produk' => $request->id_kategori_produk,
            'detail_produk_utama' => $request->detail_produk_utama,
            'merek_produk' => $request->merek_produk,
            'hs_code' => $request->hs_code,
            'kapasitas_produksi' => $request->kapasitas_produksi,
            'satuan_kapasitas_produksi' => $request->satuan_kapasitas_produksi,
            'sertifikat' => $request->sertifikat,
            'status' => $request->status,
            'foto_produk_1' => $name1,
            'foto_produk_2' => $name2,
            'tanggal_registrasi' => $request->tanggal_registrasi,
            'id_petugas' => $request->id_petugas,
            'show_status' => $request->show_status,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('perusahaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        // $provinsi = DB::table('indonesia_provinces')
        // ->get();
        
        // $kabkota = DB::table('indonesia_cities as ta')
        // ->leftJoin('indonesia_provinces as tb', 'tb.code', '=', 'ta.province_code')
        // ->select('*')
        // ->get();
        
        // $tipe = Tipe::all();
        // $petugas = Petugas::all();

        $data = DB::table('m_perusahaan as ta')
        ->leftJoin('m_tipe_perusahaan as tb', 'ta.id_tipe', '=', 'tb.id')
        ->leftJoin('indonesia_provinces as tc', 'ta.id_provinsi', '=', 'tc.id')
        ->leftJoin('indonesia_cities as td', 'ta.id_kabkota', '=', 'td.id')
        ->leftJoin('m_k_produk as te', 'ta.id_kategori_produk', '=', 'te.id')
        ->leftJoin('m_petugas as tf', 'ta.id_petugas', '=', 'tf.id')
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->whereNull('tc.deleted_at')
        ->whereNull('td.deleted_at')
        ->whereNull('te.deleted_at')
        ->whereNull('tf.deleted_at')
        ->select('ta.*', 'tb.nama_tipe', 'tc.name as provinsi', 'td.name as cities', 'te.nama_kategori_produk', 'tf.nama_petugas')
        ->where('ta.id', $id)
        ->first();
        
        return view('master/m_perusahaan/edit', [
            'data' => $data,
            'status' => 200,
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Perusahaan $perusahaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if(!empty($request->foto_produk_1)){
            $file = $request->file('foto_produk_1');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/foto_produk_1/', $nama_file);
            $name1 = $nama_file;
        }

        if(!empty($request->foto_produk_2)){
            $file = $request->file('foto_produk_2');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/foto_produk_2/', $nama_file);
            $name2 = $nama_file;
        }

        Perusahaan::where('id', $request->id)
        ->update([
            'kode_perusahaan' => $request->kode_perusahaan,
            'nama_perusahaan' => $request->nama_perusahaan,
            'id_tipe' => $request->id_tipe,
            'id_provinsi' => $request->id_provinsi,
            'id_kabkota' => $request->id_kabkota,
            'alamat_perusahaan' => $request->alamat_perusahaan,
            'alamat_pabrik' => $request->alamat_pabrik,
            'nama_contact_person' => $request->nama_contact_person,
            'telp_contact_person' => $request->telp_contact_person,
            'email' => $request->email,
            'website' => $request->website,
            'status_kepemilikan' => $request->status_kepemilikan,
            'skala_perusahaan' => $request->skala_perusahaan,
            'jumlah_karyawan' => $request->jumlah_karyawan,
            'id_kategori_produk' => $request->id_kategori_produk,
            'detail_produk_utama' => $request->detail_produk_utama,
            'merek_produk' => $request->merek_produk,
            'hs_code' => $request->hs_code,
            'kapasitas_produksi' => $request->kapasitas_produksi,
            'satuan_kapasitas_produksi' => $request->satuan_kapasitas_produksi,
            'sertifikat' => $request->sertifikat,
            'status' => $request->status,
            'foto_produk_1' => (!empty($request->foto_produk_1) ? $name1 : $request->foto_produk_1_lama),
            'foto_produk_2' => (!empty($request->foto_produk_2) ? $name2 : $request->foto_produk_2_lama),
            'tanggal_registrasi' => $request->tanggal_registrasi,
            'id_petugas' => $request->id_petugas,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('perusahaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Perusahaan::find($id);
        $post->delete();
        return response()->json([
            "status"=>200, 
        ]);
    }
}
