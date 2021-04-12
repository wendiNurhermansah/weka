<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class daftarPenjualan extends Model
{
    protected $table = 'daftar_penjualans';
    protected $fillable = ['tanggal', 'pelanggan', 'total', 'pajak', 'diskon', 'grand_total', 'dibayar', 'status'];
    public $timestamps = false;
}
