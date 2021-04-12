<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiPelanggan extends Model
{
    protected $table = 'tmtransaksi_pelanggan';
    protected $fillable = ['pelanggan_id','total','diskon','pajak','qty','dibayar','metode','catatan','created_at','update_at'];

    public function Pelanggan(){
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }

}
