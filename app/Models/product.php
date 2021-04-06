<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'produks';
    protected $fillable = ['gambar', 'nama', 'kategori_id', 'harga_nett', 'harga_pabrik', 'harga_jual', 'discount', 'stock', 'qr_code'];
    public $timestamps = false;
}
