<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiPelangganDetail extends Model
{
    protected $table = 'tmtransaksi_pelanggan_detail';
    protected $fillable = ['transaksi_detail_id','produk_id','kuantitas','biaya_satuan','sub_total'];

    public function TransaksiPelanggan()
    {
        return $this->belongsTo(TransaksiPelanggan::class, 'transaksi_detail_id');
    }

    public function product()
    {
        return $this->belongsTo(product::class, 'produk_id');
    }
}
