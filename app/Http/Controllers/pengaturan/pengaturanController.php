<?php

namespace App\Http\Controllers\pengaturan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\pengaturan;


class pengaturanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaturan = pengaturan::first();
        // dd($pengaturan);

        return view('pengaturan.pengaturan', compact('pengaturan'));
    }
    public function update(Request $request, $id)
    {
        $pengaturan = pengaturan::first();
        // dd($pengaturan);

        return view('pengaturan.pengaturan', compact('pengaturan'));
    }
}

//     public function create()
//     {
//         //
//     }

//     public function edit(pengaturans $pengaturan, $id)
//     {
//         $pengaturan = pengaturan::all();
//         return view('pengaturan.pengaturan');
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\Models\product
//      * @return \Illuminate\Http\Response
//      */


//         $pengaturan = pengaturan::findOrFail($id);
//         $nama_situs = $request->nama_situs;
//         $kode_pin = $request->kode_pin;
//         $telepon = $request->$telepon;
//         $pembulatan = $request->$pembulatan;
//         $bahasa = $request->$bahasa;
//         $tampilkan_produk = $request->tampilkan_produk;
//         $batas_tampilan_produk = $request->batas_tampilan_produk;
//         $gaya_tema = $request->gaya_tema;
//         $display_keyboard = $request->display_keyboard;
//         $overselling = $request->overselling;
//         $penambahan_barang = $request->penambahan_barang;
//         $beberapa_toko = $request->beberapa_toko;
//         $kategori_default = $request->kategori_default;
//         $kode_mata_uang = $request->kode_mata_uang;
//         $pelanggan_default = $request->pelanggan_default;
//         $tanda_terima_cetak_otomatis = $request->tanda_terima_cetak_otomatis;
//         $timezone = $request->timezone;
//         $halaman_purna_jual = $request->halaman_purna_jual;
//         $format_tanggal = $request->format_tanggal;
//         $diskon_default = $request->diskon_default;
//         $format_waktu = $request->format_waktu;
//         $pajak_pesanan_default = $request->pajak_pesanan_default;
//         $email_default = $request->email_default;
//         $baris_per_halaman = $request->baris_per_halaman;
//         $dukungan_rtl = $request->dukungan_rtl;
//         $ws_barcode_type = $request->ws_barcode_type;
//         $ws_barcode_chars = $request->ws_barcode_chars;
//         $flag_chars = $request->flag_chars;
//         $item_code_stars = $request->item_code_stars;
//         $item_code_chars = $request->item_code_chars;
//         $weight_stars = $request->weight_stars;
//         $weight_chars = $request->weight_chars;
//         $weight_divide_by = $request->weight_divide_by;
//         $protokol_email = $request->protokol_email;
//         $desimal = $request->desimal;
//         $desimal_kuantitas = $request->desimal_kuantitas;
//         $format_mata_uang = $request->format_mata_uang;
//         $pemisah_desimal = $request->pemisah_desimal;
//         $ribuan_pemisah = $request->ribuan_pemisah;
//         $tampilkan_simbol_mata_uang = $request->tampilkan_simbol_mata_uang;
//         $simbol_mata_uang = $request->simbol_mata_uang;
//         $stripe = $request->stripe;
//         $stripe_secret_key = $request->stripe_secret_key;
//         $stripe_kunci_yang_dapat_dipublikasikan = $request->stripe_kunci_yang_dapat_dipublikasikan;
//         $fokus_tambahkan_cari_input_barang = $request->fokus_tambahkan_cari_input_barang;
//         $tambahkan_pelanggan = $request->tambahkan_pelanggan;
//         $batalkan_penjualan = $request->batalkan_penjualan;
//         $tangguhkan_penjualan = $request->tangguhkan_penjualan;
//         $cetak_pesanan = $request->cetak_pesanan;
//         $cetak_bill = $request->cetak_bill;
//         $finalisasi_penjualan = $request->finalisasi_penjualan;
//         $penjualan_hari_ini = $request->penjualan_hari_ini;
//         $tagihan_terbuka = $request->tagihan_terbuka;
//         $tutup_penjualan = $request->tutup_penjualan

//         $pengaturan->update([
//             'nama_situs' => $nama_situs,
//             'kode_pin' => $kode_pin,
//             'telepon' => $telepon,
//             'pembulatan' => $pembulatan,
//             'bahasa' => $bahasa,
//             'tampilkan_produk' => $tampilkan_produk,
//             'tema' => $tema,
//             'batas_tampilan_produk' => $batas_tampilan_produk,
//             'gaya_tema' => $gaya_tema,
//             'display_keyboard' => $display_keyboard,
//             'overselling' => $overselling,
//             'penambahan_barang' => $penambahan_barang,
//             'beberapa_toko' => $beberapa_toko,
//             'kategori_default' => $kategori_default,
//             'kode_mata_uang' => $kode_mata_uang,
//             'pelanggan_default' => $pelanggan_default,
//             'tanda_terima_cetak_otomatis' => $tanda_terima_cetak_otomatis,
//             'timezone' => $timezone,
//             'halaman_purna_jual' => $halaman_purna_jual,
//             'format_tanggal' => $format_tanggal,
//             'diskon_default' => $diskon_default,
//             'format_waktu' => $format_waktu,
//             'pajak_pesanan_default' => $pajak_pesanan_default,
//             'email_default' => $email_default,
//             'baris_per_halaman' => $baris_per_halaman,
//             'dukungan_rtl' => $dukungan_rtl,
//             'ws_barcode_type' => $ws_barcode_type,
//             'ws_barcode_chars' => $ws_barcode_chars,
//             'flag_chars' => $flag_chars,
//             'item_code_stars' => $item_code_stars,
//             'item_code_chars' => $item_code_chars,
//             'weight_stars' => $weight_stars,
//             'weight_chars' => $weight_chars,
//             'weight_divide_by' => $weight_divide_by,
//             'protokol_email' => $protokol_email,
//             'desimal' => $desimal,
//             'desimal_kuantitas' => $desimal_kuantitas,
//             'format_mata_uang' => $format_mata_uang,
//             'pemisah_desimal' => $pemisah_desimal,
//             'ribuan_pemisah' => $ribuan_pemisah,
//             'tampilkan_simbol_mata_uang' => $tampilkan_simbol_mata_uang,
//             'simbol_mata_uang' => $simbol_mata_uang,
//             'stripe' => $stripe,
//             'stripe_secret_key' => $stripe_secret_key,
//             'stripe_kunci_yang_dapat_dipublikasikan' => $stripe_kunci_yang_dapat_dipublikasikan,
//             'fokus_tambahkan_cari_input_barang' => $fokus_tambahkan_cari_input_barang,
//             'tambahkan_pelanggan' => $tambahkan_pelanggan,
//             'toggle_category_slider' => $toggle_category_slider,
//             'batalkan_penjualan' => $batalkan_penjualan,
//             'tangguhkan_penjualan' => $tangguhkan_penjualan,
//             'cetak_pesanan' => $cetak_pesanan,
//             'cetak_bill' => $cetak_bill,
//             'finalisasi_penjualan' => $finalisasi_penjualan,
//             'penjualan_hari_ini' => $penjualan_hari_ini,
//             'tagihan_terbuka' => $tagihan_terbuka,
//             'tutup_penjualan' => $tutup_penjualan

//     // } else {
//     //     $pengaturan->update([
//     //         'nama_situs' => $nama_situs,
//     //         'kode_pin' => $kode_pin,
//     //         'telepon' => $telepon,
//     //         'pembulatan' => $pembulatan,
//     //         'bahasa' => $bahasa,
//     //         'tampilkan_produk' => $tampilkan_produk,
//     //         'tema' => $tema,
//     //         'batas_tampilan_produk' => $batas_tampilan_produk,
//     //         'gaya_tema' => $gaya_tema,
//     //         'display_keyboard' => $display_keyboard,
//     //         'overselling' => $overselling,
//     //         'penambahan_barang' => $penambahan_barang,
//     //         'beberapa_toko' => $beberapa_toko,
//     //         'kategori_default' => $kategori_default,
//     //         'kode_mata_uang' => $kode_mata_uang,
//     //         'pelanggan_default' => $pelanggan_default,
//     //         'tanda_terima_cetak_otomatis' => $tanda_terima_cetak_otomatis,
//     //         'timezone' => $timezone,
//     //         'halaman_purna_jual' => $halaman_purna_jual,
//     //         'format_tanggal' => $format_tanggal,
//     //         'diskon_default' => $diskon_default,
//     //         'format_waktu' => $format_waktu,
//     //         'pajak_pesanan_default' => $pajak_pesanan_default,
//     //         'email_default' => $email_default,
//     //         'baris_per_halaman' => $baris_per_halaman,
//     //         'dukungan_rtl' => $dukungan_rtl,
//     //         'ws_barcode_type' => $ws_barcode_type,
//     //         'ws_barcode_chars' => $ws_barcode_chars,
//     //         'flag_chars' => $flag_chars,
//     //         'item_code_stars' => $item_code_stars,
//     //         'item_code_chars' => $item_code_chars,
//     //         'weight_stars' => $weight_stars,
//     //         'weight_chars' => $weight_chars,
//     //         'weight_divide_by' => $weight_divide_by,
//     //         'protokol_email' => $protokol_email,
//     //         'desimal' => $desimal,
//     //         'desimal_kuantitas' => $desimal_kuantitas,
//     //         'format_mata_uang' => $format_mata_uang,
//     //         'pemisah_desimal' => $pemisah_desimal,
//     //         'ribuan_pemisah' => $ribuan_pemisah,
//     //         'tampilkan_simbol_mata_uang' => $tampilkan_simbol_mata_uang,
//     //         'simbol_mata_uang' => $simbol_mata_uang,
//     //         'stripe' => $stripe,
//     //         'stripe_secret_key' => $stripe_secret_key,
//     //         'stripe_kunci_yang_dapat_dipublikasikan' => $stripe_kunci_yang_dapat_dipublikasikan,
//     //         'fokus_tambahkan_cari_input_barang' => $fokus_tambahkan_cari_input_barang,
//     //         'tambahkan_pelanggan' => $tambahkan_pelanggan,
//     //         'toggle_category_slider' => $toggle_category_slider,
//     //         'batalkan_penjualan' => $batalkan_penjualan,
//     //         'tangguhkan_penjualan' => $tangguhkan_penjualan,
//     //         'cetak_pesanan' => $cetak_pesanan,
//     //         'cetak_bill' => $cetak_bill,
//     //         'finalisasi_penjualan' => $finalisasi_penjualan,
//     //         'penjualan_hari_ini' => $penjualan_hari_ini,
//     //         'tagihan_terbuka' => $tagihan_terbuka,
//     //         'tutup_penjualan' => $tutup_penjualan
//     //     ]);
//     // }
//     return view('Produk/DaftarProduk')->with('status', 'data berhasil diubah');
// }

// }
