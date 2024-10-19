<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Alert;
use App\Mail\MessageSent;
use App\Models\Perusahaan;
use App\Models\EmailContact;
use App\Models\Berita;
use App\Models\TKonsultasi;
use App\Models\Tinquiry;
use App\Models\PPInquiry;
use App\Models\PPInaexport;
use App\Models\Texport;
use App\Models\TBm;
use App\Models\PPBm;
use App\Models\Topik;
use Carbon\Carbon;
use DB;
use DataTables;
use Mail;

class HomePageController extends Controller
{
    public function index(Request $request)
    {
        $perusahaan = Perusahaan::all()->whereNull('deleted_at')->count();
        $berita = Berita::whereNull('deleted_at')->orderBy('created_at', 'ASC')->take(3)->get();

        // $layanan = TKonsultasi::all()->whereNull('deleted_at')->count();
        $layanan = DB::table('t_konsultasi as ta')
        ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->count();
        
        $topik = DB::table('t_konsultasi as ta')
        ->leftJoin('t_konsultasi_topik as td', 'ta.id', '=', 'td.id_konsultasi')
        ->leftJoin('m_topik as tb', 'td.id_topik', '=', 'tb.id')
        ->select(\DB::raw('count(td.id_topik) as total, tb.nama_topik'))
        ->whereNull('ta.deleted_at')
        ->groupBy('tb.id')
        ->get();

        if ($request->ajax()) {
            return Datatables::of($topik)
            ->addIndexColumn()
            ->make(true);
        }

        $export = DB::table('t_p_export as ta')
        ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
        ->select(\DB::raw('sum(ta.nilai_transaksi) as total'))
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->first();

        $ptiq2 = DB::table('t_profile_inquiry as ta')
        ->leftJoin('m_negara as tb', 'ta.id_negara_asal_inquiry', '=', 'tb.id')
        ->leftJoin('p_penerima_inquiry as tc', 'ta.id', '=', 'tc.id_inquiry')
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->select('ta.*', 'tb.en_short_name', DB::raw("COUNT(ta.id) AS jumlah_inquiry,COUNT(tc.id_perusahaan) AS jumlah_perusahaan"))
        // ->groupBy('tc.id_inquiry')
        ->orderBy('ta.tanggal_inquiry', 'ASC')
        ->first();

        $ptbm2 = DB::table('t_bm as ta')
        ->leftJoin('m_negara as tb', 'ta.id_negara_buyer', '=', 'tb.id')
        ->leftJoin('p_peserta_bm as tc', 'ta.id', '=', 'tc.id_bm')
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->select('ta.*', 'tb.en_short_name', DB::raw("group_concat(tc.id_perusahaan) AS perusahaan, COUNT(tc.id_perusahaan) AS jumlah_perusahaan"))
        // ->groupBy('tc.id_bm')
        ->orderBy('ta.tanggal_bm', 'ASC')
        ->first();

        $bm = TBm::all()->whereNull('deleted_at')->count();
        $ptbm = PPBm::select(DB::raw('COUNT(DISTINCT id_perusahaan) as count_perusahaan'))->whereNull('deleted_at')->first();
        $iq = Tinquiry::all()->whereNull('deleted_at')->count();
        $ptiq = PPInquiry::select(DB::raw('COUNT(DISTINCT id_perusahaan) as count_perusahaan'))->whereNull('deleted_at')->first();
        $ptina = PPInaexport::select(DB::raw('COUNT(DISTINCT id_perusahaan) as count_perusahaan'))->whereNull('deleted_at')->first();
        return view('welcome', compact('perusahaan', 'layanan', 'export', 'bm', 'ptbm', 'iq', 'ptiq', 'ptiq2', 'ptbm2', 'ptina', 'berita')); 
    }

    public function berita() {
        $berita = Berita::whereNull('deleted_at')->orderBy('created_at', 'DESC')->get();
        return view('company_profile/news', compact('berita')); 
    }

    public function berita_detail($id) {
        $berita = Berita::find($id);

        $otherBerita = Berita::where('id', '!=', $id)
        ->whereNull('deleted_at')
        ->limit(3)
        ->get();

        return view('company_profile/news_detail', compact('berita', 'otherBerita')); 
    }

    public function data_topik(Request $request) {

        $topik = DB::table('t_konsultasi as ta')
        ->leftJoin('t_konsultasi_topik as td', 'ta.id', '=', 'td.id_konsultasi')
        ->leftJoin('m_topik as tb', 'td.id_topik', '=', 'tb.id')
        ->select(\DB::raw('count(td.id_topik) as total, tb.nama_topik'))
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->whereNotNull('tb.id')
        ->groupBy('tb.id')
        ->orderBy('tb.id')
        ->get();

        // return DataTables::of($topik)->toJson();
        // $query = DB::table('users');
        
        if ($request->ajax()) {
            return DataTables::of($topik)->addIndexColumn()->toJson();
        }

    }

    public function section2()
    {
        // $data = TKonsultasi::select(\DB::raw('count(*) as total, MONTH(tanggal_konsultasi) as month'))
        // ->whereNull('deleted_at')
        // ->groupByRaw('MONTH(tanggal_konsultasi)')
        // ->get();
        $data = DB::table('t_konsultasi as ta')
        ->leftJoin('m_perusahaan as tb', 'ta.id_perusahaan', '=', 'tb.id')
        ->select(\DB::raw('count(*) as total, MONTH(ta.tanggal_konsultasi) as month'))
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->groupByRaw('MONTH(tanggal_konsultasi)')
        ->get();
        
        $arrData = array();
        for ($i=1; $i <= 12 ; $i++) { 
            $toMonth = str_pad($i,2,0,STR_PAD_LEFT);
            $toMonthName = date('M', strtotime("2024-".$toMonth."-01"));
            
            $row = collect($data)->where('month', $i)->first();
            $arrData[] = array('bulan' => $toMonthName , 'total' => (!empty($row) ? $row->total : 0) ); 
        }
        $label = collect($arrData)->pluck("bulan")->toArray();
        $dataset = collect($arrData)->pluck("total")->toArray();
        return response()->json([
            "label"=> $label,
            "data" => $dataset 
        ]);
    }

    public function section3()
    {
        $data = DB::table('t_konsultasi as ta')
        ->leftJoin('t_konsultasi_topik as td', 'ta.id', '=', 'td.id_konsultasi')
        ->leftJoin('m_topik as tb', 'td.id_topik', '=', 'tb.id')
        ->leftJoin('m_perusahaan as tc', 'ta.id_perusahaan', '=', 'tc.id')
        ->select(\DB::raw('count(td.id_topik) as total, tb.nama_topik'))
        ->whereNull('ta.deleted_at')
        ->whereNull('tb.deleted_at')
        ->whereNull('tc.deleted_at')
        ->groupBy('td.id_topik')
        ->get();

     
        $label = collect($data)->pluck("nama_topik")->toArray();
        $dataset = collect($data)->pluck("total")->toArray();
        return response()->json([
            "label"=> $label,
            "data" => $dataset 
        ]);
    }
    
    public function send(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
    
        // Siapkan data yang akan dikirim
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'header_email' => $request->input('subject'), // Pastikan ini sesuai
            'body_email' => $request->input('message'),
        ];
    
        // Simpan pesan ke database
        EmailContact::create($data);
    
        // Alamat email tujuan
        $recipientEmail = 'arifsyahputra137@gmail.com'; // Ganti dengan alamat email tujuan
    
        // Kirim email
        Mail::send('email.contact', $data, function($message) use ($recipientEmail, $data) {
            $message->to($recipientEmail)
                    ->subject($data['header_email']); // Pastikan ini menggunakan header_email
        });

        Alert::toast('Berhasil Mengirim Pesan!', 'success');
        return redirect()->back();
    }
    public function about()
    {
        return view('company_profile/about');
    }
    public function services()
    {
        return view('company_profile/services');
    }
    public function gallery()
    {
        return view('company_profile/gallery');
    }
    public function news()
    {
        return view('company_profile/news');
    }
    public function contact()
    {
        return view('company_profile/contact');
    }
    public function our_konsultasi()
    {
        return view('company_profile/our-konsultasi');
    }
    public function our_inquiries()
    {
        return view('company_profile/our-inquiries');
    }
    public function our_bm()
    {
        return view('company_profile/our-bm');
    }
    public function our_panduan()
    {
        return view('company_profile/our-panduan');
    }
    public function other_service()
    {
        return view('company_profile/other-service');
    }
    public function our_supplier()
    {
        return view('company_profile/our-supplier');
    }
    public function our_market()
    {
        return view('company_profile/our-market');
    }
    public function other_relasi()
    {
        return view('company_profile/other-relasi');
    }
}
