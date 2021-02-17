<?php

namespace App\Http\Controllers\laporan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function PenjualanHarian(){
        return view('laporan.penjualanHarian');
    }

    public function PenjualanBulanan(){
        return view('laporan.penjualanBulanan');
    }

    public function laporanPenjualan(){
        return view('laporan.laporanPenjualan');
    }

    public function laporanPembayaran(){
        return view('laporan.laporanPembayaran');
    }

    public function laporanPendaftaran(){
        return view('laporan.laporanPendaftaran');
    }

    public function laporanProduk(){
        return view('laporan.laporanProduk');
    }
}
