<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedagang extends Model
{
    protected $table    = 'tm_pedagangs';
    protected $fillable = ['id', 'nm_pedagang', 'alamat_pedagang', 'no_telp', 'no_ktp', 'created_at', 'updated_at'];
}
