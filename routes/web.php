<?php

use App\Http\Controllers\AntrianController;
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

Route::get('/', 'App\Http\Controllers\AntrianController@index')->name('antrian.index');

Route::get('/cetak/{id}', 'App\Http\Controllers\AntrianController@cetak')->name('antrian.cetak');

Route::apiResource('antrian', App\Http\Controllers\AntrianController::class)->except('index');

Auth::routes();
Route::middleware(['auth'])->group(function () {
 
 Route::get('/laporan', 'App\Http\Controllers\AntrianController@laporan')->name('data.laporan');
});