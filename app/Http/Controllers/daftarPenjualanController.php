<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
// use App\Models\daftarPenjualan;
use App\Models\TransaksiPelanggan;
use Illuminate\Http\Request;
use DataTables;

class daftarPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function api()
    {
        $TransaksiPelanggan = TransaksiPelanggan::orderBy('id');
        return DataTables::of($TransaksiPelanggan)

            ->addColumn('action', function ($p) {
                return "
                    <a href='#' onclick='show(" . $p->id . ")' class='text-danger' title='lihat'><i class='icon-image'></i></a>
                    <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus data'><i class='icon-remove'></i></a>";
            })
            ->editColumn('gambar',  function ($p)  {
                if ($p->gambar != null) {
                    return "<img width='50' class='img-fluid mx-auto d-block rounded-circle' alt='foto' src='" . config('app.sftp_src').'images/' . $p->gambar . "'>";
                } else {
                    return "<img width='50' class='rounded img-fluid mx-auto d-block' alt='foto' src='" . asset('images/404.png') . "'>";
                }
            })

            ->addColumn('grand_total', function ($p) {
                $grand_total = $p->total + $p->pajak - $p->diskon;
                return $grand_total;
            })

            ->editColumn('status', function ($p) {
                if ($p->dibayar == $p->total + $p->pajak - $p->diskon) {
                   return $p ='LUNAS';}
                else {return $p  = 'HUTANG';}
            })

            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }

    public function index()
    {
        $TransaksiPelanggan = TransaksiPelanggan::all();
        // $daftarPenjualan = daftarPenjualan::all();
        return view('penjualan.daftarPenjualan');

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
     * @param  \App\daftarPenjualan  $daftarPenjualan
     * @return \Illuminate\Http\Response
     */
    public function show(daftarPenjualan $daftarPenjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\daftarPenjualan  $daftarPenjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(daftarPenjualan $daftarPenjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\daftarPenjualan  $daftarPenjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, daftarPenjualan $daftarPenjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\daftarPenjualan  $daftarPenjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(daftarPenjualan $daftarPenjualan)
    {
        //
    }
}
