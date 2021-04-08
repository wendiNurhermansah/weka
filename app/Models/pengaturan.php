<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pengaturan extends Model
{
    protected $table = 'pengaturans';
    protected $fillable = ['nama_situs','kode_pin','telepon','pembulatan','bahasa','tampilkan_produk','tema','batas_tampilan_produk','gaya_tema','display_keyboard','overselling','penambahan_barang','beberapa_toko','kategori_default','kode_mata_uang','pelanggan_default','tanda_terima_cetak_otomatis','timezone','halaman_purna_jual','format_tanggal','diskon_default','format_waktu','pajak_pesanan_default','email_default','baris_per_halaman','dukungan_rtl','ws_barcode_type','ws_barcode_chars','flag_chars','item_code_stars','item_code_chars','weight_stars','weight_chars','weight_divide_by','protokol_email','desimal','desimal_kuantitas','format_mata_uang','pemisah_desimal','ribuan_pemisah','tampilkan_simbol_mata_uang','simbol_mata_uang','stripe','stripe_secret_key','stripe_kunci_yang_dapat_dipublikasikan','fokus_tambahkan_cari_input_barang','tambahkan_pelanggan','toggle_category_slider','batalkan_penjualan','tangguhkan_penjualan','cetak_pesanan','cetak_bill','finalisasi_penjualan','penjualan_hari_ini','tagihan_terbuka','tutup_penjualan'];
    public $timestamps = false;
}
