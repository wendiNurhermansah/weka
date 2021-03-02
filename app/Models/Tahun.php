<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tahun extends Model
{
   protected $table = 'tahun';
   protected $fillable = ['id', 'tahun'];

   public $timestamps = false;
}
