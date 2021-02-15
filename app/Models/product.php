<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'produks';
    protected $fillable = ['nama','ketik','kategori','kuantitas','pajak','metode','biaya','harga'];
}
