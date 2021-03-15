<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'tmpembayaran';
    protected $fillable = ['id', 'tanggal', 'referensi', 'tidak_dijual', 'dibayar_dengan', 'jumlah', 'created_at', 'updated_at'];
}
