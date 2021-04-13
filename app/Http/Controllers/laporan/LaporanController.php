<?php

namespace App\Http\Controllers\laporan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tahun;
use App\Models\Pembayaran;
use App\Models\Laporan_produk;
use App\Models\Kategori;
use App\Models\Biaya;
use App\Models\Pembelian;
use App\Models\TransaksiPelanggan;
use App\Models\TransaksiPelangganDetail;
use DataTables;
use Carbon\Carbon;

class LaporanController extends Controller
{
    // laporan penjualan Harian

    public function PenjualanHarian(){
        $kat = TransaksiPelanggan::all();

        $time    = Carbon::now();
        $tanggal = $time->toDateString();
        $kategori1 = TransaksiPelanggan::whereDate('created_at', $tanggal)->get();



        $sum1 = Biaya::sum('jumlah');
        $sum2 = Pembelian::sum('total');
        // dd($sum2);
        $sum3 = TransaksiPelanggan::sum('total');
        $sum4 = TransaksiPelanggan::sum('pajak');
        $sum5 = $sum3+$sum4;
        // dd($sum5);

        $time1    = Carbon::now();
        $tanggal1 = $time1->toDateString();
        $total = TransaksiPelanggan::whereDate('created_at', $tanggal1)->sum('total');
        $pajak = TransaksiPelanggan::whereDate('created_at', $tanggal1)->sum('pajak');
        $diskon = TransaksiPelanggan::whereDate('created_at', $tanggal1)->sum('diskon');
        $dibayar = TransaksiPelanggan::whereDate('created_at', $tanggal1)->sum('dibayar');

        $grandtotal3 = $total+$pajak;
        // dd($dibayar);


        // dd($total);


        foreach($kat as $i){
            // dd($i);
            if($i->created_at != ''){
                $start = explode(' ', $i->created_at);
                // dd($start);
                $data =  [
                    [
                        'title' => 'Laporan Penjualan Harian',
                        'start' => $start[0] . 'T' . $start[1],
                        ]
                    ];

            }

                    // dd($data);
                }

        return view('laporan.penjualanHarian', compact(
            'data',
            'sum1',
            'sum2',
            'sum3',
            'sum4',
            'sum5',
            'total',
            'diskon',
            'dibayar',
            'pajak',
            'kategori1',
            'grandtotal3'
        ));
    }



// Laporan penjualan bulanan


    public function PenjualanBulanan(){

        $Tahun = Tahun::find(1);
        $biaya = Biaya::sum('jumlah');
        $pembelian = Pembelian::sum('total');
        $sum6 = TransaksiPelanggan::sum('total');
        $sum7 = TransaksiPelanggan::sum('pajak');
        $sum8 = $sum6+$sum7;

        $time    = Carbon::now();
        $thn = $time->format('Y');
        // dd($thn);

        $total1 = TransaksiPelanggan::whereMonth('created_at', 01)->whereYear('created_at', $thn)->sum('total');
        $pajak1 = TransaksiPelanggan::whereMonth('created_at', 01)->whereYear('created_at', $thn)->sum('pajak');
        $dibayar1 = TransaksiPelanggan::whereMonth('created_at', 01)->whereYear('created_at', $thn)->sum('dibayar');
        $bulan1 = $total1+$pajak1;

        $total2= TransaksiPelanggan::whereMonth('created_at', 02)->whereYear('created_at', $thn)->sum('total');
        $pajak2= TransaksiPelanggan::whereMonth('created_at', 02)->whereYear('created_at', $thn)->sum('pajak');
        $dibayar2 = TransaksiPelanggan::whereMonth('created_at', 02)->whereYear('created_at', $thn)->sum('dibayar');
        $bulan2= $total2+$pajak2;

        $total3 = TransaksiPelanggan::whereMonth('created_at', 03)->whereYear('created_at', $thn)->sum('total');
        $pajak3 = TransaksiPelanggan::whereMonth('created_at', 03)->whereYear('created_at', $thn)->sum('pajak');
        $dibayar3 = TransaksiPelanggan::whereMonth('created_at', 03)->whereYear('created_at', $thn)->sum('dibayar');
        $bulan3 = $total3+$pajak3;

        $total4 = TransaksiPelanggan::whereMonth('created_at', 04)->whereYear('created_at', $thn)->sum('total');
        $pajak4 = TransaksiPelanggan::whereMonth('created_at', 04)->whereYear('created_at', $thn)->sum('pajak');
        $dibayar4 = TransaksiPelanggan::whereMonth('created_at', 04)->whereYear('created_at', $thn)->sum('dibayar');
        $bulan4 = $total4+$pajak4;

        $total5 = TransaksiPelanggan::whereMonth('created_at', 05)->whereYear('created_at', $thn)->sum('total');
        $pajak5 = TransaksiPelanggan::whereMonth('created_at', 05)->whereYear('created_at', $thn)->sum('pajak');
        $dibayar5 = TransaksiPelanggan::whereMonth('created_at', 05)->whereYear('created_at', $thn)->sum('dibayar');
        $bulan5 = $total5+$pajak5;

        $total6 = TransaksiPelanggan::whereMonth('created_at', 06)->whereYear('created_at', $thn)->sum('total');
        $pajak6 = TransaksiPelanggan::whereMonth('created_at', 06)->whereYear('created_at', $thn)->sum('pajak');
        $dibayar6 = TransaksiPelanggan::whereMonth('created_at', 06)->whereYear('created_at', $thn)->sum('dibayar');
        $bulan6 = $total6+$pajak6;

        $total7 = TransaksiPelanggan::whereMonth('created_at', 07)->whereYear('created_at', $thn)->sum('total');
        $pajak7 = TransaksiPelanggan::whereMonth('created_at', 07)->whereYear('created_at', $thn)->sum('pajak');
        $dibayar7 = TransaksiPelanggan::whereMonth('created_at', 07)->whereYear('created_at', $thn)->sum('dibayar');
        $bulan7 = $total7+$pajak7;

        $total8 = TransaksiPelanggan::whereMonth('created_at', 8)->whereYear('created_at', $thn)->sum('total');
        $pajak8 = TransaksiPelanggan::whereMonth('created_at', 8)->whereYear('created_at', $thn)->sum('pajak');
        $dibayar8 = TransaksiPelanggan::whereMonth('created_at', 8)->whereYear('created_at', $thn)->sum('dibayar');
        $bulan8 = $total8+$pajak8;



        $total9 = TransaksiPelanggan::whereMonth('created_at', 9)->whereYear('created_at', $thn)->sum('total');
        $pajak9 = TransaksiPelanggan::whereMonth('created_at', 9)->whereYear('created_at', $thn)->sum('pajak');
        $dibayar9 = TransaksiPelanggan::whereMonth('created_at', 9)->whereYear('created_at', $thn)->sum('dibayar');
        $bulan9 = $total9+$pajak9;


        $total10 = TransaksiPelanggan::whereMonth('created_at', 10)->whereYear('created_at', $thn)->sum('total');
        $pajak10 = TransaksiPelanggan::whereMonth('created_at', 10)->whereYear('created_at', $thn)->sum('pajak');
        $dibayar10 = TransaksiPelanggan::whereMonth('created_at', 10)->whereYear('created_at', $thn)->sum('dibayar');
        $bulan10 = $total10+$pajak10;

        $total11 = TransaksiPelanggan::whereMonth('created_at', 11)->whereYear('created_at', $thn)->sum('total');
        $pajak11 = TransaksiPelanggan::whereMonth('created_at', 11)->whereYear('created_at', $thn)->sum('pajak');
        $dibayar11 = TransaksiPelanggan::whereMonth('created_at', 11)->whereYear('created_at', $thn)->sum('dibayar');
        $bulan11 = $total11+$pajak11;

        $total12 = TransaksiPelanggan::whereMonth('created_at', 122)->whereYear('created_at', $thn)->sum('total');
        $pajak12 = TransaksiPelanggan::whereMonth('created_at', 122)->whereYear('created_at', $thn)->sum('pajak');
        $dibayar12 = TransaksiPelanggan::whereMonth('created_at', 12)->whereYear('created_at', $thn)->sum('dibayar');
        $bulan12 = $total12+$pajak12;




        $laporan1 = TransaksiPelanggan::whereMonth('created_at', 01)->whereYear('created_at', $thn)->sum('total');
        $laporan2 = TransaksiPelanggan::whereMonth('created_at', 02)->whereYear('created_at', $thn)->sum('total');
        $laporan3 = TransaksiPelanggan::whereMonth('created_at', 03)->whereYear('created_at', $thn)->sum('total');
        $laporan4 = TransaksiPelanggan::whereMonth('created_at', 04)->whereYear('created_at', $thn)->sum('total');
        $laporan5 = TransaksiPelanggan::whereMonth('created_at', 05)->whereYear('created_at', $thn)->sum('total');
        $laporan6 = TransaksiPelanggan::whereMonth('created_at', 06)->whereYear('created_at', $thn)->sum('total');
        $laporan7 = TransaksiPelanggan::whereMonth('created_at', 07)->whereYear('created_at', $thn)->sum('total');
        $laporan8 = TransaksiPelanggan::whereMonth('created_at', 8)->whereYear('created_at', $thn)->sum('total');
        $laporan9 = TransaksiPelanggan::whereMonth('created_at', 9)->whereYear('created_at', $thn)->sum('total');
        $laporan10 = TransaksiPelanggan::whereMonth('created_at', 10)->whereYear('created_at', $thn)->sum('total');
        $laporan11 = TransaksiPelanggan::whereMonth('created_at', 11)->whereYear('created_at', $thn)->sum('total');
        $laporan12 = TransaksiPelanggan::whereMonth('created_at', 12)->whereYear('created_at', $thn)->sum('total');

        $pajak1 = TransaksiPelanggan::whereMonth('created_at', 01)->whereYear('created_at', $thn)->sum('pajak');
        $pajak2 = TransaksiPelanggan::whereMonth('created_at', 02)->whereYear('created_at', $thn)->sum('pajak');
        $pajak3 = TransaksiPelanggan::whereMonth('created_at', 03)->whereYear('created_at', $thn)->sum('pajak');
        $pajak4 = TransaksiPelanggan::whereMonth('created_at', 04)->whereYear('created_at', $thn)->sum('pajak');
        $pajak5 = TransaksiPelanggan::whereMonth('created_at', 05)->whereYear('created_at', $thn)->sum('pajak');
        $pajak6 = TransaksiPelanggan::whereMonth('created_at', 06)->whereYear('created_at', $thn)->sum('pajak');
        $pajak7 = TransaksiPelanggan::whereMonth('created_at', 07)->whereYear('created_at', $thn)->sum('pajak');
        $pajak8 = TransaksiPelanggan::whereMonth('created_at', 8)->whereYear('created_at', $thn)->sum('pajak');
        $pajak9 = TransaksiPelanggan::whereMonth('created_at', 9)->whereYear('created_at', $thn)->sum('pajak');
        $pajak10 = TransaksiPelanggan::whereMonth('created_at', 10)->whereYear('created_at', $thn)->sum('pajak');
        $pajak11 = TransaksiPelanggan::whereMonth('created_at', 11)->whereYear('created_at', $thn)->sum('pajak');
        $pajak12 = TransaksiPelanggan::whereMonth('created_at', 12)->whereYear('created_at', $thn)->sum('pajak');



        $diskon1 = TransaksiPelanggan::whereMonth('created_at', 01)->whereYear('created_at', $thn)->sum('diskon');
        $diskon2 = TransaksiPelanggan::whereMonth('created_at', 02)->whereYear('created_at', $thn)->sum('diskon');
        $diskon3 = TransaksiPelanggan::whereMonth('created_at', 03)->whereYear('created_at', $thn)->sum('diskon');
        $diskon4 = TransaksiPelanggan::whereMonth('created_at', 04)->whereYear('created_at', $thn)->sum('diskon');
        $diskon5 = TransaksiPelanggan::whereMonth('created_at', 05)->whereYear('created_at', $thn)->sum('diskon');
        $diskon6 = TransaksiPelanggan::whereMonth('created_at', 06)->whereYear('created_at', $thn)->sum('diskon');
        $diskon7 = TransaksiPelanggan::whereMonth('created_at', 07)->whereYear('created_at', $thn)->sum('diskon');
        $diskon8 = TransaksiPelanggan::whereMonth('created_at', 8)->whereYear('created_at', $thn)->sum('diskon');
        $diskon9 = TransaksiPelanggan::whereMonth('created_at', 9)->whereYear('created_at', $thn)->sum('diskon');
        $diskon10 = TransaksiPelanggan::whereMonth('created_at', 10)->whereYear('created_at', $thn)->sum('diskon');
        $diskon11 = TransaksiPelanggan::whereMonth('created_at', 11)->whereYear('created_at', $thn)->sum('diskon');
        $diskon12 = TransaksiPelanggan::whereMonth('created_at', 12)->whereYear('created_at', $thn)->sum('diskon');






        return view('laporan.penjualanBulanan', compact(
            'Tahun',
            'thn',
            'biaya',
            'sum8',
            'pembelian',
            'bulan1',
            'bulan2',
            'bulan3',
            'bulan4',
            'bulan5',
            'bulan6',
            'bulan7',
            'bulan8',
            'bulan9',
            'bulan10',
            'bulan11',
            'bulan12',
            'laporan1',
            'laporan2',
            'laporan3',
            'laporan4',
            'laporan5',
            'laporan6',
            'laporan7',
            'laporan8',
            'laporan9',
            'laporan10',
            'laporan11',
            'laporan12',
            'pajak1',
            'pajak2',
            'pajak3',
            'pajak4',
            'pajak5',
            'pajak6',
            'pajak7',
            'pajak8',
            'pajak9',
            'pajak10',
            'pajak11',
            'pajak12',
            'diskon1',
            'diskon2',
            'diskon3',
            'diskon4',
            'diskon5',
            'diskon6',
            'diskon7',
            'diskon8',
            'diskon9',
            'diskon10',
            'diskon11',
            'diskon12',
            'dibayar1',
            'dibayar2',
            'dibayar3',
            'dibayar4',
            'dibayar5',
            'dibayar6',
            'dibayar7',
            'dibayar8',
            'dibayar9',
            'dibayar10',
            'dibayar11',
            'dibayar12',



        ));
    }

// Laporan Pembayaran


    public function laporanPembayaran(){
        return view('laporan.laporanPembayaran');
    }

    public function api()
    {
        
        $Pembayaran = TransaksiPelanggan::all();
        // dd($Pemba);
        return Datatables::of($Pembayaran)

        ->editColumn('total', function($p){
            return $p->total+$p->pajak;
        })

       


            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }



// laporan Produk
    public function laporanProduk(){
        return view('laporan.laporanProduk');
    }

    public function apii()
    {
        $Laporan_produk = Laporan_produk::all();
        return Datatables::of($Laporan_produk)



            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }




    //laporan bulanan kalender

    public function increment(){
        $Tahun = Tahun::find(1);

        $Tahun->update([
            'tahun' => (++$Tahun->tahun),
        ]);

        return true;
    }

    public function decretment(){
        $Tahun = Tahun::find(1);

        $Tahun->update([
            'tahun' => (--$Tahun->tahun),
        ]);

        return true;
    }

}
