<?php

namespace App\Http\Controllers\hadiah;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\Models\Hadiah;

class HadiahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hadiah.daftarkartuhadiah');
    }

    public function tambahHadiah(){
        return view('hadiah.tambahHadiah');
    }

    public function api()
    {
        $Hadiah = Hadiah::all();
        return Datatables::of($Hadiah)

            ->addColumn('action', function ($p) {
                return "
                    <a href='" . route('Hadiah.hadiah.edit', $p->id) . "' onclick='edit(" . $p->id . ")' title='Edit Role'><i class='icon-pencil mr-1'></i></a>
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
            'card' => 'required',
            'nilai' => 'required',
            'kedaluwarsa' => 'required'
        ]);


        $tmhadiah = new Hadiah();
        $tmhadiah->card = $request->card;
        $tmhadiah->nilai = $request->nilai;
        $tmhadiah->kedaluwarsa = $request->kedaluwarsa;

        $tmhadiah->save();

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
        $Hadiah = Hadiah::find($id);
        return view('hadiah.editHadiah',compact('Hadiah'));
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
        $Hadiah = Hadiah::find($id);
        $request->validate([
            'card' => 'required',
            'nilai' => 'required',
            'kedaluwarsa' => 'required'

        ]);
        $card = $request->card;
        $nilai = $request->nilai;
        $kedaluwarsa = $request->kedaluwarsa;

        $Hadiah->update([
            'card' => $card,
            'nilai' => $nilai,
            'kedaluwarsa' => $kedaluwarsa,


        ]);
        return redirect('Hadiah/hadiah')->with('status', 'data mahasiswa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Hadiah::destroy($id);
        return response()->json([
            'massage' => 'data berhasil di hapus',
        ]);
    }

}
