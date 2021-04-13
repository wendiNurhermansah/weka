<?php

namespace App\Http\Controllers\laporan;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\product;
use App\Models\TransaksiPelangganDetail;
use Illuminate\Support\Facades\DB;

class ProdukteratasController extends Controller
{
    public function produkTeratas(){


        $time    = Carbon::now();
        $last  = Carbon::now()->subMonth()->format('m');
        $triwulan  = Carbon::now()->subMonth(3)->format('m');
        $setahun = Carbon::now()->subMonth(12)->format('m');
        $bulan = $time->format('m');
        $bulanTahun = $time->format('M-Y');
        $last1  = Carbon::now()->subMonth()->format('M-Y');
        $bulanTahun2 = Carbon::now()->subMonth(3)->format('M-Y');
        $bulanTahun3 = Carbon::now()->subMonth(12)->format('M-Y');
        // dd($triwulan, $bulan);


    // dd($bulan, $last);



        $categoryTotal = DB::select('SELECT produks.nama,tmtransaksi_pelanggan_detail.produk_id,count( tmtransaksi_pelanggan_detail.kuantitas ) AS total FROM tmtransaksi_pelanggan_detail JOIN produks ON produks.id = tmtransaksi_pelanggan_detail.produk_id WHERE MONTH ( tmtransaksi_pelanggan_detail.created_at ) = '.$bulan.' GROUP BY tmtransaksi_pelanggan_detail.produk_id');

        // dd($categoryTotal);
        $categories7 = [];
        $data7 = [];

        foreach($categoryTotal as $i){
            $categories7[] = $i->nama;
            $data7 [] = $i->total;
        }
        // dd($categories7);



        // satu bulan yang lalu
        $produk1 = DB::select('SELECT produks.nama,tmtransaksi_pelanggan_detail.produk_id,count( tmtransaksi_pelanggan_detail.kuantitas ) AS total FROM tmtransaksi_pelanggan_detail JOIN produks ON produks.id = tmtransaksi_pelanggan_detail.produk_id WHERE MONTH ( tmtransaksi_pelanggan_detail.created_at ) = '.$last.' GROUP BY tmtransaksi_pelanggan_detail.produk_id');
        // dd($produk1);

        $data1 = [];
        foreach ($produk1 as $i){
            $categories1[] = $i->nama;
            $data1[] = $i->total;
        }

        // tiga bulan yang lalu

        $produk2 = DB::select('SELECT produks.nama,tmtransaksi_pelanggan_detail.produk_id,count( tmtransaksi_pelanggan_detail.kuantitas ) AS total FROM tmtransaksi_pelanggan_detail JOIN produks ON produks.id = tmtransaksi_pelanggan_detail.produk_id WHERE MONTH ( tmtransaksi_pelanggan_detail.created_at ) BETWEEN '.$triwulan.' AND '.$bulan.' GROUP BY tmtransaksi_pelanggan_detail.produk_id');
        // dd($produk2);

        $data2 = [];
        foreach ($produk2 as $i){
            $categories2[] = $i->nama;
            $data2[] = $i->total;
        }

        // 12 bulan terakhir
        $produk3 = DB::select('SELECT produks.nama,tmtransaksi_pelanggan_detail.produk_id,count( tmtransaksi_pelanggan_detail.kuantitas ) AS total FROM tmtransaksi_pelanggan_detail JOIN produks ON produks.id = tmtransaksi_pelanggan_detail.produk_id WHERE MONTH ( tmtransaksi_pelanggan_detail.created_at ) BETWEEN '.$setahun.' AND '.$bulan.' GROUP BY tmtransaksi_pelanggan_detail.produk_id');
        // dd($produk3);

        $data3 = [];
        foreach ($produk3 as $i){
            $categories3[] = $i->nama;
            $data3[] = $i->total;
        }




        return view('Laporan.produkTeratas', compact('categories7', 'data7','categories1',
        'data1','data2', 'bulanTahun', 'last1','categories2','categories3',
        'bulanTahun2', 'bulanTahun3', 'data3'

    ));
    }
}
