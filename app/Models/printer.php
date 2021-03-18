<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class printer extends Model
{
    protected $table = 'printers';
    protected $fillable = ['judul', 'ketik', 'profil', 'jalan', 'alamat_ip', 'port'];
    public $timestamps = false;
}
