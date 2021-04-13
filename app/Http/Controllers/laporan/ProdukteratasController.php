<?php

namespace App\Http\Controllers\laporan;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\product;
use App\Models\TransaksiPelangganDetail;

class ProdukteratasController extends Controller
{
    public function produkTeratas(){


        $time    = Carbon::now();
        $last  = Carbon::now()->subMonth();
        $triwulan  = Carbon::now()->subMonth(3);
        $setahun = Carbon::now()->subMonth(12);
        $bulan = $time->format('m');
        $bulanTahun = $time->format('M-Y');
        $bulanTahun1 = $last->format('M-Y');
        $bulanTahun2 = $triwulan->format('M-Y');
        $bulanTahun3 = $setahun->format('M-Y');
        // dd($setahun);
       
        // bulan ini
        $produk = TransaksiPelangganDetail::whereMonth( 'created_at', $bulan)->get();

        // dd($produk);

        $categories = [];
        $data = [];
        foreach ($produk as $i){
            $categories[] = $i->product->nama;
            $data[] = $i->kuantitas;
        }

        // satu bulan yang lalu
        $produk1 = TransaksiPelangganDetail::whereMonth( 'created_at', $last)->get();
        // dd($produk1);
        $categories1 = [];
        $data1 = [];
        foreach ($produk1 as $i){
            $categories1[] = $i->product->nama;
            $data1[] = $i->kuantitas;
        }

        // tiga bulan yang lalu 

        $produk2 = TransaksiPelangganDetail::whereBetween('created_at', [$triwulan, $time])->get();
       
        $categories2 = [];
        $data2 = [];
        foreach ($produk2 as $i){
            $categories2[] = $i->product->nama;
            $data2[] = $i->kuantitas;
        }

        // 12 bulan terakhir
        $produk3 = TransaksiPelangganDetail::whereBetween('created_at', [$setahun, $time])->get();
        // dd($produk3);
        $categories3 = [];
        $data3 = [];
        foreach ($produk3 as $i){
            $categories3[] = $i->product->nama;
            $data3[] = $i->kuantitas;
        }


        

        return view('Laporan.produkTeratas', compact('categories', 'data',
        'categories1','data1','categories2', 'data2', 'bulanTahun', 'bulanTahun1',
        'bulanTahun2', 'bulanTahun3', 'categories3', 'data3'

    ));
    }
}
