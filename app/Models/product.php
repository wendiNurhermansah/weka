<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'produks';
    protected $fillable = ['nama', 'kategori_id', 'harga_pabrik', 'discount', 'harga_nett', 'harga_jual', 'stock'];
    public $timestamps = false;
}


