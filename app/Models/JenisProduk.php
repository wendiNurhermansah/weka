<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisProduk extends Model
{
    protected $table = 'tmjenis_produk';
    protected $fillable = ['id', 'jenis_produk', 'created_at', 'updated_at'];
}
