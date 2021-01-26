<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'tmtransaksi';
    protected $fillable = ['id', 'id_rincian_produk', 'nama_rincian', 'qty', 'harga', 'total', 'diskon', 'id_operator', 'nama_operator', 'tanggal_transaksi', 'jenis_komsumen', 'created_at', 'updated_at'];

    public function Rincian_produk(){
        return $this->belongsTo(Rincian_produk::class, 'id_rincian_produk');
    }

}

