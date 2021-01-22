<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $table    = 'template';
    protected $fillable = ['id', 'logo', 'logo_title', 'logo_auth', 'created_at', 'updated_at'];
}
