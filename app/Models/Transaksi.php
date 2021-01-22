<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table    = 'tm_transaksi';
    protected $fillable = ['id', 'kd_transaksi', 'retribusi', 'tgl_bayar', 'jenis_bayar', 'status_bayar', 'id_pedagang'];
}
