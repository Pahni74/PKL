<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\FrontendController;

Route::get('/',[FrontendController::class,'index']);
// Route::get('/provinsi/{id}',[FrontendController::class,'getKotaProvinsi']);
// Route::get('/kota/{id}',[FrontendController::class,'getKecamatanKota']);
Route::get('/pageapi',[FrontendController::class,'api']);
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/',[DashboardController::class,'index'])->name('admin');
    Route::resource('provinsi', ProvinsiController::class);
    Route::resource('kota', KotaController::class);
    Route::resource('kecamatan', KecamatanController::class);
    Route::resource('kelurahan', KelurahanController::class);
    Route::resource('rw', RwController::class);
    Route::resource('tracking', TrackingController::class);
});
