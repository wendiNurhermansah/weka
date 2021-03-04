<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembelian_details extends Model
{
    protected $tablle = 'pembelian_details';
    protected $fillable = ['id', 'tmpembelian_id', 'produk_id', 'kuantitas', 'biaya_satuan', 'sub_total', 'created_at', 'updated_at' ];

    public function Pembelian()
    {
        return $this->belongsTo(Pembelian::class, 'tmpembelian_id');
    }

    public function product()
    {
        return $this->belongsTo(product::class, 'produk_id');
    }


}
