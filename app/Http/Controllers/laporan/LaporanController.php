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
use Carbon\Carbon;

class LaporanController extends Controller
{
    // laporan penjualan Harian

    public function PenjualanHarian(){
        $kat = Kategori::all();

        $time    = Carbon::now();
        $tanggal = $time->toDateString();
        $kategori1 = Kategori::whereDate('created_at', $tanggal)->get();
        // dd($kategori1);



        $sum1 = Biaya::sum('jumlah');
        $sum2 = Pembelian::sum('total');
        // dd($sum2);

        foreach($kat as $i){
            // dd($i);
                $start = explode(' ', $i->created_at);
                $kode = explode(' ', $i->kode);
                // dd($kode);
                $data =  [
                    [
                    'title' => 'Laporan Penjualan Harian',
                    'kode' => $kode[0],
                    'start' => $start[0] . 'T' . $start[1],
                    ]
                    ];
                    // dd($data);
                }

        return view('laporan.penjualanHarian', compact('data', 'sum1', 'sum2', 'kategori1'));
    }



// Laporan penjualan bulanan


    public function PenjualanBulanan(){

        $Tahun = Tahun::find(1);
        $biaya = Biaya::sum('jumlah');
        $pembelian = Pembelian::sum('total');
        return view('laporan.penjualanBulanan', compact('Tahun', 'biaya', 'pembelian'));
    }

// Laporan Pembayaran


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


// laporan Pendaftaran

    public function laporanPendaftaran(){
        return view('laporan.laporanPendaftaran');
    }


// laporan Pendaftaran
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
