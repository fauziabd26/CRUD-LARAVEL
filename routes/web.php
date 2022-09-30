<?php

use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProvinsiController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('provinsi',[ProvinsiController::class,'index'])->name('provinsi');
Route::get('provinsi_add',[ProvinsiController::class,'create']);
Route::post('provinsi',[ProvinsiController::class,'store']);
Route::get('/provinsi/edit{id}',[ProvinsiController::class,'edit']);
Route::put('/provinsi/update{id}',[ProvinsiController::class,'update']);
Route::get('provinsi{id}',[ProvinsiController::class,'destroy'])->name('prov_del');

Route::get('kecamatan',[KecamatanController::class,'index'])->name('kecamatan');
Route::get('kecamatan_add',[KecamatanController::class,'create']);
Route::post('kecamatan',[KecamatanController::class,'store']);
Route::get('/kecamatan/edit{id}',[KecamatanController::class,'edit']);
Route::put('/kecamatan/update{id}',[KecamatanController::class,'update']);
Route::get('kecamatan{id}',[KecamatanController::class,'destroy'])->name('kec_del');

Route::get('kelurahan',[KelurahanController::class,'index'])->name('kelurahan');
Route::get('kelurahan_add',[KelurahanController::class,'create']);
Route::post('kelurahan',[KelurahanController::class,'store']);
Route::get('/kelurahan/edit{id}',[KelurahanController::class,'edit']);
Route::put('/kelurahan/update{id}',[KelurahanController::class,'update']);
Route::get('kelurahan{id}',[KelurahanController::class,'destroy'])->name('kel_del');

Route::get('pegawai',[PegawaiController::class,'index'])->name('pegawai');
Route::get('pegawai_add',[PegawaiController::class,'create']);
Route::post('pegawai',[PegawaiController::class,'store']);
Route::get('/pegawai/edit{id}',[PegawaiController::class,'edit']);
Route::put('/pegawai/update{id}',[PegawaiController::class,'update']);
Route::get('pegawai{id}',[PegawaiController::class,'destroy'])->name('peg_del');

