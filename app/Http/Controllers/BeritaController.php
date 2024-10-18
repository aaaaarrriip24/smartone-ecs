<?php

namespace App\Http\Controllers;

use App\Models\Berita; // Ganti dengan model Berita
use App\Models\Petugas; // Ganti dengan model Berita
use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;
use Alert;

class BeritaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $title = 'Delete Berita!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        $get_code = Berita::whereNull('deleted_at')->orderBy('id', 'DESC')->first(); // Mengganti pengambilan kode
        $kode_code = $get_code ? "BR-" . ($get_code->id + 1) : "BR-1000"; // Atur kode berita
        $penulis = Petugas::whereNull('deleted_at')->get();

        if ($request->ajax()) {
            $data = Berita::whereNull('deleted_at')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $url = url('berita/destroy/'. $row->id);
                        $button = '';
                        $button .= " <button type='button' class='btn btn-outline-warning btn-sm btn-edit' value='".$row->id."'>Edit</button>";
                        $button .= " <button type='button' class='btn btn-outline-primary btn-sm btn-detail' value='".$row->id."'>Detail</button>";
                        $button .= " <button data-href='".$url."' class='btn btn-outline-danger btn-sm btn-delete'>Delete</button>";
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('master/berita/view', compact('kode_code','penulis')); // Ganti view sesuai dengan berita
    }

    public function store(Request $request)
    {
        // Mengunggah gambar
        if ($request->hasFile('gambar')) {
            $imageName = time().'.'.$request->gambar->extension();  
            $request->gambar->move(public_path('images'), $imageName); // Pindahkan gambar ke direktori yang sesuai
        }

        // Menyimpan data berita
        Berita::insert([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $imageName, // Simpan nama file gambar
            'id_penulis' => $request->id_penulis, // Simpan id_penulis
            'created_at' => Carbon::now(),
        ]);

        Alert::toast('Success Add Berita!', 'success');
        return redirect()->route('berita');
    }

    public function show($id)
    {
        $data = Berita::findOrFail($id);
        return response()->json([
            "status" => 200,
            "data" => $data
        ]);
    }

    public function update(Request $request)
    {
        Berita::where('id', $request->id)
        ->update([
            'judul' => $request->judul, // Mengganti sesuai kolom yang relevan
            'isi' => $request->isi, // Mengganti sesuai kolom yang relevan
            'updated_at' => Carbon::now(),
        ]);
        Alert::toast('Success Edit Berita!', 'success');
        return redirect()->route('berita'); // Pastikan ada rute yang sesuai
    }

    public function destroy($id)
    {
        Berita::find($id)->delete();
        return response()->json([
            "status" => 200, 
        ]);
    }
}
