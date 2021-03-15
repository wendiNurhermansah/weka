<?php

namespace App\Http\Controllers\kategori;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\Models\pengaturanToko;

class pengaturanTokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Kategori.toko');
    }

    public function tambahToko(){
        return view('Kategori.tambahToko');
    }

    public function api()
    {
        $Toko = Toko::all();
        return Datatables::of($Toko)

            ->addColumn('action', function ($p) {
                return "
                    <a href='" . route('Kategori.toko.edit', $p->id) . "' onclick='edit(" . $p->id . ")' title='Edit Role'><i class='icon-pencil mr-1'></i></a>
                   ";
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
            'kode' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'kota' => 'required'
        ]);


        $tmtoko = new Toko();
        $tmtoko->nama = $request->nama;
        $tmtoko->kode = $request->kode;
        $tmtoko->telepon = $request->telepon;
        $tmtoko->email = $request->email;
        $tmtoko->alamat = $request->alamat;
        $tmtoko->kota = $request->kota;

        $tmtoko->save();

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
        $Toko = Toko::find($id);
        return view('Kategori.editToko', compact('Toko'));
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
        $Toko = Toko::find($id);
        $request->validate([
            'nama' => 'required',
            'kode' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'kota' => 'required'
        ]);

        $nama = $request->nama;
        $kode = $request->kode;
        $telepon = $request->telepon;
        $email = $request->email;
        $alamat = $request->alamat;
        $kota = $request->kota;
        $Toko->update([
            'nama' => $nama,
            'kode' => $kode,
            'telepon' => $telepon,
            'email' => $email,
            'alamat' => $alamat,
            'kota' => $kota

        ]);

        return redirect('Kategori/toko')->with('status', 'data berhasil di rubah');
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
