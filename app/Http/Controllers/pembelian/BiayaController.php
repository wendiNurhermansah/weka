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
                     <a href='" . route('Pembelian.biaya.edit', $p->id) . "' onclick='edit(" . $p->id . ")' title='Edit Role'><i class='icon-pencil mr-1'></i></a>
                    <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus data'><i class='icon-remove'></i></a>";
            })
            ->addColumn('catatan', function ($c) {
                return $c->catatan;
            })




            ->addIndexColumn()
            ->rawColumns(['action','catatan'])
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
            'tanggal' => 'required',
            'referensi' => 'required',
            'jumlah' => 'required',
            'catatan' => 'required',
            'dibuat' => 'required'
        ]);


        $tmbiaya = new Biaya();
        $tmbiaya->tanggal = $request->tanggal;
        $tmbiaya->referensi = $request->referensi;
        $tmbiaya->jumlah = $request->jumlah;
        $tmbiaya->catatan = $request->catatan;
        $tmbiaya->dibuat= $request->dibuat;

        $tmbiaya->save();

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
        $Biaya = Biaya::find($id);
        return view('pembelian.editbiaya', compact('Biaya'));
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
        $Biaya = Biaya::find($id);
        $request->validate([
            'tanggal' => 'required',
            'referensi' => 'required',
            'jumlah' => 'required',
            'catatan' => 'required',
            'dibuat' => 'required'
        ]);


       $tanggal = $request->tanggal;
       $referensi = $request->referensi;
       $jumlah = $request->jumlah;
       $catatan = $request->catatan;
       $dibuat= $request->dibuat;
        $Biaya->update([
            'tanggal' => $tanggal,
            'referensi' => $referensi,
            'jumlah' => $jumlah,
            'catatan' => $catatan,
            'dibuat' => $dibuat

        ]);

        return redirect('Pembelian/biaya')->with('status', 'data berhasil di rubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Biaya::destroy($id);
        return response()->json([
            'message' => 'data berhasil di hapus.'
        ]);
    }
}
