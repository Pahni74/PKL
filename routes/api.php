<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/provinsi',[ApiController::class,'provinsi']);
// Route::get('/provinsi/{id}',[ApiController::class,'provinsi']);
Route::get('/rw',[ApiController::class,'rw']);
// Route::post('/provinsis/store',[ProvinsiController::class,'store']);
// Route::get('/provinsis/{id}',[ProvinsiController::class,'show']);
// Route::put('/provinsi/update/{id}', [ProvinsiController::class, 'update']);
// Route::delete('/provinsis/{id}',[ProvinsiController::class,'destroy']);
