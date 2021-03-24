<?php

namespace App\Http\Controllers\laporan;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProdukteratasController extends Controller
{
    public function produkTeratas(){
        return view('Laporan.produkTeratas');
    }
}
