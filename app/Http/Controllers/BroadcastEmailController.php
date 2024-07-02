<?php

namespace App\Http\Controllers;

use App\Mail\PerusahaanEmail;
use App\Mail\BatchMail;
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
        $attachment = public_path('folder_dok_pendukung/1711940400_img-6.png');

        $dataPT = [
            'nama_perusahaan' => $perusahaan->nama_perusahaan,
            'email' => $perusahaan->email,
            'attachment' => $attachment
        ];

        // dd($data);
        Mail::to($perusahaan->email)->send(new PerusahaanEmail($dataPT));
  
        Alert::toast('Send email successfully!', 'success');
        return redirect()->back();
    }
    
    public function store(Request $request) {
        $perusahaan = Perusahaan::leftJoin('t_sub_kategori_perusahaan as tb', 'm_perusahaan.id', '=', 'tb.id_perusahaan')
        ->whereIn('tb.id_sub_kategori', $request->id_sub_kategori)
        ->get();

        dd($perusahaan);

        $header = $request->header_email;
        $body = $request->body_email;
        foreach ($perusahaan as $user) {
            $this->sendRawEmailTo($user, $header, $body);
        }
        // $arrFile = array();
        // if(!empty($request->files)) {
        //     foreach ($request->file('files') as $file) {
        //         // dd($key);
        //         // $file = $request->file($key);
        //         // dd($file);
        //         $nama_file = time()."_".$file->getClientOriginalName();
        //         $path = public_path().'/file_email/';
        //         $file->move($path, $nama_file);
        //         $name = $nama_file;

        //         $arrFile[] = $path.$nama_file ; 
        //     }
        // }

        // return $arrFile;

        $dataPT = array();
        foreach ($perusahaan as $key) {
            $dataPT[] = array(
                'nama_perusahaan' => $key->nama_perusahaan,
                'email' => $key->email,
                'header_email' => $request->header_email,
                'body_email' => $request->body_email,
                // 'attachment' => $arrFile
            ); 
        }

        dd($dataPT);
        Mail::to(
            collect($dataPT)->pluck('email')->toArray()
        )->send(new BatchMail($dataPT));

        Alert::toast('Send email successfully!', 'success');
        return redirect()->back();
    }

    private function sendRawEmailTo($user, $header, $body, $fromEmail = null, $toEmail = null)
        {
        $from = (isset($fromEmail) && $fromEmail != null) ? $fromEmail : getenv('MAIL_FROM_EMAIL');
        $to = (isset($toEmail) && $toEmail != null) ? $toEmail : $user->email;

        return $this->sendTo($user, $subject, 'email.bulk', ['body' => $body], $from, $to);
    }
}
