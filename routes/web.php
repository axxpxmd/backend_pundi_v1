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

    // Master Roles
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
    });

    // Master User
    Route::prefix('master-users')->namespace('MasterUser')->name('master-user.')->group(function () {
        // User
        Route::resource('user', 'UserController');
        Route::post('user/api', 'UserController@api')->name('user.api');
    });
});
