<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiPelanggan extends Model
{
    protected $table = 'tmtransaksi_pelanggan';
    protected $fillable = ['pelanggan_id','total','dibayar','catatan'];
}
