<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemasok extends Model
{
    protected $table = 'tmpemasok';
    protected $fillable = ['id', 'nama', 'telepon', 'email', 'ccf_1', 'ccf_2', 'created_at', 'updated_at'];
}
