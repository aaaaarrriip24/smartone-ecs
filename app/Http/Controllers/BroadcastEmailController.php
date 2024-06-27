<?php

namespace App\Http\Controllers;

use App\Mail\PerusahaanEmail;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DataTables;
use DB;
use Alert;
use Mail;

class BroadcastEmailController extends Controller
{
    public function email_index(Request $request) {
        $title = 'Delete Perusahaan!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        if ($request->ajax()) {
            $data = DB::table('m_perusahaan as ta')
            ->leftJoin('m_tipe_perusahaan as tb', 'ta.id_tipe', '=', 'tb.id')
            ->leftJoin('indonesia_provinces as tc', 'ta.id_provinsi', '=', 'tc.code')
            ->leftJoin('indonesia_cities as td', 'ta.id_kabkota', '=', 'td.code')
            ->leftJoin('m_petugas as tf', 'ta.id_petugas', '=', 'tf.id')
            ->leftJoin('t_sub_kategori_perusahaan as tg', 'tg.id_perusahaan', '=', 'ta.id')
            ->leftJoin('m_sub_kategori as th', 'tg.id_sub_kategori', '=', 'th.id')
            ->whereNull('ta.deleted_at')
            ->whereNull('tb.deleted_at')
            ->whereNull('tc.deleted_at')
            ->whereNull('td.deleted_at')
            ->whereNull('tf.deleted_at')
            ->select(DB::raw('group_concat(th.nama_sub_kategori) as sub_kategori, ta.*, tb.nama_tipe, tc.name as provinsi, td.name as cities, tf.nama_petugas'))
            ->groupBy('tg.id_perusahaan', 'ta.id')
            ->orderBy('ta.id', 'ASC')
            ->get();
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('checkbox', function($row){
                        $btncheckbox = '<input type="checkbox" class="perusahaan-checkbox" name="email_perusahaan[]" value='.$row->id.'>';
                        return $btncheckbox;
                    })
                    ->addColumn('action', function($row){
                        $urlSendEmail = url('broadcast/send_email/'. $row->id);
                        $button = '<a href='.$urlSendEmail.' class="btn btn-sm btn-success">Send Email</a>';
                        return $button;
                    })
                    ->rawColumns(['action', 'checkbox'])
                    ->make(true);
        }
        
        return view('transaksi/broadcast/email');
    }

    public function sendEmail(Request $request)
    {
        $perusahaans = Perusahaan::whereIn("id", $request->ids)->get();
  
        foreach ($perusahaans as $key => $perusahaan) {
            Mail::to($perusahaan->email)->send(new PerusahaanEmail($perusahaan));
        }
  
        return response()->json(['success'=>'Send email successfully.']);
    }

    public function sendEmailId(Request $request)
    {
        $perusahaan = Perusahaan::where("id", $request->id)->first();
        Mail::to($perusahaan->email)->send(new PerusahaanEmail($perusahaan));
  
        Alert::toast('Send email successfully!', 'success');
        return redirect()->back();
    }
}
