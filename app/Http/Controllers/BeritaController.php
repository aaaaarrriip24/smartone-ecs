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
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal_berita' => 'required|string',
            'isi' => 'required|string',
            'gambar' => 'nullable|array',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        // Mengunggah gambar
        $filenames = []; // Array untuk menyimpan nama file gambar
        if ($request->hasFile('gambar')) {
            $images = $request->file('gambar'); // Ambil array gambar
            foreach ($images as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->extension();  
                $image->move(public_path('images'), $imageName); // Pindahkan gambar ke direktori yang sesuai
                $filenames[] = $imageName; // Tambahkan nama file ke array
            }
        }

        // Menyimpan data berita
        Berita::insert([
            'judul' => $request->judul,
            'tanggal_berita' => date('Y-m-d', strtotime($request->tanggal_berita)),
            'isi' => $request->isi,
            'gambar' => json_encode($filenames), // Simpan nama file gambar sebagai JSON
            'id_penulis' => $request->id_penulis, // Simpan id_penulis
            'created_at' => Carbon::now(),
        ]);

        Alert::toast('Success Add Berita!', 'success');
        return redirect()->route('berita');
    }

    public function show($id)
    {
        // Cari berita berdasarkan ID
        $berita = Berita::find($id);

        if (!$berita) {
            return response()->json(['message' => 'Berita tidak ditemukan'], 404);
        }

        // Mengembalikan data berita dengan gambar
        return response()->json([
            'data' => [
                'id' => $berita->id,
                'judul' => $berita->judul,
                'tanggal_berita' => date('Y-m-d', strtotime($berita->tanggal_berita)),
                'isi' => $berita->isi,
                'gambar' => $berita->gambar, // Asumsi kolom 'gambar' berisi string JSON
                'id_penulis' => $berita->id_penulis,
            ]
        ]);
    }

    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal_berita' => 'required|string',
            'isi' => 'required|string',
            'gambar' => 'nullable|array',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        // Cari berita berdasarkan ID
        $berita = Berita::find($request->id);
        if (!$berita) {
            Alert::toast('Berita tidak ditemukan!', 'error');
            return redirect()->route('berita');
        }
        // Update data judul dan isi
        $berita->judul = $request->judul;
        $berita->tanggal_berita = date('Y-m-d', strtotime($request->tanggal_berita));
        $berita->isi = $request->isi;
        $berita->updated_at = Carbon::now();
        
        // Proses gambar jika ada
        if ($request->hasFile('gambar')) {
            $imageNames = [];
            foreach ($request->file('gambar') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->extension();
                $image->move(public_path('images'), $imageName);
                $imageNames[] = $imageName; // Simpan nama file gambar
            }
            $berita->gambar = json_encode($imageNames); // Simpan nama gambar sebagai JSON
        }
        // Simpan perubahan
        $berita->save();

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
