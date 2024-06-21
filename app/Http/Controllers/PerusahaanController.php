<?php

namespace App\Http\Controllers;

use App\Models\TEPerusahaan;
use App\Models\Perusahaan;
use App\Models\Provinsi;
use App\Models\KabKota;
use App\Models\Tipe;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DataTables;
use DB;
use Alert;

class PerusahaanController extends Controller
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
        $title = 'Delete Perusahaan!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        if ($request->ajax()) {
            $data = DB::table('m_perusahaan as ta')
            ->leftJoin('m_tipe_perusahaan as tb', 'ta.id_tipe', '=', 'tb.id')
            ->leftJoin('indonesia_provinces as tc', 'ta.id_provinsi', '=', 'tc.code')
            ->leftJoin('indonesia_cities as td', 'ta.id_kabkota', '=', 'td.code')
            ->leftJoin('m_k_produk as te', 'ta.id_kategori_produk', '=', 'te.id')
            ->leftJoin('m_petugas as tf', 'ta.id_petugas', '=', 'tf.id')
            ->leftJoin('m_sub_kategori as tg', 'ta.id_sub_kategori', '=', 'tg.id')
            ->whereNull('ta.deleted_at')
            ->whereNull('tb.deleted_at')
            ->whereNull('tc.deleted_at')
            ->whereNull('td.deleted_at')
            ->whereNull('te.deleted_at')
            ->whereNull('tf.deleted_at')
            ->select('ta.*', 'tb.nama_tipe', 'tc.name as provinsi', 'td.name as cities', 'te.nama_kategori_produk','tg.nama_sub_kategori', 'tf.nama_petugas')
            ->get();
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status_data', function($row){
                        $status = 'Completed';
                        if(empty($row->id_tipe) || empty($row->id_provinsi) ||empty($row->id_kabkota) ||empty($row->alamat_perusahaan) ||empty($row->alamat_pabrik) ||empty($row->kode_pos) ||empty($row->nama_contact_person) ||empty($row->jabatan) ||empty($row->telp_contact_person) ||empty($row->telp_kantor) ||empty($row->email) ||empty($row->website) ||empty($row->status_kepemilikan) ||empty($row->skala_perusahaan) ||empty($row->jumlah_karyawan) ||empty($row->id_kategori_produk) ||empty($row->id_sub_kategori) ||empty($row->detail_produk_utama) ||empty($row->merek_produk) ||empty($row->hs_code) ||empty($row->kapasitas_produksi) ||empty($row->satuan_kapasitas_produksi) ||empty($row->kepemilikan_legalitas) ||empty($row->kepemilikan_sertifikat) ||empty($row->foto_produk_1) ||empty($row->foto_produk_2) ||empty($row->tanggal_registrasi) ||empty($row->id_petugas)) {
                            $status = "Not Completed";
                        }
                        return $status;
                    })
                    ->addColumn('action', function($row){
                        $urlEdit = url('perusahaan/show/'. $row->id);
                        $urlDetail = url('perusahaan/detail/'. $row->id);
                        $urlDelete = url('perusahaan/destroy/'. $row->id);
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
                    ->rawColumns(['action', 'status_data'])
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
        $get_pt = DB::table('m_perusahaan')->orderBy('id', 'DESC')->orderBy('created_at', 'DESC')->first();
        $last_pt = explode("-", $get_pt->kode_perusahaan); 
        $kode_pt = "PRS-" . strval($last_pt[1] + 1) ;
        // dd($kode_pt);
        return view('master/m_perusahaan/add', compact('get_pt', 'last_pt', 'kode_pt'));
    }

    public function detail($id)
    {
        $data = DB::table('m_perusahaan as ta')
        ->leftJoin('m_tipe_perusahaan as tb', 'ta.id_tipe', '=', 'tb.id')
        ->leftJoin('indonesia_provinces as tc', 'ta.id_provinsi', '=', 'tc.code')
        ->leftJoin('indonesia_cities as td', 'ta.id_kabkota', '=', 'td.id')
        ->leftJoin('m_k_produk as te', 'ta.id_kategori_produk', '=', 'te.id')
        ->leftJoin('m_petugas as tf', 'ta.id_petugas', '=', 'tf.id')
        ->leftJoin('m_sub_kategori as tg', 'ta.id_sub_kategori', '=', 'tg.id')
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->whereNull('tc.deleted_at')
        ->whereNull('td.deleted_at')
        ->whereNull('te.deleted_at')
        ->whereNull('tf.deleted_at')
        ->select('ta.*', 'tb.nama_tipe', 'tc.name as provinsi', 'td.name as cities', 'te.nama_kategori_produk','tg.nama_sub_kategori', 'tf.nama_petugas')
        ->where('ta.id', $id)
        ->first();

        $negara_ekspor = DB::table('t_e_perusahaan as ta')
        ->leftJoin('m_negara as tb', 'ta.id_negara', '=', 'tb.id')
        ->where('id_perusahaan', $data->id)
        ->get();

        return view('master/m_perusahaan/detail', [
            'data' => $data,
            'negara_ekspor' => $negara_ekspor,
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
        if(!empty($request->file('foto_produk_1'))) {
            $file = $request->file('foto_produk_1');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/foto_produk_1/', $nama_file);
            $name1 = $nama_file;
        }

        if(!empty($request->file('foto_produk_2'))) {
            $file = $request->file('foto_produk_2');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/foto_produk_2/', $nama_file);
            $name2 = $nama_file;
        }
        
        Perusahaan::insert([
            'kode_perusahaan' => $request->kode_perusahaan,
            'nama_perusahaan' => trim(strtoupper($request->nama_perusahaan)),
            'id_tipe' => $request->id_tipe,
            'id_provinsi' => $request->id_provinsi,
            'id_kabkota' => $request->id_kabkota,
            'alamat_perusahaan' => $request->alamat_perusahaan,
            'alamat_pabrik' => $request->alamat_pabrik,
            'nama_contact_person' => $request->nama_contact_person,
            'telp_contact_person' => $request->telp_contact_person,
            'email' => $request->email,
            'kode_pos' => $request->kode_pos,
            'jabatan' => $request->jabatan,
            'telp_kantor' => $request->telp_kantor,
            'website' => $request->website,
            'status_kepemilikan' => $request->status_kepemilikan,
            'skala_perusahaan' => $request->skala_perusahaan,
            'jumlah_karyawan' => $request->jumlah_karyawan,
            'id_kategori_produk' => $request->id_kategori_produk,
            'id_sub_kategori' => $request->id_sub_kategori,
            'detail_produk_utama' => $request->detail_produk_utama,
            'merek_produk' => $request->merek_produk,
            'hs_code' => $request->hs_code,
            'kapasitas_produksi' => $request->kapasitas_produksi,
            'satuan_kapasitas_produksi' => $request->satuan_kapasitas_produksi,
            'kepemilikan_legalitas' => $request->kepemilikan_legalitas,
            'kepemilikan_sertifikat' => $request->kepemilikan_sertifikat,
            'foto_produk_1' => empty($name1) ? '' : $name1,
            'foto_produk_2' => empty($name2) ? '' : $name2,
            'tanggal_registrasi' => date('Y-m-d', strtotime($request->tanggal_registrasi)),
            'id_petugas' => $request->id_petugas,
            'created_at' => Carbon::now(),
        ]);

        $id_perusahaan = DB::getPdo()->lastInsertId();
        if(!empty($request->status_ekspor)) {
            foreach($request->status_ekspor as $key) {
                TEPerusahaan::insert([
                    'id_perusahaan' => $id_perusahaan,
                    'id_negara' => $key,
                    'created_at' => Carbon::now(),
                ]);
            }
        }

        Alert::toast('Success Add Perusahaan!', 'success');
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
        $data = DB::table('m_perusahaan as ta')
        ->leftJoin('m_tipe_perusahaan as tb', 'ta.id_tipe', '=', 'tb.id')
        ->leftJoin('indonesia_provinces as tc', 'ta.id_provinsi', '=', 'tc.code')
        ->leftJoin('indonesia_cities as td', 'ta.id_kabkota', '=', 'td.id')
        ->leftJoin('m_k_produk as te', 'ta.id_kategori_produk', '=', 'te.id')
        ->leftJoin('m_petugas as tf', 'ta.id_petugas', '=', 'tf.id')
        ->leftJoin('m_sub_kategori as tg', 'ta.id_sub_kategori', '=', 'tg.id')
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->whereNull('tc.deleted_at')
        ->whereNull('td.deleted_at')
        ->whereNull('te.deleted_at')
        ->whereNull('tf.deleted_at')
        ->select('ta.*', 'tb.nama_tipe', 'tc.name as provinsi', 'td.name as cities', 'te.nama_kategori_produk','tg.nama_sub_kategori', 'tf.nama_petugas')
        ->where('ta.id', $id)
        ->first();

        $negara_ekspor = DB::table('t_e_perusahaan as ta')
        ->leftJoin('m_negara as tb', 'ta.id_negara', '=', 'tb.id')
        ->where('id_perusahaan', $data->id)
        ->get();

        if(empty($data->tanggal_registrasi)) {
            $data->tanggal_registrasi = date('d-m-Y');
        } else {
            $data->tanggal_registrasi;
        }

        // dd($data->tanggal_registrasi);

        return view('master/m_perusahaan/edit', [
            'data' => $data,
            'negara_ekspor' => $negara_ekspor,
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
            'kode_perusahaan' => $request->kode_pt,
            'nama_perusahaan' => $request->nama_perusahaan,
            'id_tipe' => $request->id_tipe,
            'id_provinsi' => $request->id_provinsi,
            'id_kabkota' => $request->id_kabkota,
            'alamat_perusahaan' => $request->alamat_perusahaan,
            'alamat_pabrik' => $request->alamat_pabrik,
            'nama_contact_person' => $request->nama_contact_person,
            'telp_contact_person' => $request->telp_contact_person,
            'email' => $request->email,
            'kode_pos' => $request->kode_pos,
            'jabatan' => $request->jabatan,
            'telp_kantor' => $request->telp_kantor,
            'website' => $request->website,
            'status_kepemilikan' => $request->status_kepemilikan,
            'skala_perusahaan' => $request->skala_perusahaan,
            'jumlah_karyawan' => $request->jumlah_karyawan,
            'id_kategori_produk' => $request->id_kategori_produk,
            'id_sub_kategori' => $request->id_sub_kategori,
            'detail_produk_utama' => $request->detail_produk_utama,
            'merek_produk' => $request->merek_produk,
            'hs_code' => $request->hs_code,
            'kapasitas_produksi' => $request->kapasitas_produksi,
            'satuan_kapasitas_produksi' => $request->satuan_kapasitas_produksi,
            'kepemilikan_legalitas' => $request->kepemilikan_legalitas,
            'kepemilikan_sertifikat' => $request->kepemilikan_sertifikat,
            'foto_produk_1' => (!empty($request->foto_produk_1) ? $name1 : $request->foto_produk_1_lama),
            'foto_produk_2' => (!empty($request->foto_produk_2) ? $name2 : $request->foto_produk_2_lama),
            'tanggal_registrasi' => date('Y-m-d', strtotime($request->tanggal_registrasi)),
            'id_petugas' => $request->id_petugas,
            'updated_at' => Carbon::now(),
        ]);

        $id_perusahaan = $request->id;

        $post = TEPerusahaan::where('id_perusahaan', $request->id)->delete();
        if(!empty($request->status_ekspor)) {
            foreach($request->status_ekspor as $key) {
                TEPerusahaan::insert([
                    'id_perusahaan' => $id_perusahaan,
                    'id_negara' => $key,
                    'created_at' => Carbon::now(),
                ]);
            }
        }
        Alert::toast('Success Edit Perusahaan!', 'success');
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
