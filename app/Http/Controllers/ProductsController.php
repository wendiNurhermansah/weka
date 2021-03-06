<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;
use App\Models\product;
use App\Models\Kategori;
use App\Models\Pembelian_details;
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
        $produk = product::where('status', '1')->get();
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
            ->addColumn('harga_nett', function ($p) {
               return $p->harga_jual - $p->discount - $p->harga_pabrik;
            })
            ->addColumn('qr_code', function($p) {
                $b = base64_encode(\SimpleSoftwareIO\QrCode\Facades\QrCode::format('png')->size(900)->errorCorrection('H')->margin(0)->generate($p->nama .'  '. $p->harga_nett));
                $img = '<img src="data:image/png;base64, ' . $b . '" alt="" />';
                return $img;
            })


            ->addIndexColumn()
            ->rawColumns(['action', 'gambar', 'qr_code'])
            ->toJson();
    }

    public function index()
    {
        $produk = product::where('status', '1')->get();

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
        $request->validate([
            'nama' => 'required',
            'kategori_id' => 'required',
            'harga_pabrik' => 'required',
            'harga_jual' => 'required',
            'stock' => 'required',
            'gambar' => 'required'
        ]);
        $file     = $request->file('gambar');
        $fileName = rand() . '.' . $file->getClientOriginalExtension();
        // $request->file('gambar')->move("kategori/images/ava/", $fileName);
        $request->file('gambar')->storeAs('images', $fileName, 'sftp', 'public');
        // dd($fileName);

        // $harga_pabrik = ''
        // $harga_nett = ''

        $produk = new product();
        $produk->nama = $request->nama;
        $produk->kategori_id = $request->kategori_id;
        $produk->harga_pabrik = $request->harga_pabrik;
        $produk->discount = $request->discount;
        $produk->harga_jual = $request->harga_jual;
        $produk->harga_nett = $request->harga_jual - $request->harga_pabrik - $request->discount;
        $produk->stock = $request->stock;
        $produk->gambar = $fileName;
        $produk->save();

        return redirect()->route('product.index')->with('status', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
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
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(product $produk, $id)
    {
        $produk = product::where('id', $id)->first();
        $kategori = Kategori::all();
        return view('Produk.edit', compact('produk', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produk = product::find($id);
        // $request->validate([
        //     'nama' => 'required',
        //     'kategori_id' => 'required',
        //     'harga_pabrik' => 'required',
        //     'harga_jual' => 'required',
        //     'stock' => 'required',
        // ]);

        $nama = $request->nama;
        $produk->kategori_id = $request->kategori_id;
        $harga_pabrik = $request->harga_pabrik;
        $discount = $request->discount;
        $harga_jual = $request->harga_jual;
        $harga_nett = $request->harga_nett;
        $stock = $request->stock;
        if ($request->gambar != null) {
            $request->validate([
                'gambar' => 'required|mimes:png,jpg,jpeg,jfif|max:1024'
            ]);

            // proses saved foto
            $file = $request->file('gambar');
            $fileName = rand() . '.' . $file->getClientOriginalExtension();
            $request->file('gambar')->storeAs('images', $fileName, 'sftp', 'public');

            // Proses Delete Foto
            $exist = $produk->gambar;


        Storage::disk('sftp')->delete('images/' . $exist);
            // $exist = $produk->gambar;
            // $path  = "images/" . $exist;
            // \File::delete(public_path($path));

            $produk->update([
                'nama' => $nama,
                // 'kategori_id' => $kategori_id,
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
                // 'kategori_id' => $kategori_id,
                'harga_pabrik' => $harga_pabrik,
                'discount' => $discount,
                'harga_jual' => $harga_jual,
                'harga_nett' => $harga_nett,
                'stock' => $stock
            ]);
        }
        return view('Produk/DaftarProduk')->with('status', 'data berhasil diubah');
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
        $produk = product::find($id);


        // // File::delete('kategori/images/ava/'.$gambar->gambar);
        $exist = $produk->gambar;


        Storage::disk('sftp')->delete('images/' . $exist);


        $produk = product::find($id);
        $produk->status = 0;
        $produk->save();




        return response()->json([
            'message' => 'data berhasil di hapus',
        ]);
    }

    public function qrcode()
    {
        $qrcode = product::all();
        return view('Produk.qrcode');

    }
}
