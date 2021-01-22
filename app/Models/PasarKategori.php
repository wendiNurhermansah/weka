<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasarKategori extends Model
{
    protected $table    = 'tm_pasar_kategoris';
    protected $fillable = ['id', 'tm_pasar_id', 'tm_jenis_lapak_id', 'nm_blok', 'luas', 'ukuran', 'retribusi', 'jumlah', 'created_at', 'updated_at'];

    public function pasar()
    {
        return $this->belongsTo(Pasar::class, 'tm_pasar_id');
    }

    public function jenisLapak()
    {
        return $this->belongsTo(JenisLapak::class, 'tm_jenis_lapak_id');
    }
}
