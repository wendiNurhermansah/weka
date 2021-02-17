<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hadiah extends Model
{
    protected $table = 'tmhadiah';
    protected $fillable = ['id', 'card', 'nilai', 'saldo', 'dibuat', 'kedaluwarsa', 'created_at', 'updated_at'];
}
