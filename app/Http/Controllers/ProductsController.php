<?php

namespace App\Http\Controllers;

use App\Models\product;
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




            ->addIndexColumn()
            ->rawColumns(['action'])
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
        return view('Produk.TambahProduk');

    }

    /**
     * Store a newly created resource in storage.
     *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
     */
    // public function store(Request $request);
    // {

    //     $request->validate([
    //         'nama' => 'required',
    //         'ketik' => 'required',
    //         'kategori' => 'required',
    //         'kuantitas' => 'required',
    //         'pajak' => 'required',
    //         'metode' => 'required',
    //         'biaya' => 'required',
    //         'harga' => 'required'
    //     ]);

    //     // $karyawan = new employee;
    //     // $karyawan->nama = $request->nama;
    //     // $karyawan->jabatan = $request->jabatan;
    //     // $karyawan->alamat = $request->alamat;
    //     // $karyawan->tempat_lahir = $request->tempat_lahir;
    //     // $karyawan->tanggal_lahir = $request->tanggal_lahir;
    //     // $karyawan->agama = $request->agama;
    //     // $karyawan->pendidikan_terakhir = $request->pendidikan_terakhir;

    //     // $karyawan->save();
    //     // return redirect('/name' );

    //     Employee::create($request->all());
    //     return redirect('/index')->with('status', 'Data Berhasil Ditambahkan');

    // }

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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product
     * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, produks $produk)
    // {
    //     $request->validate([
    //         'nama' => 'required',
    //         'ketik' => 'required',
    //         'kategori' => 'required',
    //         'kuantitas' => 'required',
    //         'pajak' => 'required',
    //         'metode' => 'required',
    //         'biaya' => 'required',
    //         'harga' => 'required'
    //     ]);

    //     Employee::where('id', $produk->id)
    //         ->update([
    //             'nama' => $request->nama,
    //             'ketik' => $request->ketik,
    //             'kategori' => $request->kategori,
    //             'kuantitas' => $request->kuantitas,
    //             'pajak' => $request->pajak,
    //             'metode' => $request->metode,
    //             'biaya' => $request->biaya,
    //             'harga' => $request->harga,
    //         ]);
    //     return redirect('/produk')->with('status', 'Data Berhasil Diubah');
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
// }
    }
