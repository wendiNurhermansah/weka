<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table = 'tmpembelian';
    protected $fillable = ['id', 'tanggal', 'referensi', 'total', 'catatan', 'created_at', 'updated_at'];
}
