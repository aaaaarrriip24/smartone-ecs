<?php

namespace App\Http\Controllers;

use App\Models\Artikel; // Ganti dengan model Artikel
use App\Models\Petugas; // Tetap sama karena masih menggunakan Petugas
use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;
use Alert;

class ArtikelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $title = 'Delete Artikel!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        $get_code = Artikel::whereNull('deleted_at')->orderBy('id', 'DESC')->first();
        $kode_code = $get_code ? "AR-" . ($get_code->id + 1) : "AR-1000";
        $penulis = Petugas::whereNull('deleted_at')->get();

        if ($request->ajax()) {
            $data = Artikel::whereNull('deleted_at')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $url = url('artikel/destroy/'. $row->id);
                        $button = '';
                        $button .= " <button type='button' class='btn btn-outline-warning btn-sm btn-edit' value='".$row->id."'>Edit</button>";
                        $button .= " <button type='button' class='btn btn-outline-primary btn-sm btn-detail' value='".$row->id."'>Detail</button>";
                        $button .= " <button data-href='".$url."' class='btn btn-outline-danger btn-sm btn-delete'>Delete</button>";
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('master/artikel/view', compact('kode_code','penulis'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|array',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Mengunggah gambar
        $filenames = [];
        if ($request->hasFile('gambar')) {
            $images = $request->file('gambar');
            foreach ($images as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->extension();  
                $image->move(public_path('images'), $imageName);
                $filenames[] = $imageName;
            }
        }

        // Menyimpan data artikel
        Artikel::insert([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => json_encode($filenames),
            'id_penulis' => $request->id_penulis,
            'created_at' => Carbon::now(),
        ]);

        Alert::toast('Success Add Artikel!', 'success');
        return redirect()->route('artikel');
    }

    public function show($id)
    {
        // Cari artikel berdasarkan ID
        $artikel = Artikel::find($id);

        if (!$artikel) {
            return response()->json(['message' => 'Artikel tidak ditemukan'], 404);
        }

        // Mengembalikan data artikel dengan gambar
        return response()->json([
            'data' => [
                'id' => $artikel->id,
                'judul' => $artikel->judul,
                'deskripsi' => $artikel->deskripsi,
                'gambar' => $artikel->gambar,
                'id_penulis' => $artikel->id_penulis,
            ]
        ]);
    }

    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|array',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Cari artikel berdasarkan ID
        $artikel = Artikel::find($request->id);
        if (!$artikel) {
            Alert::toast('Artikel tidak ditemukan!', 'error');
            return redirect()->route('artikel');
        }

        // Update data judul dan deskripsi
        $artikel->judul = $request->judul;
        $artikel->deskripsi = $request->deskripsi;
        $artikel->updated_at = Carbon::now();

        // Proses gambar jika ada
        if ($request->hasFile('gambar')) {
            $imageNames = [];
            foreach ($request->file('gambar') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->extension();
                $image->move(public_path('images'), $imageName);
                $imageNames[] = $imageName;
            }
            $artikel->gambar = json_encode($imageNames);
        }

        // Simpan perubahan
        $artikel->save();

        Alert::toast('Success Edit Artikel!', 'success');
        return redirect()->route('artikel');
    }

    public function destroy($id)
    {
        Artikel::find($id)->delete();
        return response()->json([
            "status" => 200, 
        ]);
    }
}
