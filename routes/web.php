<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenerimaController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\PengirimController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('login', LoginController::class);
Route::get('register', [LoginController::class, "register"])->name('register');
Route::post('login_check', [LoginController::class, "login_check"])->name('login_check');

Route::group(['middleware' => 'auth'], function () 
{
    Route::resource('pengiriman', PengirimanController::class);
    Route::resource('pegawai', PegawaiController::class);
    Route::resource('pelanggan', PelangganController::class);
    Route::get('pengiriman/{id}/nota', [PengirimanController::class,'nota'])->name('pengiriman.nota');
});