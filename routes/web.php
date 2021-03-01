<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;

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
    return view('utama');
});
Route::get('wlc', function () {
    return view('welcome');
});
// use App\Http\Controllers\ProvinsiController;
// Route::get('/provinsi',[ProvinsiController::class, 'index']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('test',function(){
    return view('layouts.admin');
});


// Route::get('provinsi',function(){
//     return view('provinsi.index');
// });

// use App\Http\Controllers\FrontendController;
// Route::resource('utama',FrontendController::class);

use App\Http\Controllers\FrontendController;
Route::resource('frontend',FrontendController::class);

use App\Http\Controllers\ProvinsiController;
Route::resource('provinsi',ProvinsiController::class);

use App\Http\Controllers\KotaController;
Route::resource('kota',KotaController::class);

use App\Http\Controllers\KecamatanController;
Route::resource('kecamatan',KecamatanController::class);


use App\Http\Controllers\KelurahanController;
Route::resource('kelurahan',KelurahanController::class);


use App\Http\Controllers\RwController;
Route::resource('rw',RwController::class);

use App\Http\Controllers\KasusidController;
Route::resource('kasusid',KasusidController::class);

// use App\Http\Controllers\KelurahanController;
// Route::resource('kelurahan',KelurahanController::class);

// use App\Http\Controllers\RwController;
// Route::resource('rw',RwController::class);


Route::get('admin',function(){
    return view('utama');
});