<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Delete Petugas!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        if ($request->ajax()) {
            $data = Petugas::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $url = url('petugas/destroy/'. $row->id);
                        $updateButton = "<button type='button' class='btn btn-outline-warning btn-sm btn-edit' value='".$row->id."'>Edit</button>";
                        $detailButton = "<button type='button' class='btn btn-outline-primary btn-sm btn-detail' value='".$row->id."'>Detail</button>";
                        $deleteButton = " <a href='".$url."' class='btn btn-outline-danger btn-sm' data-confirm-delete='true'>Delete</a>";
                        return $updateButton." ".$detailButton." ".$deleteButton;
                    })
                    ->setRowId('id')
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('master/petugas/view');
    }

    public function getDataTableData(){
        $employees = Employees::select('*');

        return Datatables::of($employees)
           ->addIndexColumn()
           ->addColumn('status', function($row){

                if($row->status == 1){
                     return "Active";
                }else{
                     return "Inactive";
                }

           }) 
           ->addColumn('action', function($row){

                // Update Button
                $updateButton = "<button class='btn btn-sm btn-info updateUser' data-id='".$row->id."' data-bs-toggle='modal' data-bs-target='#updateModal' ><i class='fa-solid fa-pen-to-square'></i></button>";

                // Delete Button
                $deleteButton = "<button class='btn btn-sm btn-danger deleteUser' data-id='".$row->id."'><i class='fa-solid fa-trash'></i></button>";

                return $updateButton." ".$deleteButton;

           }) 
           ->make();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Petugas::insert([
            'nama_petugas' => $request->nama_petugas,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Petugas::findOrFail($id);
        return response()->json([
            "status"=>200,
            "data"=>$data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function edit(Petugas $petugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Petugas::where('id', $request->id)
        ->update([
            'nama_petugas' => $request->nama_petugas,
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Petugas::find($id);
        $data->delete();
        return redirect()->back();
    }
}
