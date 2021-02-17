<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'tmkategori';
    protected $fillable = ['id', 'kode', 'nama', 'gambar', 'created_at', 'updated_at'];
}
