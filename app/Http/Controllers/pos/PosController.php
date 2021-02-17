<?php

namespace App\Http\Controllers\pos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\Models\Pembelian;
use App\Models\Pelanggan;
use App\Models\Kategori;

class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $route = 'Pos.main.';
    protected $view  = 'pos.';
    protected $title = 'POS';
    protected $path  = 'kategori/images/ava/';

    public function index()
    {
        $route = $this->route;
        $title = $this->title;
        $path = $this->path;

        $pelanggan = $this->pelanggan();
        $kartu = $this->kartu();
        // dd(Core::count());
        return view($this->view . 'index', compact(
            'route',
            'title',
            'path', 
            'pelanggan',
            'kartu'
        ));
    }

    public function pelanggan()
    {
        $pelanggan = Pelanggan::all();
        return $pelanggan;
    }

    public function kartu()
    {
        $kartu = Kategori::all();
        return $kartu;
    }

    public function kategori(Request $request)
    {
        $search = $request->search;

        if($search == ''){
           $kategori = Kategori::orderby('nama','asc')
                        ->select('nama')
                        ->limit(5)
                        ->get();
        }else{
           $kategori = Kategori::orderby('nama','asc')
                        ->select('nama')
                        ->where('nama', 'like', '%' .$search . '%')
                        ->limit(5)
                        ->get();
        }
  
        $response = array();
        foreach($kategori as $k){
           $response[] = array("label"=>$k->nama);
        }
  
        return response()->json($response);
    }

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
