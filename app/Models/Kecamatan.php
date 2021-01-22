<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table    = 'kecamatans';
    protected $fillable = ['id', 'kode', 'n_kecamatan', 'kabupaten_id', 'created_at', 'updated_at'];
}
