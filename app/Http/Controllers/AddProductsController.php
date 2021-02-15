<?php

namespace App\Http\Controllers;

use App\Models\addProduct;
use Illuminate\Http\Request;

class AddProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('titi');

        return view ('Produk.TambahProduk');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Produk.ImportProduk');
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
            'ketik' => 'required',
            'kategori' => 'required',
            'kuantitas' => 'required',
            'pajak' => 'required',
            'metode' => 'required',
            'biaya' => 'required',
            'harga' => 'required',
        ]);

        $input = new addProduct();
        $input->nama = $request->nama;
        $input->ketik = $request->ketik;
        $input->kategori = $request->kategori;
        $input->kuantitas = $request->kuantitas;
        $input->pajak = $request->pajak;
        $input->metode = $request->metode;
        $input->biaya = $request->biaya;
        $input->harga = $request->harga;

        $input->save();

        return redirect('/product')->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\addProduct  $addProduct
     * @return \Illuminate\Http\Response
     */
    public function show(addProduct $addProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\addProduct  $addProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(addProduct $addProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\addProduct  $addProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, addProduct $produk)
    {
        $request->validate([
            'nama' => 'required',
            'ketik' => 'required',
            'kategori' => 'required',
            'kuantitas' => 'required',
            'pajak' => 'required',
            'metode' => 'required',
            'biaya' => 'required',
            'harga' => 'required',
        ]);

        addProduct::where('id', $produk->id)
            ->update([
                'nama' => $request->nama,
                'ketik' => $request->ketik,
                'kategori' => $request->kategori,
                'kuantitas' => $request->kuantitas,
                'pajak' => $request->pajak,
                'metode' => $request->metode,
                'biaya' => $request->biaya,
                'harga' => $request->harga,
            ]);
        return redirect('/produk')->with('status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\addProduct  $addProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(addProduct $addProduct)
    {
        //
    }
}
