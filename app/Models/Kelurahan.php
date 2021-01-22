<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table    = 'kelurahans';
    protected $fillable = ['id', 'kode', 'n_kelurahan', 'kecamatan_id', 'created_at', 'updated_at'];
}
