<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/dashboard', 'DashboardController@index');


    //Role
    Route::get('addpermission/{id}', 'RoleController@permission')->name('addpermission');
    Route::post('storePermission', 'RoleController@storePermission')->name('storePermissions');

    Route::post('role/api', 'RoleController@api')->name('role.api');
    Route::get('getPermission/{id}', 'RoleController@getPermission')->name('getPermissions');
    Route::delete('destroyPermission/{name}', 'RoleController@destroyPermission')->name('destroyPermission');
    Route::resource('role', 'RoleController');





    //permission
    Route::resource('permission', 'PermissionController');
    Route::post('permission/api', 'PermissionController@api')->name('permission.api');

    //pengguna
    Route::resource('pengguna', 'PenggunaController');
    Route::post('pengguna/api', 'PenggunaController@api')->name('pengguna.api');
    Route::get('{id}/editPassword', 'PenggunaController@editPassword')->name('editPassword');
    Route::post('{id}/updatePassword', 'PenggunaController@updatePassword')->name('updatePassword');

    Route::prefix('Pos')->namespace('pos')->name('Pos.')->group(function () {

        //Pos
        Route::resource('main', 'PosController');
        Route::post('main/api', 'PosController@api')->name('main.api');
        Route::post('kategori', 'PosController@kategori')->name('kategori');
        Route::get('cariKategori', 'PosController@cariKategori')->name('cariKategori');
    });

    Route::prefix('Kategori')->namespace('kategori')->name('Kategori.')->group(function () {

            //daftar kategori
            Route::resource('daftarkategori', 'DaftarkategoriController');
            Route::post('daftarketegori/api', 'DaftarkategoriController@api')->name('daftarkategori.api');
            Route::get('tambahkategori', 'DaftarkategoriController@tambahkategori')->name('tambahkategori');
            Route::get('show-data-modal/{id}', 'DaftarkategoriController@showDataModal')->name('daftarkategori.showDataModal');


            //tambah kategori


            //import
            Route::resource('import', 'ImportController');

            //Toko
            Route::resource('toko', 'TokoController');
            Route::post('toko/api', 'TokoController@api')->name('toko.api');
            Route::get('tambahToko', 'TokoController@tambahToko')->name('tambahToko');

     });

    Route::prefix('Orang')->namespace('orang')->name('Orang.')->group(function () {

            //pegawai
            Route::resource('pegawai', 'PegawaiController');
            Route::post('pegawai/api', 'PegawaiController@api')->name('pegawai.api');
            Route::get('tambahpegawai', 'PegawaiController@tambahpegawai')->name('tambahpegawai');


            //pelanggan
            Route::resource('pelanggan', 'PelangganController');
            Route::post('pelanggan/api', 'PelangganController@api')->name('pelanggan.api');
            Route::get('tambahpelanggan', 'PelangganController@tambahpelanggan')->name('tambahpelanggan');

            //pemasok
            Route::resource('pemasok', 'PemasokController');
            Route::post('pemasok/api', 'PemasokController@api')->name('pemasok.api');
            Route::get('tambahpemasok', 'PemasokController@tambahpemasok')->name('tambahpemasok');


    });

    Route::prefix('Pembelian')->namespace('pembelian')->name('Pembelian.')->group(function () {
            //pembelian
            Route::resource('pembelian', 'PembelianController');
            Route::post('pembelian/api', 'PembelianController@api')->name('pembelian.api');
            Route::get('tambahPembelian', 'PembelianController@tambahPembelian')->name('tambahPembelian');
            Route::post('produk', 'PembelianController@produk')->name('produk');
            Route::get('price/{id}', 'PembelianController@price')->name('pembelian.price');
            Route::get('show-data-modal/{id}', 'PembelianController@showDataModal')->name('pembelian.showDataModal');


            //biaya
            Route::resource('biaya', 'BiayaController');
            Route::post('biaya/api', 'BiayaController@api')->name('biaya.api');
            Route::get('tambahbiaya', 'BiayaController@tambahbiaya')->name('tambahbiaya');

    });

    Route::prefix('Hadiah')->namespace('hadiah')->name('Hadiah.')->group(function () {
            Route::resource('hadiah', 'HadiahController');
            Route::post('hadiah/api', 'HadiahController@api')->name('hadiah.api');
            Route::get('tambahHadiah', 'HadiahController@tambahHadiah')->name('tambahHadiah');
    });

    Route::prefix('Laporan')->namespace('laporan')->name('Laporan.')->group(function () {
            Route::get('PenjualanHarian', 'LaporanController@PenjualanHarian')->name('PenjualanHarian');


            Route::get('laporanPendaftaran', 'LaporanController@laporanPendaftaran')->name('laporanPendaftaran');

            //laporan penjualan

            Route::resource('laporanPenjualan', 'LaporanpenjualanController');
            Route::post('laporanPenjualan/api', 'LaporanpenjualanController@api')->name('laporanPenjualan.api');

            // laporan pembayaran
            Route::get('laporanPembayaran', 'LaporanController@laporanPembayaran')->name('laporanPembayaran');
            Route::post('laporanPembayaran/api', 'LaporanController@api')->name('laporanPembayaran.api');

            //laporan bulanan increment decretment tahun / laporan bulanan

            Route::get('PenjualanBulanan', 'LaporanController@PenjualanBulanan')->name('PenjualanBulanan');
            Route::patch('increment/tahun', 'LaporanController@increment')->name('increment');
            Route::patch('decretment/tahun', 'LaporanController@decretment')->name('decretment');

            // Laporan produk teratas
            Route::get('produkTeratas', 'ProdukteratasController@produkTeratas')->name('produkTeratas');

            // laporan produk
            Route::get('laporanProduk', 'LaporanController@laporanProduk')->name('laporanProduk');
            Route::post('laporanProduk/apii', 'LaporanController@apii')->name('laporanProduk.apii');




    });

    Route::prefix('pengaturan')->namespace('pengaturan')->name('pengaturan.')->group(function () {
        Route::resource('main', 'TokoController');

        //Toko
        Route::resource('toko', 'TokoController');
        Route::post('toko/api', 'TokoController@api')->name('toko.api');
        Route::get('tambahToko', 'TokoController@tambahToko')->name('tambahToko');
        Route::get('printer', 'TokoController@printer')->name('printer');
        Route::post('toko/apiprinter', 'TokoController@apiprinter')->name('toko.apiprinter');
    });

    // Produk
    // Route::get('/product', 'ProductsController@index');;
    // Route::get('/tambahproduk', 'AddProductsController@index');
    // Route::post('/product/add', 'AddProductsController@store')->name('addProduct');
    // Route::get('/importproduk', 'ImportProductsController@index');
    Route::post('product/api', 'productsController@api')->name('product.api');
    Route::resource('product', 'ProductsController');
    Route::get('tambahproduk', 'ProductsController@create')->name('tambahproduk');

    // Route::resource('produk', 'productsController');

    // Route::get('tes', function(){
    //     return response()->json([
    //         'status' => 1,
    //         'message' => 'sukses'

    //     ]);
    // })->name('tes');

});
