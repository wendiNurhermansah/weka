<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill_detail extends Model
{
    protected $table = 'tmbill_detail';
    protected $fillable = ['id', 'produk_id', 'biaya', 'kuantitas', 'Totalsub', 'created_at', 'updated_at'];
}
