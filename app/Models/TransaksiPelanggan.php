<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiPelanggan extends Model
{
    protected $table = 'tmtransaksi_pelanggan';
<<<<<<< HEAD
    protected $fillable = ['pelanggan_id','total','diskon','pajak','dibayar','catatan','created_at','update_at'];


=======
    protected $fillable = ['pelanggan_id','total','diskon','pajak','dibayar','metode','catatan','created_at','update_at'];

    public function Pelangan(){
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }
>>>>>>> 5e42751d2eb4da6070e25f8fd80d6d2d046e1d51
}
