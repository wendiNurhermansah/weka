<?php

namespace App\Http\Controllers\pengaturan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

use App\Models\pengaturanToko;
use App\Models\printer;

class TokoController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengaturan.toko');
    }

    public function tambahToko(){
        return view('pengaturan.tambahToko');
    }

    public function printer(){
        return view('pengaturan.printer');
    }

    public function api()
    {
        $pengaturanToko = pengaturanToko::all();
        return Datatables::of($pengaturanToko)

            ->addColumn('action', function ($p) {
                return "
                    <a href='" . route('pengaturan.toko.edit', $p->id) . "' onclick='edit(" . $p->id . ")' title='Edit Role'><i class='icon-pencil mr-1'></i></a>
                   ";
            })



            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }

    public function apiprinter()
    {
        $printer = printer::all();
        return Datatables::of($printer)

            ->addColumn('action', function ($p) {
                return "
                    <a href='" . route('pengaturan.toko.editprinter', $p->id) . "' onclick='edit(" . $p->id . ")' title='Edit Role'><i class='icon-pencil mr-1'></i></a>
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


        $tmtoko = new pengaturanToko();
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
        $pengaturanToko = pengaturanToko::find($id);
        return view('pengaturan.editToko', compact('Toko'));
    }

    public function editprinter($id)
    {
        $printer = printer::find($id);
        return view('pengaturan.printer', compact('printer'));
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
        $pengaturanToko = pengaturanToko::find($id);
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
        $pengaturanToko->update([
            'nama' => $nama,
            'kode' => $kode,
            'telepon' => $telepon,
            'email' => $email,
            'alamat' => $alamat,
            'kota' => $kota

        ]);

        return redirect('pengaturan/toko')->with('status', 'data berhasil di rubah');
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
