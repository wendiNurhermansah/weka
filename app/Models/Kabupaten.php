<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table    = 'kabupatens';
    protected $fillable = ['id', 'kode', 'n_kabupaten', 'provinsi_id', 'created_at', 'updated_at'];
}
