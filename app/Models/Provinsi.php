<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table    = 'provinsis';
    protected $fillable = ['id', 'kode', 'n_provinsi', 'created_at', 'updated_at'];
}
