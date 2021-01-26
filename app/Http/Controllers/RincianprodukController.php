<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Rincian_produk;
use App\Models\JenisProduk;

class RincianprodukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $JenisProduk = JenisProduk::all();
        $Rincian_produk = Rincian_produk::all();
        return view('transaksi.rincian', compact(
            'JenisProduk',
            'Rincian_produk'
        ));
    }

    public function api(){
        $JenisProduk = JenisProduk::all();
        $Rincian_produk = Rincian_produk::all();
        return Datatables::of($Rincian_produk)

            ->addColumn('action', function ($p) {
                return "
                    <a href='#' onclick='edit(" . $p->id . ")' title='Edit Role'><i class='icon-pencil mr-1'></i></a>
                    <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus Role'><i class='icon-remove'></i></a>";
            })
            ->editColumn('id_jenis_produk', function($p)
            {
                return $p->JenisProduk->jenis_produk;
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
        $request->validate([
            'id_jenis_produk' => 'required',
            'rincian_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required',

        ]);
        $input = $request->all();
        Rincian_produk::create($input);
        return response()->json([
            'message' => 'Data berhasil tersimpan.'
        ]);
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
        return Rincian_produk::find($id);
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
        $request->validate([
            'id_jenis_produk' => 'required',
            'rincian_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required',

        ]);
        $input = $request->all();
        $Rincian_produk = Rincian_produk::findOrfail($id);
        $Rincian_produk::update($input);
        return response()->json([
            'message' => 'Data berhasil tersimpan.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rincian_produk::destroy($id);
        return response()->json([
            'massage' => 'Data berhasil di hapus.'
        ]);
    }
}
