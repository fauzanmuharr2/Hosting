<?php
use App\Models\Kasusid;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProvinsiController;
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

Route::get('provinsi',[ProvinsiController::class, 'index']);
Route::post('provinsi',[ProvinsiController::class, 'store']);
Route::get('provinsi/{id}',[ProvinsiController::class, 'show']);
Route::delete('provinsi/{id}',[ProvinsiController::class, 'destroy']);
Route::get('kasusid',[ApiController::class, 'index']);
Route::get('provinsi1/{id}',[ApiController::class, 'provinsi']);
Route::get('provinsi2',[ApiController::class, 'seluruhprovinsi']);
Route::get('kota',[ApiController::class, 'seluruhkota']);
Route::get('kecamatan',[ApiController::class, 'seluruhkecamatan']);
Route::get('kelurahan',[ApiController::class, 'seluruhkelurahan']);
Route::get('hari',[ApiController::class, 'hari']);
Route::get('global',[ApiController::class, 'global']);
Route::get('indonesia',[ApiController::class, 'indonesia']);