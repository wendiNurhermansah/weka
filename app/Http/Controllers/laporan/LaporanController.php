<?php

namespace App\Http\Controllers\laporan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tahun;
use App\Models\Pembayaran;
use App\Models\Laporan_produk;
use DataTables;

class LaporanController extends Controller
{
    public function PenjualanHarian(){
        return view('laporan.penjualanHarian');
    }

    public function PenjualanBulanan(){
        $Tahun = Tahun::find(1);
        return view('laporan.penjualanBulanan', compact('Tahun'));
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
