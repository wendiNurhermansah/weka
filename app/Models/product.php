<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'produks';
    protected $fillable = ['nama','kategori','kuantitas','pajak','biaya','harga', 'gambar'];
    public $timestamps = false;
}
