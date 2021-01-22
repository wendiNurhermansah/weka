<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisUsaha extends Model
{
    protected $table    = 'tm_jenis_usaha';
    protected $fillable = ['id', 'nm_kategori', 'created_at', 'updated_at'];
}
