<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiPelangganDetail extends Model
{
    protected $table = 'tmtransaksi_pelanggan_detail';
    protected $fillable = ['transaksi_detail_id','produk_id','kuantitas','biaya_satuan','sub_total'];
}
