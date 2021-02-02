<?php

namespace App\Http\Controllers\orang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\Models\Pemasok;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orang.pemasok');
    }

    public function tambahpemasok(){
        return view ('orang.tambahpemasok');
    }

    public function api()
    {
        $Pemasok = Pemasok::all();
        return Datatables::of($Pemasok)

            ->addColumn('action', function ($p) {
                return "
                    <a href='" . route('Orang.pelanggan.edit', $p->id) . "' onclick='edit(" . $p->id . ")' title='Edit Role'><i class='icon-pencil mr-1'></i></a>
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
        $request->validate([
            'nama' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'ccf_1' => 'required',
            'ccf_2' => 'required'
        ]);


        $tmpemasok = new Pemasok();
        $tmpemasok->nama = $request->nama;
        $tmpemasok->telepon = $request->telepon;
        $tmpemasok->email = $request->email;
        $tmpemasok->ccf_1 = $request->ccf_1;
        $tmpemasok->ccf_2 = $request->ccf_2;

        $tmpemasok->save();

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
        Pemasok::destroy($id);
        return response()->json([
            'massage' => 'data berhasil di hapus.'
        ]);
    }
}
