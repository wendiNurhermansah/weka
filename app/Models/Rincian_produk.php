<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rincian_produk extends Model
{
    protected $table = 'tmproduk_rincian';
    protected $fillable = ['id', 'id_jenis_produk', 'rincian_produk', 'harga', 'stok', 'created_at', 'updated_at'];

    public function JenisProduk(){
        return $this->belongsTo(JenisProduk::class, 'id_jenis_produk');
    }
}
