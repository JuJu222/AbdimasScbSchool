<?php

use App\Http\Controllers\CurrativeMaintenanceController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\PreventiveMaintenanceController;
use App\Http\Controllers\ProjectController;
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
    return view('home', [
        'title' => 'home'
    ]);
});

Route::get('/pemeliharaan', function () {
    return view('pemeliharaan', [
        'title' => 'pemeliharaan'
    ]);
});

Route::get('/perawatan', function () {
    return view('perawatan', [
        'title' => 'perawatan'
    ]);
});

Route::resource('equipments', EquipmentController::class);

Route::resource('projects', ProjectController::class);

Route::get('pemeliharaan/create/{equipment}/{year}', [PreventiveMaintenanceController::class, 'createWithData']);
Route::resource('pemeliharaan', PreventiveMaintenanceController::class);

Route::resource('perawatan', CurrativeMaintenanceController::class);

Route::get('/koordinasi', function () {
    return view('koordinasi', [
        'title' => 'jadwal_koordinasi'
    ]);
});

//TODO tmabah keterangan, biaya, dan quantity di table maintenance
//TODO tambah sekolah
//TODO hilangkan halaman laporan
//TODO tambah kolom realisasi start end di table
//TODO tambah filter ke table
//TODO tambah fitur user
