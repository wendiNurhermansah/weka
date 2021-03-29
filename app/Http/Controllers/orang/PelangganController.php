<?php

namespace App\Http\Controllers\orang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orang.pelanggan');
    }

    public function tambahpelanggan(){
        return view ('orang.tambahpelanggan');
    }

    public function api()
    {
        $Pelanggan = Pelanggan::all();
        return Datatables::of($Pelanggan)

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

        // dd($request->all());
        $request->validate([
            'nama' => 'required',
            'telepon' => 'required',
            'email' => 'required',
        ]);


        $tmpelanggan = new Pelanggan();
        $tmpelanggan->nama = $request->nama;
        $tmpelanggan->telepon = $request->telepon;
        $tmpelanggan->email = $request->email;
        $tmpelanggan->ccf_1 = $request->ccf_1;
        $tmpelanggan->ccf_2 = $request->ccf_2;

        $tmpelanggan->save();

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
        $Pelanggan = Pelanggan::find($id);
        return view('orang.editPelanggan', compact('Pelanggan'));
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
        $Pelanggan = Pelanggan::find($id);
        $request->validate([
            'nama' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'ccf_1' => 'required',
            'ccf_2' => 'required'
        ]);

        $nama = $request->nama;
        $telepon = $request->telepon;
        $email = $request->email;
        $ccf_1 = $request->ccf_1;
        $ccf_2 = $request->ccf_2;
        $Pelanggan->update([
            'nama' => $nama,
            'telepon' => $telepon,
            'email' => $email,
            'group' => $ccf_1,
            'status' => $ccf_2

        ]);

        return redirect('Orang/pelanggan')->with('status', 'data berhasil di rubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pelanggan::destroy($id);
        return response()->json([
            'massage' => 'data berhasil di hapus.'
        ]);
    }
}
