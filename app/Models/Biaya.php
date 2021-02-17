<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biaya extends Model
{
    protected $table = 'tmbiaya';
    protected $fillable = ['id', 'tanggal', 'referensi', 'jumlah', 'catatan', 'dibuat', 'created_at', 'updated_at'];
}
