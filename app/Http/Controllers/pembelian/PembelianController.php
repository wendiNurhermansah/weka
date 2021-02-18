<?php

namespace App\Http\Controllers\pembelian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\Models\Pembelian;
use App\Models\Kategori;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pembelian.pembelian');
    }



    public function tambahPembelian(){
        return view ('pembelian.tambahPembelian');
    }

    public function produk(Request $request)
    {
        $search = $request->search;

        if($search == ''){
           $kategori = Kategori::orderby('nama','asc')
                        ->select('nama')
                        ->limit(5)
                        ->get();
        }else{
           $kategori = Kategori::orderby('nama','asc')
                        ->select('nama')
                        ->where('nama', 'like', '%' .$search . '%')
                        ->limit(5)
                        ->get();
        }

        $response = array();
        foreach($kategori as $k){
           $response[] = array("label"=>$k->nama);
        }

        return response()->json($response);
    }

    public function api()
    {
        $Pembelian = Pembelian::all();
        return Datatables::of($Pembelian)

            ->addColumn('action', function ($p) {
                return "
                    <a href='#' onclick='list(" . $p->id . ")' class='text-success' title='Show data'><i class='icon-list'></i></a>
                    <a href='" . route('Pembelian.pembelian.edit', $p->id) . "' onclick='edit(" . $p->id . ")' title='Edit Role'><i class='icon-pencil mr-1'></i></a>
                    <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus data'><i class='icon-remove'></i></a>";
            })




            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Pembelian = Pembelian::findOrfail($id);
        return view('pembelian.editPembelian', compact('Pembelian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pembelian::destroy($id);
        return response()->json([
            'message' => 'Data berhasil di hapus.'
        ]);
    }
}
