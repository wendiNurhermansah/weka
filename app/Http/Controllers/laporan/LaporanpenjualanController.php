<?php

namespace App\Http\Controllers\laporan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\TransaksiPelanggan;
use DataTables;

class LaporanpenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $pelanggan = Pelanggan::select('id', 'nama')->get();
        $total = TransaksiPelanggan::sum('total');
        $pajak = TransaksiPelanggan::sum('pajak');
        $diskon = TransaksiPelanggan::sum('diskon');

        // dd($pelanggan);


        return view('laporan.laporanPenjualan', compact('total', 'pajak', 'diskon', 'pelanggan'));
    }


    public function api()
    {
        $TransaksiPelanggan = TransaksiPelanggan::all();
        return Datatables::of($TransaksiPelanggan)

             ->addColumn('grandTotal', function($p){
                return $p->grandTotal;
            })

            ->editColumn('grandTotal', function($p){
                return $p->total+$p->pajak-$p->diskon;
            })

            ->editColumn('pelanggan_id', function($p){
                return $p->Pelanggan->nama;
            })

            ->addColumn('status', function($p){
                if ($p->dibayar == $p->total + $p->pajak - $p->diskon) {
                    return $p ='dibayar';
                }
                 else {return $p  ='belum dibayar';}
            })



            ->addIndexColumn()
            ->rawColumns(['grandTotal', 'dibayar', 'pelanggan_id', 'status'])
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
        //
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
        //
    }
}
