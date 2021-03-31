<?php

namespace App\Http\Controllers\kategori;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Kategori;
use DataTables;
use File;

class DaftarkategoriController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Kategori = Kategori::all();
        return view('Kategori.daftarkategori', compact('Kategori'));
    }

    public function tambahkategori()
    {
        return view ('Kategori.tambahkategori');
    }


    public function showDataModal($id)
    {
        $Kategori = Kategori::find($id);

        return $Kategori;
    }


    public function api()
    {
        $Kategori = Kategori::all();
        return DataTables::of($Kategori)

            ->addColumn('action', function ($p) {
                return "
                    <a href='#' onclick='show(" . $p->id . ")' class='text-danger' title='lihat'><i class='icon-image'></i></a>
                    <a href='" . route('Kategori.daftarkategori.edit', $p->id) . "' onclick='edit(" . $p->id . ")' title='Edit Role'><i class='icon-pencil mr-1'></i></a>
                    <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus data'><i class='icon-remove'></i></a>";
            })
            ->editColumn('gambar',  function ($p)  {
                if ($p->gambar != null) {
                    return "<img width='50' class='img-fluid mx-auto d-block rounded-circle' alt='foto' src='" . config('app.sftp_src').'images/' . $p->gambar . "'>";
                } else {
                    return "<img width='50' class='rounded img-fluid mx-auto d-block' alt='foto' src='" . asset('images/404.png') . "'>";
                }
            })


            ->addIndexColumn()
            ->rawColumns(['action', 'gambar' ])
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
            'kode' => 'required|unique:tmkategori|max:4',
            'nama' => 'required',
            'gambar' => 'required'
        ]);

        $file     = $request->file('gambar');
        $fileName = rand() . '.' . $file->getClientOriginalExtension();
        // $request->file('gambar')->move("kategori/images/ava/", $fileName);
        $request->file('gambar')->storeAs('images', $fileName, 'sftp', 'public');

        $tmkategori = new Kategori();
        $tmkategori->kode = $request->kode;
        $tmkategori->nama = $request->nama;
        $tmkategori->gambar = $fileName;
        $tmkategori->save();

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
        $Kategori = Kategori::find($id);
        return view('kategori.edit', compact(
        'Kategori'
        ));
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
        $Kategori = Kategori::find($id);
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',

        ]);

        $kode = $request->kode;
        $nama = $request->nama;
        if ($request->foto != null) {
            $request->validate([
                'gambar' => 'required|mimes:png,jpg,jpeg|max:1024'
            ]);

            // Proses Saved Foto
            $file     = $request->file('gambar');
            $fileName = rand() . '.' . $file->getClientOriginalExtension();
            $request->file('gambar')->storeAs('images', $fileName, 'sftp', 'public');

            // Proses Delete Foto
            $exist = $Kategori->foto;
            $path  = "kategori/images/ava/" . $exist;
            \File::delete(public_path($path));

            $Kategori->update([
               'kode' => $kode,
               'nama' => $nama,
               'gambar' => $fileName
            ]);
        } else {
            $Kategori->update([
                'kode' => $kode,
                'nama' => $nama,

            ]);
        }
        return redirect('Kategori/daftarkategori')->with('status', 'data mahasiswa berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

         $Kategori = Kategori::find($id);

        // // File::delete('kategori/images/ava/'.$gambar->gambar);
        $exist = $Kategori->gambar;


        Storage::disk('sftp')->delete('images/' . $exist);

        Kategori::destroy($id);

        return response()->json([
            'massage' => 'data berhasil di hapus',
        ]);
    }
}
