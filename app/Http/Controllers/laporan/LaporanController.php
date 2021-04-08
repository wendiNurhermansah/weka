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
use DataTables;

class LaporanController extends Controller
{
    public function PenjualanHarian(){
        $kategori = Kategori::all();
        $sum1 = Biaya::sum('jumlah');
        $sum2 = Pembelian::sum('total');
        // dd($sum2);

        foreach($kategori as $i){
            // dd($i);
                $start = explode(' ', $i->created_at);
                // dd($start);
                $data =  [
                    [
                    'title' => 'Laporan Penjualan Harian',
                    'start' => $start[0] . 'T' . $start[1],
                    ]
                    ];
                }

        return view('laporan.penjualanHarian', compact('data', 'sum1', 'sum2'));
    }

// public function data(){
//         $kategori = Kategori::all();
//         // dd($kategori);

//         foreach($kategori as $i){
//             // dd($i);
//                 $start = explode(' ', $i->created_at);
//                 $end = explode (' ', $i->updated_at);
//                 $events[] = array(
//                     'title' => $i->nama,
//                     'start' => $i->start[0] . 'T' . $start[1],
//                     'end'  => $i->end[0] . 'T' . $end[1]
//                 );
//             }

//        dd($start);
//         echo json_encode($events);

// }




    public function PenjualanBulanan(){

        $Tahun = Tahun::find(1);
        $biaya = Biaya::sum('jumlah');
        $pembelian = Pembelian::sum('total');
        return view('laporan.penjualanBulanan', compact('Tahun', 'biaya', 'pembelian'));
    }


    public function laporanPembayaran(){
        return view('laporan.laporanPembayaran');
    }

    public function api()
    {
        $Pembayaran = Pembayaran::all();
        return Datatables::of($Pembayaran)


            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }

    public function laporanPendaftaran(){
        return view('laporan.laporanPendaftaran');
    }

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
