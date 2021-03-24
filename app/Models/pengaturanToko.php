<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pengaturanToko extends Model
{
    protected $table = 'tmtoko';
    protected $fillable = ['id', 'nama', 'kode', 'telepon', 'email', 'alamat', 'kota', 'created_at', 'updated_at'];
}
