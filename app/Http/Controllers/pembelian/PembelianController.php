<?php

namespace App\Http\Controllers\pembelian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\Models\Pembelian;
use App\Models\Kategori;
use App\Models\product;
use File;
use App\Models\Pemasok;
use App\Models\Pembelian_details;


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
           $product = Product::orderby('nama','asc')
                        ->select('id','nama')
                        ->limit(5)
                        ->get();
        }else{
           $product = Product::orderby('nama','asc')
                        ->select('id','nama')
                        ->where('nama', 'like', '%' .$search . '%')
                        ->limit(5)
                        ->get();
        }

        $response = array();
        foreach($product as $k){
           $response[] = array("label"=>$k->nama, "id"=>$k->id, );
        }
        // dd(response()->json($response));
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
            'produk_id' => 'required',
            'kuantitas' => 'required',
            'biaya_satuan' => 'required',
            'sub_total' => 'required',
            'pemasok' => 'required',
            'diterima' => 'required'
        ]);


        if ($request->hasFile('lampiran')) {
        $file     = $request->file('lampiran');
        $fileName = rand() . '.' . $file->getClientOriginalExtension();
        $request->file('lampiran')->move("Dokumen/lampiran/", $fileName);
        }else{
            $fileName='';
        }

            // foreach($request->produk as $key => $produk){



            //     $tmpembelian = new Pembelian();
            //     $tmpembelian->tanggal = $request->tanggal;
            //     $tmpembelian->referensi = $request->referensi;
            //     $tmpembelian->total = $request->total;
            //     $tmpembelian->catatan = $request->catatan;

            //     $tmpembelian->produk = $produk;
            //     $tmpembelian->kuantitas = $request->input('kuantitas')[$key];
            //     $tmpembelian->biaya_satuan = $request->input('biaya_satuan')[$key];
            //     $tmpembelian->sub_total = $request->input('sub_total')[$key];


            //     $tmpembelian->pemasok = $request->pemasok;
            //     $tmpembelian->diterima = $request->diterima;
            //     $tmpembelian->lampiran = $fileName;
            //     $tmpembelian->save();
            // }

            $tmpembelian = new Pembelian();
            $tmpembelian->tanggal = $request->tanggal;
            $tmpembelian->referensi = $request->referensi;
            $tmpembelian->total = $request->total;
            $tmpembelian->catatan = $request->catatan;
            $tmpembelian->pemasok = $request->pemasok;
            $tmpembelian->diterima = $request->diterima;
            $tmpembelian->lampiran = $fileName;
            $tmpembelian->save();

            foreach($request->produk_id as $key => $produk_id){
            $pembelian_details = new Pembelian_details();

            $pembelian_details->produk_id = $produk_id;
            $pembelian_details->tmpembelian_id = $tmpembelian->id;
            $pembelian_details->kuantitas = $request->input('kuantitas')[$key];
            $pembelian_details->biaya_satuan = $request->input('biaya_satuan')[$key];
            $pembelian_details->sub_total = $request->input('sub_total')[$key];
            $pembelian_details->save();
            }




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
            if ($request->hasFile('lampiran')) {
            $file     = $request->file('lampiran');
            $fileName = rand() . '.' . $file->getClientOriginalExtension();
            $request->file('lampiran')->move("Documen/lampiran/", $fileName);
            }else{
                $fileName = '';
            }
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

        Pembelian_details::where('tmpembelian_id', $id)->delete($id);

        $gambar = Pembelian::where('id',$id)->first();
        File::delete('Dokumen/lampiran/'.$gambar->lampiran);

        Pembelian::destroy($id);
        return response()->json([
            'message' => 'Data berhasil di hapus.'
        ]);
    }

    public function price($id){
        return product::find($id);
    }

    public function showDataModal($id)
    {
        $Pembelian = Pembelian::find($id);
        $pembelian_details = Pembelian_details::with('product')->where('tmpembelian_id', $id)->get();


        return [$Pembelian, $pembelian_details];
    }
}
