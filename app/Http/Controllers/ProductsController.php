<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;
use App\Models\product;
use App\Models\Kategori;
use Illuminate\Http\Request;
use DataTables;


class ProductsController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function api()
    {
        $produk = product::all();
        return DataTables::of($produk)

            ->addColumn('action', function ($p) {
                return "
                    <a href='#' onclick='show(" . $p->id . ")' class='text-danger' title='lihat'><i class='icon-image'></i></a>
                    <a href='" . route('product.edit', $p->id) . "' onclick='edit(" . $p->id . ")' title='Edit Role'><i class='icon-pencil mr-1'></i></a>
                    <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus data'><i class='icon-remove'></i></a>";
            })
            ->editColumn('gambar',  function ($p)  {
                if ($p->gambar != null) {
                    return "<img width='50' class='img-fluid mx-auto d-block rounded-circle' alt='foto' src='" . config('app.sftp_src').'images/' . $p->gambar . "'>";
                } else {
                    return "<img width='50' class='rounded img-fluid mx-auto d-block' alt='foto' src='" . asset('images/404.png') . "'>";
                }
            })
            ->addColumn('total', function ($p) {
               return $p->harga_jual - $p->discount - $p->harga_pabrik;
            })


            ->addIndexColumn()
            ->rawColumns(['action', 'gambar'])
            ->toJson();
    }

    public function index()
    {
        $produk = product::all();

        return view('Produk.DaftarProduk', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        $produk = product::all();
        return view('Produk.TambahProduk', compact('produk','kategori'));

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
        // $request->file('gambar')->move("kategori/images/ava/", $fileName);
        $request->file('gambar')->storeAs('images', $fileName, 'sftp', 'public');
        // dd($fileName);

        $produk = new product();
        $produk->nama = $request->nama;
        $produk->kategori_id = $request->kategori_id;
        $produk->harga_pabrik = $request->harga_pabrik;
        // $produk->kuantitas = $request->kuantitas;
        $produk->harga_nett = $request->harga_nett;
        $produk->harga_jual = $request->harga_jual;
        $produk->stock = $request->stock;
        $produk->gambar = $fileName;
        $produk->save();

        return redirect()->route('product.index')->with('status', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
    //  * @param  \App\Models\Employee  $employee
    //  * @return \Illuminate\Http\Response
    //  */
    public function show(product $produk)
    {
        return view('Produk.edit', compact ('produk'));
    }

    public function showDataModal($id)
    {
        $produk = product::find($id);

        return $produk;
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
        $kategori = Kategori::all();
        return view('Produk.edit', compact('produk', 'kategori'));
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
        $produk = product::find($id);
        // $request->validate([
        //     'nama' => 'required',
        //     'harga_pabrik' => 'required',
        //     'discount' => 'required',
        //     'harga_jual' => 'required',
        //     'harga_nett' => 'required',
        //     'stock' => 'required',
        //     ]);

        $nama = $request->nama;
        $harga_pabrik = $request->harga_pabrik;
        $discount = $request->discount;
        $harga_jual = $request->harga_jual;
        $harga_nett = $request->harga_nett;
        $stock = $request->stock;
        if ($request->foto != null) {
            $request->validate([
                'gambar' => 'required|mimes:png,jpg,jpeg|max:1024'
            ]);

        // proses saved foto
        $file = $request->file('gambar');
        $fileName = rand() . '.' . $file->getClientOriginalExtension();
        $request->file('gambar')->storeAs('images', $fileName, 'sftp', 'public');

        // Proses Delete Foto
        $exist = $produk->foto;
        $path  = "produk/images/ava/" . $exist;
        \File::delete(public_path($path));

        $produk->update([
            'nama' => $nama,
            'harga_pabrik' => $harga_pabrik,
            'discount' => $discount,
            'harga_jual' => $harga_jual,
            'harga_nett' => $harga_nett,
            'stock' => $stock,
            'gambar' => $fileName
        ]);

        } else {
            $produk->update([
                'nama' => $nama,
                'harga_pabrik' => $harga_pabrik,
                'discount' => $discount,
                'harga_jual' => $harga_jual,
                'harga_nett' => $harga_nett,
                'stock' => $stock
            ]);
        }
        return view('Produk.DaftarProduk')->with('status', 'Data Berhasil diubah');
    }


    //     $request->validate([
    //         'nama' => 'required',
    //         'harga_pabrik' => 'required',
    //         'discount' => 'required',
    //         'harga_jual' => 'required',
    //         'harga_nett' => 'required',
    //         'stock' => 'required'
    //     ]);

    //     product::where('id', $id)
    //         ->update([
    //             'nama' => $request->nama,
    //             'harga_pabrik' => $request->harga_pabrik,
    //             'discount' => $request->discount,
    //             'harga_jual' => $request->harga_jual,
    //             'harga_nett' => $request->harga_nett,
    //             'stock' => $request->stock
    //         ]);
    //      return redirect()->route('product.index')->withSuccess('data berhasil diubah');
    // }

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
}
