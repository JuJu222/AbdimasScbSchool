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
    return view('newhome', [
        'title' => 'home'
    ]);
});

Route::get('/login', function () {
    return view('/user/login', [
        'title' => 'login'
    ]);
});

Route::get('/register', function () {
    return view('/user/register', [
        'title' => 'register'
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

Route::get('pemeliharaan/create/{equipment_id}/{year_plan}', [PreventiveMaintenanceController::class, 'createWithData']);
Route::get('pemeliharaan/lapor/{equipment_id}', [PreventiveMaintenanceController::class, 'lapor'])->name('pemeliharaan.lapor');
Route::resource('pemeliharaan', PreventiveMaintenanceController::class);

Route::resource('perawatan', CurrativeMaintenanceController::class);

Route::get('/koordinasi', function () {
    return view('koordinasi', [
        'title' => 'jadwal_koordinasi'
    ]);
});
