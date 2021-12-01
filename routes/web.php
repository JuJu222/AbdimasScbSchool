<?php

use App\Http\Controllers\CoordinationController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('equipments', EquipmentController::class);

    Route::resource('projects', ProjectController::class);

    Route::get('pemeliharaan/create/{school_id}/{year_plan}/{equipment_id}', [PreventiveMaintenanceController::class, 'createWithData'])->name('pemeliharaan.createWithData');
    Route::get('pemeliharaan/lapor/{id}', [PreventiveMaintenanceController::class, 'lapor'])->name('pemeliharaan.lapor');
    Route::post('pemeliharaan/laporStore/{id}', [PreventiveMaintenanceController::class, 'laporStore'])->name('pemeliharaan.laporStore');
    Route::delete('pemeliharaan/{id}', [PreventiveMaintenanceController::class, 'destroy'])->name('pemeliharaan.delete');
    Route::post('pemeliharaan/deleteMany', [PreventiveMaintenanceController::class, 'destroyMany'])->name('pemeliharaan.deleteMany');
    Route::resource('pemeliharaan', PreventiveMaintenanceController::class, ['only' => ['index']]);

    Route::get('perawatan/create/{school_id}/{year_plan}/{project_id}', [CurrativeMaintenanceController::class, 'createWithData'])->name('perawatan.createWithData');
    Route::get('perawatan/lapor/{id}', [CurrativeMaintenanceController::class, 'lapor'])->name('perawatan.lapor');
    Route::post('perawatan/laporStore/{id}', [CurrativeMaintenanceController::class, 'laporStore'])->name('perawatan.laporStore');
    Route::delete('perawatan/{id}', [CurrativeMaintenanceController::class, 'destroy'])->name('perawatan.delete');
    Route::post('perawatan/deleteMany', [CurrativeMaintenanceController::class, 'destroyMany'])->name('perawatan.deleteMany');
    Route::resource('perawatan', CurrativeMaintenanceController::class);

    Route::get('koordinasi/lapor/{id}', [CoordinationController::class, 'lapor'])->name('koordinasi.lapor');
    Route::post('koordinasi/laporStore/{id}', [CoordinationController::class, 'laporStore'])->name('koordinasi.laporStore');
    Route::resource('koordinasi', CoordinationController::class);

//    Route::middleware(['user'])->group(function () {
//        Route::resource('pemeliharaan', PreventiveMaintenanceController::class, ['except' => ['edit', 'update', 'destroy']]);
//    });
//
    Route::middleware(['admin'])->group(function () {
        Route::resource('pemeliharaan', PreventiveMaintenanceController::class, ['except' => ['index']]);
    });
});
