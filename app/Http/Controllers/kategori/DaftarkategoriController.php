<?php

namespace App\Http\Controllers\kategori;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kategori;
use DataTables;
class DaftarkategoriController extends Controller
{
    protected $path  = 'images/ava/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('Kategori.daftarkategori');
    }

    public function api()
    {
        $Kategori = Kategori::all();
        return Datatables::of($Kategori)

            ->addColumn('action', function ($p) {
                return "
                    <a href='" . route('Kategori.daftarkategori.edit', $p->id) . "' onclick='edit(" . $p->id . ")' title='Edit Role'><i class='icon-pencil mr-1'></i></a>
                    <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus data'><i class='icon-remove'></i></a>";
            })
            ->editColumn('gambar',  function ($p)  {
                if ($p->gambar != null) {
                    return "<img width='50' class='img-fluid mx-auto d-block rounded-circle' alt='foto' src='" . $this->path . $p->gambar . "'>";
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
            $request->file('gambar')->move("kategori/images/ava/", $fileName);

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
        Kategori::destroy($id);
        return response()->json([
            'massage' => 'data berhasil di hapus',
        ]);
    }
}
