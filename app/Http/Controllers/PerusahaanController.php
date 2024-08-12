<?php

namespace App\Http\Controllers;

use App\Models\TSubKategoriPerusahaan;
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
use Mail;
use App\Mail\PerusahaanEmail;
use PDF;

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
            ->leftJoin('m_k_produk as tf', 'ta.id_kategori_produk', '=', 'tf.id')
            ->leftJoin('t_sub_kategori_perusahaan as tg', 'tg.id_perusahaan', '=', 'ta.id')
            ->leftJoin('m_sub_kategori as th', 'tg.id_sub_kategori', '=', 'th.id')
            ->whereNull('ta.deleted_at');
            
            if(isset($request->province_id)) {
                $data->where('ta.id_provinsi', '=' , $request->province_id);
            } 
            if(isset($request->cities_id)) {
                $data->where('ta.id_kabkota', '=' , $request->cities_id);
            } 
            if(isset($request->id_kategori_produk)) {
                $data->where('ta.id_kategori_produk', '=' , $request->id_kategori_produk);
            } 
            if(isset($request->id_sub_kategori)) {
                $data->whereIn('tg.id_sub_kategori', $request->id_sub_kategori);
            } 
            
            if($request->term) {
                $data->where('nama_sub_kategori', 'LIKE', '%'. $request->term. '%');
            }
            
            $data->select(DB::raw('ta.id, ta.nama_perusahaan, ta.detail_produk_utama, ta.alamat_perusahaan, ta.telp_contact_person, ta.skala_perusahaan, tf.nama_kategori_produk, group_concat( th.nama_sub_kategori ) AS sub_kategori, tb.nama_tipe, tc.NAME AS provinsi, td.NAME AS cities'))
            ->groupBy('ta.id')
            ->orderBy('ta.id', 'ASC')
            ->get();

            $data = $data->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status_data', function($row){
                        $status = 'Completed';
                        if(empty($row->id_tipe) || empty($row->id_provinsi) ||empty($row->id_kabkota) ||empty($row->alamat_perusahaan) ||empty($row->alamat_pabrik) ||empty($row->kode_pos) ||empty($row->nama_contact_person) ||empty($row->jabatan) ||empty($row->telp_contact_person) ||empty($row->telp_kantor) ||empty($row->email) ||empty($row->website) ||empty($row->status_kepemilikan) ||empty($row->skala_perusahaan) ||empty($row->jumlah_karyawan) ||empty($row->id_kategori_produk) ||empty($row->detail_produk_utama) ||empty($row->merek_produk) ||empty($row->hs_code) ||empty($row->kapasitas_produksi) ||empty($row->satuan_kapasitas_produksi) ||empty($row->kepemilikan_legalitas) ||empty($row->kepemilikan_sertifikat) ||empty($row->foto_produk_1) ||empty($row->foto_produk_2) ||empty($row->tanggal_registrasi) ||empty($row->id_petugas)) {
                            $status = "Not Completed";
                        }
                        return $status;
                    })
                    ->addColumn('action', function($row){
                        $urlEdit = url('perusahaan/show/'. $row->id);
                        $urlDetail = url('perusahaan/detail/'. $row->id);
                        $urlDetailLayanan = url('perusahaan/detail/layanan/'. $row->id);
                        $urlDelete = url('perusahaan/destroy/'. $row->id);
                        $button = '<div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href='.$urlEdit.' class="dropdown-item btn-edit">Edit</a></li>
                                            <li><a href='.$urlDetail.' class="dropdown-item btn-detail">Detail</a></li>
                                            <li><a href='.$urlDetailLayanan.' class="dropdown-item btn-detail" target="_blank">Detail Layanan</a></li>
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
    public function pdf_layanan($id) {
        $perusahaan = DB::table('m_perusahaan as ta')
        ->leftJoin('m_tipe_perusahaan as tb', 'ta.id_tipe', '=', 'tb.id')
        ->leftJoin('indonesia_provinces as tc', 'ta.id_provinsi', '=', 'tc.code')
        ->leftJoin('indonesia_cities as td', 'ta.id_kabkota', '=', 'td.code')
        ->leftJoin('m_k_produk as tf', 'ta.id_kategori_produk', '=', 'tf.id')
        ->leftJoin('t_sub_kategori_perusahaan as tg', 'tg.id_perusahaan', '=', 'ta.id')
        ->leftJoin('m_sub_kategori as th', 'tg.id_sub_kategori', '=', 'th.id')
        ->whereNull('ta.deleted_at')
        ->select(DB::raw('ta.id, ta.nama_perusahaan, ta.alamat_perusahaan, ta.detail_produk_utama, ta.telp_contact_person, ta.skala_perusahaan, tf.nama_kategori_produk, group_concat( th.nama_sub_kategori ) AS sub_kategori, tb.nama_tipe, tc.NAME AS provinsi, td.NAME AS cities'))
        ->where('ta.id', $id)
        ->groupBy('ta.id')
        ->first();

        $konsultasi = DB::table('t_konsultasi as ta')
        ->leftJoin('t_konsultasi_topik as tb', 'ta.id', '=', 'tb.id_konsultasi')
        ->leftJoin('m_topik as mt', 'tb.id_topik', '=', 'mt.id')
        ->leftJoin('m_perusahaan as mp', 'ta.id_perusahaan', '=', 'mp.id')
        ->leftJoin('m_tipe_perusahaan as mtp', 'mtp.id', '=', 'mp.id_tipe')
        ->select(DB::raw('DISTINCT ta.* , GROUP_CONCAT(mt.nama_topik) as nama_topik, mp.nama_perusahaan, mtp.nama_tipe'))
        ->where('ta.id_perusahaan', $id)
        ->whereNull('ta.deleted_at')
        ->groupBy('ta.id')
        ->get();

        $inquiry = DB::table('t_profile_inquiry as ta')
        ->leftJoin('m_negara as tc', 'ta.id_negara_asal_inquiry', '=', 'tc.id')
        ->leftJoin('p_penerima_inquiry as tb', 'ta.id', '=', 'tb.id_inquiry')
        ->leftJoin('m_perusahaan as mp', 'tb.id_perusahaan', '=', 'mp.id')
        ->leftJoin('m_tipe_perusahaan as mtp', 'mtp.id', '=', 'mp.id_tipe')
        ->select(DB::raw('DISTINCT ta.* , mp.nama_perusahaan, mtp.nama_tipe, tc.en_short_name'))
        ->where('tb.id_perusahaan', $id)
        ->whereNull('ta.deleted_at')
        ->groupBy('ta.id')
        ->get();
        
        $bm = DB::table('t_bm as ta')
        ->leftJoin('p_peserta_bm as tb', 'ta.id', '=', 'tb.id_bm')        
        ->leftJoin('m_negara as tc', 'ta.id_negara_buyer', '=', 'tc.id')
        ->leftJoin('m_perusahaan as mp', 'tb.id_perusahaan', '=', 'mp.id')
        ->leftJoin('m_tipe_perusahaan as mtp', 'mtp.id', '=', 'mp.id_tipe')
        ->select(DB::raw('DISTINCT ta.* , mp.nama_perusahaan, mtp.nama_tipe, tc.en_short_name'))
        ->where('tb.id_perusahaan', $id)
        ->whereNull('ta.deleted_at')
        ->groupBy('ta.id')
        ->get();
        
        $texport = DB::table('t_p_export as ta')
        ->leftJoin('m_negara as tc', 'ta.id_negara_tujuan', '=', 'tc.id')
        ->leftJoin('m_perusahaan as mp', 'ta.id_perusahaan', '=', 'mp.id')
        ->leftJoin('m_tipe_perusahaan as mtp', 'mtp.id', '=', 'mp.id_tipe')
        ->select(DB::raw('DISTINCT ta.* , mp.nama_perusahaan, mtp.nama_tipe, tc.en_short_name'))
        ->where('ta.id_perusahaan', $id)
        ->whereNull('ta.deleted_at')
        ->groupBy('ta.id')
        ->get();
        
        $countTotal = DB::table('t_p_export as ta')
        ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
        ->leftJoin('m_tipe_perusahaan as td', 'tb.id_tipe', '=', 'td.id')
        ->leftJoin('m_negara as tc', 'ta.id_negara_tujuan', '=', 'tc.id')
        ->where('ta.id_perusahaan', $id)
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->whereNull('tc.deleted_at')
        ->select('ta.*', 'tb.kode_perusahaan', 'tb.nama_perusahaan', 'tb.detail_produk_utama', 'td.nama_tipe', 'tc.en_short_name', DB::raw('SUM(ta.nilai_transaksi) as summary'))
        ->first();

        $tlain = DB::table('t_lain_perusahaan as ta')
        ->leftJoin('t_lain as tb', 'ta.id_transaksi_lain', '=', 'tb.id')
        ->leftJoin('m_perusahaan as mp', 'ta.id_perusahaan', '=', 'mp.id')
        ->leftJoin('m_tipe_perusahaan as mtp', 'mtp.id', '=', 'mp.id_tipe')
        ->select(DB::raw('DISTINCT ta.* , mp.nama_perusahaan, mtp.nama_tipe, tb.bentuk_layanan'))
        ->where('ta.id_perusahaan', $id)
        ->whereNull('ta.deleted_at')
        ->groupBy('ta.id')
        ->get();

        $inaexport = DB::table('p_peserta_inaexport as ta')
        ->leftJoin('m_perusahaan as mp', 'ta.id_perusahaan', '=', 'mp.id')
        ->leftJoin('m_tipe_perusahaan as mtp', 'mtp.id', '=', 'mp.id_tipe')
        ->select(DB::raw('DISTINCT ta.* , mp.nama_perusahaan, mtp.nama_tipe'))
        ->where('ta.id_perusahaan', $id)
        ->whereNull('ta.deleted_at')
        ->groupBy('ta.id')
        ->get();
        
        $pdf = PDF::loadview('master/m_perusahaan/pdf_layanan',[
            'perusahaan' => $perusahaan,
            'countTotal' => $countTotal,
            'konsultasi' => $konsultasi,
            'inquiry' => $inquiry,
            'bm' => $bm,
            'texport' => $texport,
            'inaexport' => $inaexport,
            'tlain' => $tlain,
        ])->setPaper('A4', 'potrait');
    	return $pdf->stream('LAYANAN/ KOMUNIKASI ECS DENGAN '.$perusahaan->nama_perusahaan.''.!empty($perusahaan->nama_tipe) ? ', ' . $perusahaan->nama_tipe : ''.'.pdf', array("Attachment" => false));
    }

    public function pdf(Request $request) {
        $data = DB::table('m_perusahaan as ta')
        ->leftJoin('m_tipe_perusahaan as tb', 'ta.id_tipe', '=', 'tb.id')
        ->leftJoin('indonesia_provinces as tc', 'ta.id_provinsi', '=', 'tc.code')
        ->leftJoin('indonesia_cities as td', 'ta.id_kabkota', '=', 'td.code')
        ->leftJoin('m_k_produk as tf', 'ta.id_kategori_produk', '=', 'tf.id')
        ->leftJoin('t_sub_kategori_perusahaan as tg', 'tg.id_perusahaan', '=', 'ta.id')
        ->leftJoin('m_sub_kategori as th', 'tg.id_sub_kategori', '=', 'th.id')
        ->leftJoin('m_petugas as ti', 'ta.id_petugas', '=', 'ti.id')
        ->whereNull('ta.deleted_at');
        
        if(isset($request->province_id)) {
            $data->where('ta.id_provinsi', '=' , $request->province_id);
        } 
        if(isset($request->cities_id)) {
            $data->where('ta.id_kabkota', '=' , $request->cities_id);
        } 
        if(isset($request->id_kategori_produk)) {
            $data->where('ta.id_kategori_produk', '=' , $request->id_kategori_produk);
        } 
        if(isset($request->id_sub_kategori)) {
            $data->whereIn('tg.id_sub_kategori', $request->id_sub_kategori);
        } 
        $data->select(DB::raw('ta.*, ti.nama_petugas, tf.nama_kategori_produk, group_concat( th.nama_sub_kategori ) AS sub_kategori, tb.nama_tipe, tc.NAME AS provinsi, td.NAME AS cities'))
        ->groupBy('ta.id')
        ->orderBy('ta.id', 'ASC');
        if(empty($request->cities_id) && empty($request->id_sub_kategori)) {
            $data->limit(10);
        }
        $data->get();

        $data = $data->get();

    	$pdf = PDF::loadview('master/m_perusahaan/pdf',[
            'data' => $data,
        ])->setPaper('A4', 'landscape');
    	return $pdf->stream('Daftar Perusahaan Anggota ECS.pdf', array("Attachment" => false));
    }
    
    public function detail($id)
    {
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
        ->where('ta.id', $id)
        ->first();

        $negara_ekspor = DB::table('t_e_perusahaan as ta')
        ->leftJoin('m_negara as tb', 'ta.id_negara', '=', 'tb.id')
        ->where('id_perusahaan', $data->id)
        ->get();

        $sub_kategori = DB::table('t_sub_kategori_perusahaan as ta')
        ->leftJoin('m_sub_kategori as tb', 'ta.id_sub_kategori', '=', 'tb.id')
        ->where('id_perusahaan', $data->id)
        ->get();

        return view('master/m_perusahaan/detail', [
            'data' => $data,
            'negara_ekspor' => $negara_ekspor,
            'sub_kategori' => $sub_kategori,
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
            'tahun_pendirian' => $request->tahun_pendirian,
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
        if(!empty($request->id_sub_kategori)) {
            foreach($request->id_sub_kategori as $key) {
                TSubKategoriPerusahaan::insert([
                    'id_perusahaan' => $id_perusahaan,
                    'id_sub_kategori' => $key,
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
        ->where('ta.id', $id)
        ->first();

        $negara_ekspor = DB::table('t_e_perusahaan as ta')
        ->leftJoin('m_negara as tb', 'ta.id_negara', '=', 'tb.id')
        ->where('id_perusahaan', $data->id)
        ->get();

        $sub_kategori = DB::table('t_sub_kategori_perusahaan as ta')
        ->leftJoin('m_sub_kategori as tb', 'ta.id_sub_kategori', '=', 'tb.id')
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
            'sub_kategori' => $sub_kategori,
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
            'tahun_pendirian' => $request->tahun_pendirian,
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
        
        $post = TSubKategoriPerusahaan::where('id_perusahaan', $request->id)->delete();
        if(!empty($request->id_sub_kategori)) {
            foreach($request->id_sub_kategori as $key) {
                TSubKategoriPerusahaan::insert([
                    'id_perusahaan' => $id_perusahaan,
                    'id_sub_kategori' => $key,
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
