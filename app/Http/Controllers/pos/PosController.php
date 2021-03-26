<?php

namespace App\Http\Controllers\pos;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Contracts\Support\Jsonable;

use App\Http\Controllers\Controller;
use DataTables;

use App\Models\Pembelian;
use App\Models\Pelanggan;
use App\Models\Kategori;
use App\Models\product;

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
    protected $path  = 'produk/images/ava/'; 

    public function index()
    {
        $route = $this->route;
        $title = $this->title;
        $path = $this->path;

        $pelanggan = $this->pelanggan();
        $kartu = $this->kartu();
        $getKartu = $this->getKategori();
        // dd(Core::count());
        return view($this->view . 'index', compact(
            'route',
            'title',
            'path', 
            'pelanggan',
            'kartu',
            'getKartu'
        ));
    }

    public function pelanggan()
    {
        $pelanggan = Pelanggan::all();
        return $pelanggan;
    }

    public function kartu()
    {
        $kartu = product::simplePaginate(12);
        return $kartu;
    }

    function fetch_kartu(Request $request){
        if($request->ajax()){
            $kartu = product::simplePaginate(12);
            
            $output = '<div class="h-75 mb-5">
                            <div class="row ml-4 pl-2">';
            // loop through the result array
            foreach ($kartu as $k){
                // concatenate output to the array
                $output .=  '<a href="#" onclick="searchProduk('.$k->id.')">
                                <div class="card m-1" style="width: 10rem;">
                                    <img class="card-img-top" src="../produk/images/ava/'.$k->gambar.'" alt=""  width="10" height="40">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><small>'.$k->nama.'</small></li>
                                        <li class="list-group-item"><small>'.$k->harga.'</small></li>
                                    </ul>
                                </div>
                            </a>';
                }
            // end of output
            $output .= '    </div>
                        </div>
                        <div class="product-nav row text-white w-100 mt-4 pt-2">
                            <a to="'.$kartu->previousPageUrl().'" onclick="pageLink(1)" id="pagePrevious" class="pagePrevious btn btn-secondary col-md-4 font-weight-bold"><</a>
                            <button class="btn btn-success col-md-4 font-weight-bold" data-toggle="modal" data-target="#hadiah">
                                <i class="icon icon-folder"></i>Sell Gift Card
                            </button>
                            <a to ="'.$kartu->nextPageUrl().'" onclick="pageLink(2)" id="pageNext" class="pageNext btn btn-secondary col-md-4 font-weight-bold">></a>
                        </div>';
            return $output;
        }
    }

    public function kategori(Request $request)
    {
        $search = $request->search;

        if($search == ''){
           $kategori = product::orderby('nama','asc')
                        ->limit(5)
                        ->get();
        }else{
           $kategori = product::orderby('nama','asc')
                        ->where('nama', 'like', '%' .$search . '%')
                        ->limit(5)
                        ->get();
        }
  
        $response = array();
        foreach($kategori as $k){
           $response[] = array("id"=>$k->id,"label"=>$k->nama);
        }
  
        return response()->json($response);
    }

    public function produk(){
        return product::find($id);
    }

    // public function cariKategori(Request $request)
    // {
    //     $search = $request->search;

    //     if($search == ''){
    //        $kategori = Kategori::orderby('nama','asc')
    //                     ->select('nama')
    //                     ->limit(5)
    //                     ->get();
    //     }else{
    //        $kategori = Kategori::orderby('nama','asc')
    //                     ->select('nama')
    //                     ->where('nama', 'like', '%' .$search . '%')
    //                     ->limit(5)
    //                     ->get();
    //     }
  
    //     $response = array();
    //     foreach($kategori as $k){
    //        $response[] = array("label"=>$k->nama);
    //     }
  
    //     return response()->json($response);
    // }

    public function cariKategori(Request $request)
    {
        if($request->ajax()) {
            // select country name from database
            $data = Kategori::where('nama', 'LIKE', $request->kategori.'%')
                ->get();
            // declare an empty array for output
            $output = '';
            // if searched countries count is larager than zero
            if (count($data)>0) {
                // concatenate output to the array
                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
                // loop through the result array
                foreach ($data as $row){
                    // concatenate output to the array
                    $output .=  '<li class="list-group-item"> 
                                        <input type="text" value="'.$row->id.'" hidden>
                                        <a class="btn">
                                            <img src="../kategori/images/ava/'.$row->gambar.'" alt="" style="height:30px;width:30px;" class="img-fluid img-responsive">' 
                                            .'<span class="ml-2">'.$row->nama.'<span>'.'
                                        </a>
                                    </li>';
                    }
                // end of output
                $output .= '</ul>';
            }
            else {
                // if there's no matching results according to the input
                $output .= '<li class="list-group-item">'.'No results'.'</li>';
            }
            // return output result array
            return $output;
        }
    }



    public function getKategori()
    {
        $getkartu = Kategori::all();
        return $getkartu;
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
