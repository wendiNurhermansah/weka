<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProductsController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function api()
    {
        $Pembelian = Pembelian::all();
        return Datatables::of($Pembelian)

            ->addColumn('action', function ($p) {
                return "
                     <a href='#' onclick='show(" . $p->id . ")' class='text-danger' title='Show data'><i class='icon-list'></i></a>
                    <a href='" . route('Orang.pelanggan.edit', $p->id) . "' onclick='edit(" . $p->id . ")' title='Edit Role'><i class='icon-pencil mr-1'></i></a>
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

    public function index()
    {
        $produk = product::all();

        return view ('Produk.DaftarProduk', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('Produk.TambahProduk', compact('kategori'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'nama' => 'required',
        //     'kategori' => 'required',
        //     'kuantitas' => 'required',
        //     'pajak' => 'required',
        //     'biaya' => 'required',
        //     'harga' => 'required',
        //     'gambar' => 'required|mimes:png,jpeg,png|max:2024'
        // ]);
        $file     = $request->file('gambar');
        $fileName = rand() . '.' . $file->getClientOriginalExtension();
        $request->file('gambar')->move("produk/images/ava/", $fileName);
        // dd($fileName);

        $produk = new product();
        $produk->nama     = $request->nama;
        $produk->kategori = $request->kategori;
        $produk->kuantitas = $request->kuantitas;
        $produk->pajak = $request->pajak;
        $produk->biaya = $request->biaya;
        $produk->harga = $request->harga;
        $produk->gambar = $fileName;
        $produk->save();

        return redirect()->route('product.index')->withSuccess('data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
    //  * @param  \App\Models\Employee  $employee
    //  * @return \Illuminate\Http\Response
    //  */
    public function show(product $produk)
    {
        return view ('Produk.edit', compact ('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
    //  * @param  \App\Models\Employee  $employee
    //  * @return \Illuminate\Http\Response
    //  */
    public function edit(product $produk, $id)
    {
        $produk = product::where('id', $id)->first();
        return view ('Produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\product
    //  * @return \Illuminate\Http\Response
    //  */
    public function update(Request $request, $id)
        {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'kuantitas' => 'required',
            'pajak' => 'required',
            'biaya' => 'required',
            'harga' => 'required'
        ]);

        product::where('id', $id)
            ->update([
                'nama' => $request->nama,
                'kategori' => $request->kategori,
                'kuantitas' => $request->kuantitas,
                'pajak' => $request->pajak,
                'biaya' => $request->biaya,
                'harga' => $request->harga,
            ]);
         return redirect()->route('product.index')->withSuccess('data berhasil diubah');
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\produks  $employee
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy($id)
    {
        $produks = product::find($id);
        $produks -> delete();
        return redirect('/product')->with('status', 'Data Berhasil Dihapus');
    }
// }
    }
