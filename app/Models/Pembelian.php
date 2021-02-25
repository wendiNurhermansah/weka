<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table = 'tmpembelian';
    protected $fillable = ['id', 'tanggal', 'referensi', 'total', 'catatan','produk', 'kuantitas', 'biaya_satuan', 'sub_total', 'pemasok', 'diterima', 'lampiran', 'created_at', 'updated_at'];
}
