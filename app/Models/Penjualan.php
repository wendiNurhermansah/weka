<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'tmlaporan_penjualan';
    protected $fillable = ['id', 'tanggal', 'pelanggan', 'total', 'pajak', 'diskon', 'grand_total', 'dibayar', 'saldo', 'status', 'created_at', 'updated_at'];
}
