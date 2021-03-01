<?php

namespace App\Http\Controllers\pembelian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\Models\Pembelian;
use App\Models\Kategori;
use File;
use App\Models\Pemasok;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pembelian.pembelian');
    }



    public function tambahPembelian(){
        $Pemasok = Pemasok::all();
        return view ('pembelian.tambahPembelian', compact('Pemasok'));
    }

    public function produk(Request $request)
    {
        $search = $request->search;

        if($search == ''){
           $kategori = Kategori::orderby('nama','asc')
                        ->select('id','nama')
                        ->limit(5)
                        ->get();
        }else{
           $kategori = Kategori::orderby('nama','asc')
                        ->select('id','nama')
                        ->where('nama', 'like', '%' .$search . '%')
                        ->limit(5)
                        ->get();
        }

        $response = array();
        foreach($kategori as $k){
           $response[] = array("label"=>$k->nama, "id"=>$k->id, );
        }

        return response()->json($response);
    }

    public function api()
    {
        $Pembelian = Pembelian::all();
        return Datatables::of($Pembelian)

            ->addColumn('action', function ($p) {
                return "
                    <a href='#' onclick='list(" . $p->id . ")' class='text-success' title='Show data'><i class='icon-list'></i></a>
                    <a href='" . route('Pembelian.pembelian.edit', $p->id) . "' onclick='edit(" . $p->id . ")' title='Edit Role'><i class='icon-pencil mr-1'></i></a>
                    <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus data'><i class='icon-remove'></i></a>";
            })

            ->addColumn('catatan', function ($c) {
                return $c->catatan;
            })





            ->addIndexColumn()
            ->rawColumns(['action', 'catatan'])
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
            'tanggal' => 'required',
            'referensi' => 'required',
            'total' => 'required',
            'catatan' => 'required',
            'produk' => 'required',
            'kuantitas' => 'required',
            'biaya_satuan' => 'required',
            'sub_total' => 'required',
            'pemasok' => 'required',
            'diterima' => 'required',
            'lampiran' => 'required|mimes:doc,csv,xlsx,xls,docx,ppts,csv,jpg,jpeg,png'
        ]);

        $file     = $request->file('lampiran');
        $fileName = rand() . '.' . $file->getClientOriginalExtension();
        $request->file('lampiran')->move("Dokumen/lampiran/", $fileName);

        $tmpembelian = new Pembelian();
        $tmpembelian->tanggal = $request->tanggal;
        $tmpembelian->referensi = $request->referensi;
        $tmpembelian->total = $request->total;
        $tmpembelian->catatan = $request->catatan;
        $tmpembelian->produk = $request->produk;
        $tmpembelian->kuantitas = $request->kuantitas;
        $tmpembelian->biaya_satuan = $request->biaya_satuan;
        $tmpembelian->sub_total = $request->sub_total;
        $tmpembelian->pemasok = $request->pemasok;
        $tmpembelian->diterima = $request->diterima;
        $tmpembelian->lampiran = $fileName;
        $tmpembelian->save();

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
        $Pembelian = Pembelian::findOrfail($id);
        $Pemasok = Pemasok::all();
        return view('pembelian.editPembelian', compact('Pembelian', 'Pemasok'));
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
        $Pembelian = Pembelian::find($id);
        $request->validate([
            'tanggal' => 'required',
            'referensi' => 'required',
            'total' => 'required',
            'catatan' => 'required',
            'produk' => 'required',
            'kuantitas' => 'required',
            'biaya_satuan' => 'required',
            'sub_total' => 'required',
            'pemasok' => 'required',
            'diterima' => 'required',


        ]);

        $tanggal = $request->tanggal;
        $referensi = $request->referensi;
        $total = $request->total;
        $catatan = $request->catatan;
        $produk = $request->produk;
        $kuantitas = $request->kuantitas;
        $biaya_satuan = $request->biaya_satuan;
        $sub_total = $request->sub_total;
        $pemasok = $request->pemasok;
        $diterima = $request->diterima;

        if ($request->foto != null) {


            // Proses Saved Foto
            $file     = $request->file('lampiran');
            $fileName = rand() . '.' . $file->getClientOriginalExtension();
            $request->file('lampiran')->move("Documen/lampiran/", $fileName);

            // Proses Delete Foto
            $exist = $Pembelian->foto;
            $path  = "Dokumen/lampiran/" . $exist;
            \File::delete(public_path($path));

            $Pembelian->update([
                'tanggal' => $tanggal,
                'referensi' => $referensi,
                'total' => $total,
                'catatan' => $catatan,
                'produk' => $produk,
                'kuantitas' => $kuantitas,
                'biaya_satuan' => $biaya_satuan,
                'sub_total' => $sub_total,
                'pemasok' => $pemasok,
                'diterima' => $diterima,
                'lampiran' => $fileName
            ]);
        } else {
            $Pembelian->update([
                'tanggal' => $tanggal,
                'referensi' => $referensi,
                'total' => $total,
                'catatan' => $catatan,
                'produk' => $produk,
                'kuantitas' => $kuantitas,
                'biaya_satuan' => $biaya_satuan,
                'sub_total' => $sub_total,
                'pemasok' => $pemasok,
                'diterima' => $diterima,

            ]);
        }
        return redirect('Pembelian/pembelian')->with('status', 'data mahasiswa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {
        $gambar = Pembelian::where('id',$id)->first();
        File::delete('Dokumen/lampiran/'.$gambar->lampiran);
        Pembelian::destroy($id);
        return response()->json([
            'message' => 'Data berhasil di hapus.'
        ]);
    }

    public function price($id){
        return Kategori::find($id);
    }
}
