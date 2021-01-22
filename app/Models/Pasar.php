<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasar extends Model
{
    protected $table    = 'tm_pasars';
    protected $fillable = ['id', 'kd_pasar', 'nm_pasar', 'luas_area', 'id_kel', 'id_kec', 'id_kab', 'latitude', 'longitude', 'jumlah_lapak', 'jumlah_pedagang', 'terpakai', 'created_at', 'updated_at'];

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'id_kel');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kec');
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'id_kab');
    }
}
