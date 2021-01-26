<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Rincian_produk;
use DataTables;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Transaksi = Transaksi::all();
        $Rincian_produk = Rincian_produk::all();
        return view('transaksi.transaksi', compact(
            'Transaksi',
            'Rincian_produk'
        ));
    }

    public function api(){
        $Transaksi = Transaksi::all();
        return Datatables::of($Transaksi)

            ->addColumn('action', function ($p) {
                return "
                    <a href='#' onclick='edit(" . $p->id . ")' title='Edit Role'><i class='icon-pencil mr-1'></i></a>
                    <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus Role'><i class='icon-remove'></i></a>";
            })

            ->editColumn('nama_rincian', function($p)
            {
                return $p->Rincian_produk->rincian_produk;
            })
            ->addIndexColumn()
            ->rawColumns(['action',])

            ->toJson();
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'id_rincian_produk' => 'required',
            'nama_rincian'  => 'required',
            'qty'  => 'required',
            'harga'  => 'required',
            'total'  => 'required',
            'diskon'  => 'required',
            'id_operator'  => 'required',
            'nama_operator'  => 'required',
            'tanggal_transaksi'  => 'date',
            'jenis_komsumen' => 'required',
        ]);
        $input = $request->all();
        Transaksi::create($input);
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Transaksi::find($id);
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
            'id_rincian_produk' => 'required',
            'nama_rincian'  => 'required',
            'qty'  => 'required',
            'harga'  => 'required',
            'total'  => 'required',
            'diskon'  => 'required',
            'id_operator'  => 'required',
            'nama_operator'  => 'required',
            'tanggal_transaksi'  => 'date',
            'jenis_komsumen'  => 'required',
        ]);
        $input = $request->all();
        $Transaksi= Transaksi::findOrfail($id);

        $Transaksi->update($input);
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
        Transaksi::destroy($id);
        return response()->json([
            'massage' => 'data berhasil di hapus.'
        ]);
    }
}
