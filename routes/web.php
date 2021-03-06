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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {

    /**
     * Master Role
     */
    Route::prefix('master-roles')->namespace('MasterRole')->name('master-role.')->group(function () {
        // Role
        Route::resource('role', 'RoleController');
        Route::prefix('role')->name('role.')->group(function () {
            Route::post('api', 'RoleController@api')->name('api');
            Route::get('{id}/addPermissions', 'RoleController@permission')->name('addPermissions');
            Route::post('storePermissions', 'RoleController@storePermission')->name('storePermissions');
            Route::get('{id}/getPermissions', 'RoleController@getPermissions')->name('getPermissions');
            Route::delete('{name}/destroyPermission', 'RoleController@destroyPermission')->name('destroyPermission');
        });
        // Permission
        Route::resource('permission', 'PermissionController');
        Route::post('permission/api', 'PermissionController@api')->name('permission.api');
        // Pegawai
        Route::resource('pegawai', 'PegawaiController');
        Route::post('pegawai/api', 'PegawaiController@api')->name('pegawai.api');
        Route::get('pegawai/{id}/editPassword', 'PegawaiController@editPassword')->name('pegawai.editPassword');
        Route::post('pegawai/{id}/updatePassword', 'PegawaiController@updatePassword')->name('pegawai.updatePassword');
    });

    /**
     * Master User
     */
    Route::prefix('master-users')->namespace('MasterUser')->name('master-user.')->group(function () {
        // User
        Route::resource('user', 'UserController');
        Route::post('user/api', 'UserController@api')->name('user.api');
    });

    /**
     * Master Artikel
     */
    Route::prefix('master-artikels')->namespace('MasterArtikel')->name('master-artikel.')->group(function () {
        // Artikel Terverifikasi
        Route::resource('artikel-terverifikasi', 'TerverifikasiController');
        Route::prefix('artikel-terverifikasi')->name('artikel-terverifikasi.')->group(function () {
            Route::post('api', 'TerverifikasiController@api')->name('api');
            Route::get('subKategoriBykategori/{id}', 'TerverifikasiController@subKategoriBykategori')->name('subKategoriBykategori');
            Route::put('publish-artikel/{id}', 'TerverifikasiController@publishArtikel')->name('publish-artikel');
            Route::put('unpublish-artikel/{id}', 'TerverifikasiController@unpublishArtikel')->name('unpublish-artikel');
            Route::put('update-artikel/{id}', 'TerverifikasiController@updateArtikel')->name('update-artikel');
        });
        // Artikel Belum Terverifikasi
        Route::resource('artikel-belumTerverifikasi', 'UnverifikasiController');
        Route::prefix('artikel-belumTerverifikasi')->name('artikel-belumTerverifikasi.')->group(function () {
            Route::post('api', 'UnverifikasiController@api')->name('api');
            Route::get('subKategoriBykategori/{id}', 'UnverifikasiController@subKategoriBykategori')->name('subKategoriBykategori');
            Route::put('publish-artikel/{id}', 'UnverifikasiController@publishArtikel')->name('publish-artikel');
            Route::put('unpublish-artikel/{id}', 'UnverifikasiController@unpublishArtikel')->name('unpublish-artikel');
            Route::put('update-artikel/{id}', 'TerverifikasiController@updateArtikel')->name('update-artikel');
        });
    });

    /**
     * Master Gambar
     */
    Route::prefix('master-gambar')->namespace('MasterGambar')->name('master-gambar.')->group(function () {
        // Gambar
        Route::resource('gambar', 'GambarController');
        Route::post('gambar/api', 'GambarController@api')->name('gambar.api');
    });

    /**
     * Page Not Found
     */
    Route::get('blank-page', 'BlankPageController@index')->name('blank-page');

    /**
     * Master Konsultasi
     */
    Route::prefix('master-konsultasi')->namespace('MasterKonsultasi')->name('master-konsultasi.')->group(function () {
        // Konsultasi
        Route::resource('konsultasi', 'KonsultasiController');
        Route::post('konsultasi.api', 'KonsultasiController@api')->name('konsultasi.api');
        // Pertanyaan
        Route::resource('pertanyaan', 'PertanyaanController');
        Route::post('pertanyaan.api', 'PertanyaanController@api')->name('pertanyaan.api');
    });

    /**
     * Master Komen
     */
    Route::prefix('master-komen')->namespace('MasterKomen')->name('master-komen.')->group(function () {
        // Komen
        Route::resource('komen', 'KomenController');
        Route::post('komen.api', 'KomenController@api')->name('komen.api');
    });
});
