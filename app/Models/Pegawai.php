<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'tmpegawai';
    protected $fillable = ['id', 'nama_depan', 'nama_belakang', 'email', 'group', 'status', 'created_at', 'updated_at'];
}
