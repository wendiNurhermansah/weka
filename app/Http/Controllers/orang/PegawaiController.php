<?php

namespace App\Http\Controllers\orang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('orang.pengguna');
    }

    public function tambahpegawai(){
        return view ('orang.tambahpengguna');
    }

    public function api()
    {
        $Pegawai = Pegawai::all();
        return Datatables::of($Pegawai)

            ->addColumn('action', function ($p) {
                return "
                    <a href='" . route('Orang.pengguna.edit', $p->id) . "' onclick='edit(" . $p->id . ")' title='Edit Role'><i class='icon-pencil mr-1'></i></a>
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
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'email' => 'required',
            'group' => 'required',
            'status' => 'required'
        ]);


        $tmpegawai = new Pegawai();
        $tmpegawai->nama_depan = $request->nama_depan;
        $tmpegawai->nama_belakang = $request->nama_belakang;
        $tmpegawai->email = $request->email;
        $tmpegawai->group = $request->group;
        $tmpegawai->status= $request->status;

        $tmpegawai->save();

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
        $Pegawai = Pegawai::find($id);
        return view('orang.edit', compact('Pegawai'));
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
        $Pegawai = Pegawai::find($id);
        $request->validate([
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'email' => 'required',
            'group' => 'required',
            'status' => 'required'
        ]);

        $nama_depan = $request->nama_depan;
        $nama_belakang = $request->nama_belakang;
        $email = $request->email;
        $group = $request->group;
        $status = $request->status;
        $Pegawai->update([
            'nama_depan' => $nama_depan,
            'nama_belakang' => $nama_belakang,
            'email' => $email,
            'group' => $group,
            'status' => $status

        ]);

        return redirect('Orang/pegawai')->with('status', 'data berhasil di rubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pegawai::destroy($id);
        return response()->json([
            'message' => 'data berhasil di hapus.'
        ]);
    }
}
