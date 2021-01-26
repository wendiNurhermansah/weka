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



Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');


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


    //jenis Barang
    Route::resource('JenisProduk', 'JenisprodukController');
    Route::post('JenisProduk/api', 'JenisprodukController@api')->name('JenisProduk.api');

    //rincian Produk
    Route::resource('rincianProduk', 'Rincianprodukcontroller');
    Route::post('rincianProduk/api', 'RincianprodukController@api')->name('rincianProduk.api');

    //transaksi
    Route::resource('transaksi', 'TransaksiController');
    Route::post('transaksi/api', 'TransaksiController@api')->name('transaksi.api');





