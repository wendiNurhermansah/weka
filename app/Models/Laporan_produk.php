<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan_produk extends Model
{
    protected $table = 'tmlaporan_produk';
    protected $fillable = ['id', 'kode', 'nama', 'terjual', 'pajak', 'biaya', 'penghasilan', 'untung', 'created_at', 'updated_at'];
}
