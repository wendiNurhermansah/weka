<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'tmbill';
    protected $fillable = ['id', 'pelanggan_id', 'nota', 'itemTotal', 'created_at', 'updated_at'];

}
