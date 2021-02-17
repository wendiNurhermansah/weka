<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'tmpelanggan';
    protected $fillable = ['id', 'nama', 'telepon', 'email', 'ccf_1', 'ccf_2', 'created_at', 'updated_at'];
}
