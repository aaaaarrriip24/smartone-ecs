<?php

namespace App\Http\Controllers;

use App\Mail\PerusahaanEmail;
use App\Models\AttachmentModel;
use App\Models\DraftModel;
use App\Models\TemplateModel;
use App\Models\TEmailModel;
use App\Mail\BatchMail;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use \stdClass;
use DataTables;
use DB;
use Alert;
use Mail;
use File;

class BroadcastEmailController extends Controller
{
    public function email_index(Request $request) {
        $title = 'Hapus Draft!';
        $text = "Apakah Anda yakin ingin menghapus?";
        confirmDelete($title, $text);

        if ($request->ajax()) {
            $data = DB::table('m_draft as ta')
            ->leftJoin('m_template as tb', 'ta.id_template', '=', 'tb.id')
            ->leftJoin('m_attachment as tc', 'ta.id_template', '=', 'tc.id_template')
            ->leftJoin('m_perusahaan as td', 'ta.id_perusahaan', '=', 'td.id')
            ->leftJoin('m_tipe_perusahaan as te', 'te.id', '=', 'td.id_tipe')
            ->whereNull('ta.deleted_at')
            ->whereNull('tb.deleted_at')
            ->whereNull('tc.deleted_at')
            ->select(DB::raw('ta.*, tb.id as id_template, tb.subject_email, tb.body_email, td.nama_perusahaan, te.nama_tipe, td.email, GROUP_CONCAT(tc.file) as File'))
            ->groupBy('ta.id_template')
            ->orderBy('ta.id_template', 'ASC')
            ->get();
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $urlEdit = url('broadcast/edit/'. $row->id_template);
                        $urlDetail = url('broadcast/detail/'. $row->id_template);
                        $urlDelete = url('broadcast/destroy/'. $row->id_template);
                        $urlSend = url('broadcast/send');
                        $button = '<div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href='.$urlDetail.' class="dropdown-item btn-detail">Detail</a></li>
                                            <li><a data-href='.$urlDelete.' class="dropdown-item btn-delete">Delete</a></li>
                                            <li><a data-href='.$urlSend.' data-id='.$row->id_template.' class="dropdown-item btn-send">Send</a></li>
                                        </ul>
                                    </div>
                        ';
                        // <li><a href='.$urlEdit.' class="dropdown-item btn-edit">Edit</a></li>
                        // <li><a href="#" class="dropdown-item btn-penerima">Penerima</a></li>
                        // <li><a href='.$urlSendEmail.' class="btn btn-sm btn-success">Send Email</a></li>
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('transaksi/broadcast/email');
    }

    public function create() {
        return view('transaksi/broadcast/add');
    }
    
    public function store(Request $request) {
        $perusahaan = Perusahaan::leftJoin('t_sub_kategori_perusahaan as tb', 'm_perusahaan.id', '=', 'tb.id_perusahaan')
        ->whereIn('tb.id_sub_kategori', $request->id_sub_kategori)
        ->get();

        // dd($perusahaan);

        $header = $request->header_email;
        $body = $request->body_email;
        $arrFile = array();
        if(!empty($request->files)) {
            foreach ($request->file('files') as $file) {
                // dd($key);
                // $file = $request->file($key);
                // dd($file);
                $nama_file = time()."_".$file->getClientOriginalName();
                $path = public_path().'/file_email/';
                $file->move($path, $nama_file);
                $name = $nama_file;

                $arrFile[] = $path.$nama_file ; 
            }
        }

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

        // dd($dataPT);
        Mail::to(
            collect($dataPT)->pluck('email')->toArray()
        )->send(new BatchMail($dataPT));

        Alert::toast('Send email successfully!', 'success');
        return redirect()->route('broadcast');
    }

    public function sendDraft(Request $request) {
        $id_template = $request->id_template;
        $template = TemplateModel::find($id_template);
        $draft = DraftModel::where('id_template', $id_template)->get();
        $fileAttach = AttachmentModel::where('id_template', $id_template)->get();

        $arrFile = array();
        $path = public_path().'/file_email/';

        if(!empty($fileAttach)) {
            foreach($fileAttach as $f) {
                $arrFile[] = $path.$f->file ; 
            }
        } else {
            $arrFile[] = [0];
        }
        
        foreach($draft as $d) {
            $PT = Perusahaan::find($d->id_perusahaan);

            $dataPT = new stdClass();
            $dataPT->nama_perusahaan = $PT->nama_perusahaan;
            $dataPT->email = $d->email;
            $dataPT->header_email = $template->subject_email;
            $dataPT->body_email = strip_tags($template->body_email);
            $dataPT->attachment = $arrFile;

            Mail::to($d->email)->send(new BatchMail($dataPT, function($message) use ($dataPT, $arrFile) {
                // if(!empty($arrFile)) {
                    foreach ($arrFile as $file){
                        $message->attach($file);
                    }
                // }
            }));
        }

        Alert::toast('Draft Sended successfully!', 'success');
        return redirect()->route('broadcast'); 
    }

    public function draftEmail(Request $request) {
        
        $test = $request->test;
        $template = TemplateModel::insert([
            'subject_email' => $request->subject_email,
            'body_email' => $request->body_email,
            'created_at' => Carbon::now()
        ]);
        $id_template = DB::getPdo()->lastInsertId();
        
        $arrFile = array();
        $files = $request->file('sfiles');
        // return $request->all();
        if(!empty($files)) {
            foreach ($request->file('sfiles') as $file) {
                $nama_file = time()."_".$file->getClientOriginalName();
                $path = public_path().'/file_email/';
                $file->move($path, $nama_file);
                $name = $nama_file;
                $arrFile[] = $path.$nama_file ; 
                
                $attch = AttachmentModel::insert([
                    'id_template' => $id_template,
                    'file' => $name,
                    'created_at' => Carbon::now()
                ]);
            }
        }

        foreach($test as $d) {
            $d = (object)$d;
            $draft = DraftModel::insert([
                'id_template' => $id_template,
                'id_sub_kategori' => $d->id_sub_kategori,
                'id_perusahaan' => $d->id_perusahaan,
                'email' => $d->email,
                'flag_status' => 1,
                'send_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ]);
            
            $dataPT = new stdClass();
            $dataPT->nama_perusahaan = $d->nama_perusahaan;
            $dataPT->email = $d->email;
            $dataPT->header_email = $request->header_email;
            $dataPT->body_email = strip_tags($request->body_email);
            $dataPT->attachment = $arrFile;

            Mail::to($d->email)->send(new BatchMail($dataPT, function($message) use ($dataPT, $arrFile) {
                foreach ($arrFile as $file){
                    $message->attach($file);
                }
            }));
        }

        Alert::toast('Draft Created & Send email successfully!', 'success');
        return redirect()->route('broadcast'); 
    }

    public function sendBulk(Request $request) {
        $perusahaan = Perusahaan::leftJoin('t_sub_kategori_perusahaan as tb', 'm_perusahaan.id', '=', 'tb.id_perusahaan')
        ->whereIn('tb.id_sub_kategori', $request->id_sub_kategori)
        ->get();

        // dd($perusahaan);
        $arrFile = array();
        $files = $request->file('files');
        if(!empty($files)) {
            foreach ($request->file('files') as $file) {
                $nama_file = time()."_".$file->getClientOriginalName();
                $path = public_path().'/file_email/';
                $file->move($path, $nama_file);
                $name = $nama_file;
                $arrFile[] = $path.$nama_file ; 
            }
        }
        // dd($arrFile);
        
        $dataPT = new stdClass();
        foreach ($perusahaan as $pt) {
            $dataPT->nama_perusahaan = $pt->nama_perusahaan;
            $dataPT->email = $pt->email;
            $dataPT->header_email = $request->header_email;
            $dataPT->body_email = strip_tags($request->body_email);
            $dataPT->attachment = $arrFile;

            // $dataPT[] = array(
            //     'nama_perusahaan' => $pt->nama_perusahaan,
            //     'email' => $pt->email,
            //     'header_email' => $request->header_email,
            //     'body_email' => strip_tags($request->body_email),
            //     'attachment' => $arrFile
            // );
            
            // dd($dataPT);
            Mail::to($pt->email)->send(new BatchMail($dataPT, function($message) use ($data, $arrFile) {
                foreach ($arrFile as $file){
                    $message->attach($file);
                }
            }));
        }
        Alert::toast('Send email successfully!', 'success');
        return redirect()->route('broadcast');
    }

    public function show(Request $request) {

    }

    public function destroy($id) {
        $post = TemplateModel::find($id);
        $post2 = AttachmentModel::where('id_template', $id)->get();

        $path = public_path().'/file_email/';
        foreach ($post2 as $key) {
            if (File::exists($path.$key->file)) {
                File::delete($path.$key->file);
            }
            $key->delete();
        }

        $post3 = DraftModel::where('id_template', $id)->get();
        foreach ($post3 as $key2) {
            $key2->delete();
        }
        
        $post->delete();
        return response()->json([
            "status"=>200, 
        ]);        
    }
}
