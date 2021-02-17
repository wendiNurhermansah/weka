<?php

namespace App\Http\Controllers\pembelian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\Models\Biaya;

class BiayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pembelian.biaya');
    }

    public function tambahbiaya(){
        return view('pembelian.tambahbiaya');
    }

    public function api()
    {
        $Biaya = Biaya::all();
        return Datatables::of($Biaya)

            ->addColumn('action', function ($p) {
                return "
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
