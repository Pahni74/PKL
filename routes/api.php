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

Route::get('global',[ApiController::class,'global']);
Route::get('indonesia',[ApiController::class,'indonesia']);
Route::get('provinsi',[ApiController::class,'provinsi']);
Route::get('provinsi/{id}',[ApiController::class,'singelprovinsi']);
Route::get('kota',[ApiController::class,'kota']);
Route::get('kota/{id}',[ApiController::class,'singelkota']);
Route::get('kecamatan',[ApiController::class,'kecamatan']);
Route::get('kecamatan/{id}',[ApiController::class,'singelkecamatan']);
Route::get('kelurahan',[ApiController::class,'kelurahan']);
Route::get('kelurahan/{id}',[ApiController::class,'singelkelurahan']);
Route::get('rw',[ApiController::class,'rw']);
Route::get('rw/{id}',[ApiController::class,'singelrw']);
Route::get('positif',[ApiController::class,'positif']);
Route::get('sembuh',[ApiController::class,'sembuh']);
Route::get('meninggal',[ApiController::class,'meninggal']);
