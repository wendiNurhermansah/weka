<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){

        $time    = Carbon::now();
        $bulan = $time->format('m');


        $categoryTotal = DB::select('SELECT produks.nama,tmtransaksi_pelanggan_detail.produk_id,count( tmtransaksi_pelanggan_detail.kuantitas ) AS total FROM tmtransaksi_pelanggan_detail JOIN produks ON produks.id = tmtransaksi_pelanggan_detail.produk_id WHERE MONTH ( tmtransaksi_pelanggan_detail.created_at ) = '.$bulan.' GROUP BY tmtransaksi_pelanggan_detail.produk_id');

        // dd($categoryTotal);
        $categories = [];
        $data = [];

        foreach($categoryTotal as $i){
            $categories [] = $i->nama;
            $data [] = $i->total;
        }
        return view('dashboard', compact('categories', 'data')) ;
    }
}
