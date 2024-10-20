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

class LaporanController extends Controller
{
    
    public function perusahaan(Request $request) {
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
            if(isset($request->searchbox)) {
                $data->where('ta.nama_perusahaan', 'LIKE', '%'. $request->searchbox. '%');
            }
            if($request->term) {
                $data->where('nama_sub_kategori', 'LIKE', '%'. $request->term. '%');
            }
            
            $data->select(DB::raw('ta.*, tf.nama_kategori_produk, group_concat( th.nama_sub_kategori ) AS sub_kategori, tb.nama_tipe, tc.NAME AS provinsi, td.NAME AS cities'))
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
                        $urlDetailLayanan = url('perusahaan/detail/layanan/'. $row->id);
                        $button = '<div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href='.$urlDetailLayanan.' class="dropdown-item btn-detail" target="_blank">Detail Layanan</a></li>
                                        </ul>
                                    </div>';
                        return $button;
                    })
                    ->rawColumns(['action', 'status_data'])
                    ->make(true);
        }

        return view('laporan/perusahaan');
    }
    public function konsultasi(Request $request) {
        $title = 'Delete Konsultasi!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        if ($request->ajax()) {
            $data = DB::table('t_konsultasi as ta')
            ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
            ->leftJoin('m_tipe_perusahaan as te', 'tb.id_tipe', '=', 'te.id')
            ->leftJoin('t_konsultasi_topik as tf', 'ta.id', '=', 'tf.id_konsultasi')
            ->leftJoin('m_topik as tc', 'tf.id_topik', '=', 'tc.id')
            ->leftJoin('m_petugas as td', 'ta.id_petugas', '=', 'td.id')
            ->whereNull('ta.deleted_at')
            ->whereNull('tb.deleted_at')
            ->whereNull('tc.deleted_at')
            ->whereNull('td.deleted_at')
            ->where('ta.tanggal_konsultasi', '>=' , date('Y-m-d', strtotime($request->tglawal)))
            ->where('ta.tanggal_konsultasi', '<=' , date('Y-m-d', strtotime($request->tglakhir)))
            ->select('ta.*', 'tb.nama_perusahaan', DB::raw('IFNULL(te.nama_tipe, "") as nama_tipe'), 'tb.kode_perusahaan', DB::raw("GROUP_CONCAT( tc.nama_topik SEPARATOR ', ' ) AS nama_topik"), 'td.nama_petugas' )
            ->groupBy('ta.id')
            ->get();

            return Datatables::of($data)
            ->addIndexColumn()
            ->make(true);
        }

        return view('laporan/konsultasi');
    }

    public function bm(Request $request) {
        $title = 'Delete Business Matching!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        if ($request->ajax()) {
            if(isset($request->tglawal) && isset($request->tglakhir)) {
                $data = DB::table('t_bm as ta')
                ->leftJoin('m_negara as tb', 'ta.id_negara_buyer', '=', 'tb.id')
                ->leftJoin('p_peserta_bm as tc', 'ta.id', '=', 'tc.id_bm')
                ->whereNull('ta.deleted_at')
                ->whereNull('tb.deleted_at')
                ->where('ta.tanggal_bm', '>=' , date('Y-m-d', strtotime($request->tglawal)))
                ->where('ta.tanggal_bm', '<=' , date('Y-m-d', strtotime($request->tglakhir)))
                ->select('ta.*', 'tb.en_short_name', DB::raw("group_concat(tc.id_perusahaan) AS perusahaan, COUNT(tc.id_perusahaan) AS jumlah_perusahaan"))
                ->groupBy('tc.id_bm')
                ->orderBy('ta.tanggal_bm')
                ->get();
            } else {
                $data = DB::table('t_bm as ta')
                ->leftJoin('m_negara as tb', 'ta.id_negara_buyer', '=', 'tb.id')
                ->leftJoin('p_peserta_bm as tc', 'ta.id', '=', 'tc.id_bm')
                ->whereNull('ta.deleted_at')
                ->whereNull('tb.deleted_at')
                ->select('ta.*', 'tb.en_short_name', DB::raw("group_concat(tc.id_perusahaan) AS perusahaan, COUNT(tc.id_perusahaan) AS jumlah_perusahaan"))
                ->groupBy('tc.id_bm')
                ->orderBy('ta.tanggal_bm')
                ->get();
            }
            
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('total_perusahaan', function($row){
                $perusahaan = Perusahaan::whereNull('deleted_at')->count();
                return $perusahaan;
            })
            ->rawColumns(['total_perusahaan'])
            ->make(true);
        }

        return view('laporan/bm');
    }

    public function inquiry(Request $request) {
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
            ->addColumn('total_inquiry', function($row){
                $inquiry = Tinquiry::whereNull('deleted_at')->count();
                return $inquiry;
            })
            ->rawColumns(['penerima_inquiry'])
            ->make(true);
        }

        return view('laporan/inquiry');
    }

    public function export(Request $request) {
        $title = 'Delete Export!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        if ($request->ajax()) {
            $data = DB::table('t_p_export as ta')
            ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
            ->leftJoin('m_tipe_perusahaan as td', 'tb.id_tipe', '=', 'td.id')
            ->leftJoin('m_negara as tc', 'ta.id_negara_tujuan', '=', 'tc.id')
            ->whereNull('ta.deleted_at')
            ->whereNull('tb.deleted_at')
            ->whereNull('tc.deleted_at')
            ->where('ta.tanggal_lapor', '>=' , $request->tglawal)
            ->where('ta.tanggal_lapor', '<=' , $request->tglakhir)
            ->select('ta.*', 'tb.kode_perusahaan', 'tb.nama_perusahaan', 'tb.detail_produk_utama', 'td.nama_tipe', 'tc.en_short_name')
            ->get();

            return Datatables::of($data)
            ->addIndexColumn()
            ->make(true);
        }

        return view('laporan/export');
    }

    public function ina_export(Request $request) {
        $title = 'Delete Peserta Inaexport!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        if ($request->ajax()) {
            $data = DB::table('p_peserta_inaexport as ta')
            ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
            ->leftJoin('m_petugas as tc', 'ta.id_petugas', '=', 'tc.id')
            ->leftJoin('m_tipe_perusahaan as td', 'tb.id_tipe', '=', 'td.id')
            ->whereNull('ta.deleted_at')
            ->whereNull('tb.deleted_at')
            ->whereNull('tc.deleted_at')
            ->where('ta.tanggal_registrasi_inaexport', '>=' , date('Y-m-d', strtotime($request->tglawal)))
            ->where('ta.tanggal_registrasi_inaexport', '<=' , date('Y-m-d', strtotime($request->tglakhir)))
            ->select('ta.*', 'tb.kode_perusahaan', 'tb.nama_perusahaan', 'tb.detail_produk_utama', 'td.nama_tipe', 'tc.nama_petugas')
            ->orderBy('ta.tanggal_registrasi_inaexport')
            ->get();

            return Datatables::of($data)
            ->addIndexColumn()
            ->make(true);
        }
        
        return view('laporan/ina_export');
    }

    public function partisipasi(Request $request) {
        $title = 'Delete Perusahaan!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        if ($request->ajax()) {
            $data = DB::table('t_partisipasi as ta')
            ->leftJoin('t_partisipasi_perusahaan as tb', 'ta.id', '=', 'tb.id_partisipasi')
            ->leftJoin('m_perusahaan as tc', 'tc.id', '=', 'tb.id_perusahaan')
            ->leftJoin('m_tipe_perusahaan as td', 'td.id', '=', 'tc.id_tipe')
            ->whereNull('ta.deleted_at')
            ;
            
            if(isset($request->id_perusahaan)) {
                $data->where('tb.id_perusahaan', '=' , $request->id_perusahaan);
            }
            if(isset($request->tglawal)) {
                $data->where('ta.tgl_partisipasi', '>=' , date('Y-m-d', strtotime($request->tglawal)));
            } 
            if(isset($request->tglakhir)) {
                $data->where('ta.tgl_partisipasi', '<=' , date('Y-m-d', strtotime($request->tglakhir)));
            } 
            
            $data->select(DB::raw('group_concat( tc.nama_perusahaan ) as perusahaan, ta.*'))
            ->groupBy('ta.id')
            ->orderBy('ta.id', 'ASC')
            ->get();

            $data = $data->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->make(true);
        }
        
        return view('laporan/partisipasi');
    }

    public function lain(Request $request)
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
            ->make(true);
        }
        return view('laporan/lain');
    }
}
