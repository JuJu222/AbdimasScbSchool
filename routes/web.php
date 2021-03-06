<?php

use App\Http\Controllers\CoordinationController;
use App\Http\Controllers\CurrativeMaintenanceController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\PreventiveMaintenanceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\UserController;
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

Route::get('/video', function () {
    return view('listvideo', [
        'title' => 'list_video'
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
    Route::resource('equipments', EquipmentController::class, ['only' => ['index', 'store', 'create']]);

    Route::resource('projects', ProjectController::class, ['only' => ['index', 'store', 'create']]);

    Route::get('pemeliharaan/create/{school_id}/{year_plan}/{equipment_id}', [PreventiveMaintenanceController::class, 'createWithData'])->name('pemeliharaan.createWithData');
    Route::get('pemeliharaan/lapor/{id}', [PreventiveMaintenanceController::class, 'lapor'])->name('pemeliharaan.lapor');
    Route::post('pemeliharaan/laporStore/{id}', [PreventiveMaintenanceController::class, 'laporStore'])->name('pemeliharaan.laporStore');
    Route::resource('pemeliharaan', PreventiveMaintenanceController::class, ['only' => ['index', 'store']]);

    Route::get('perawatan/create/{school_id}/{year_plan}/{project_id}', [CurrativeMaintenanceController::class, 'createWithData'])->name('perawatan.createWithData');
    Route::get('perawatan/lapor/{id}', [CurrativeMaintenanceController::class, 'lapor'])->name('perawatan.lapor');
    Route::post('perawatan/laporStore/{id}', [CurrativeMaintenanceController::class, 'laporStore'])->name('perawatan.laporStore');
    Route::resource('perawatan', CurrativeMaintenanceController::class, ['only' => ['index', 'store']]);

    Route::get('koordinasi/lapor/{id}', [CoordinationController::class, 'lapor'])->name('koordinasi.lapor');
    Route::post('koordinasi/laporStore/{id}', [CoordinationController::class, 'laporStore'])->name('koordinasi.laporStore');
    Route::resource('koordinasi', CoordinationController::class, ['only' => ['index', 'store', 'create']]);

    Route::middleware(['admin'])->group(function () {
        Route::post('users/deleteMany', [UserController::class, 'destroyMany'])->name('users.deleteMany');
        Route::resource('users', UserController::class);

        Route::post('schools/deleteMany', [SchoolController::class, 'destroyMany'])->name('schools.deleteMany');
        Route::resource('schools', SchoolController::class);

        Route::post('equipments/deleteMany', [EquipmentController::class, 'destroyMany'])->name('equipments.deleteMany');
        Route::resource('equipments', EquipmentController::class, ['except' => ['index', 'store', 'create']]);

        Route::post('projects/deleteMany', [ProjectController::class, 'destroyMany'])->name('projects.deleteMany');
        Route::resource('projects', ProjectController::class, ['except' => ['index', 'store', 'create']]);

        Route::post('pemeliharaan/deleteMany', [PreventiveMaintenanceController::class, 'destroyMany'])->name('pemeliharaan.deleteMany');
        Route::post('pemeliharaan/destroyImage/{id}', [PreventiveMaintenanceController::class, 'destroyImage'])->name('pemeliharaan.destroyImage');
        Route::resource('pemeliharaan', PreventiveMaintenanceController::class, ['except' => ['index', 'store']]);

        Route::post('perawatan/deleteMany', [CurrativeMaintenanceController::class, 'destroyMany'])->name('perawatan.deleteMany');
        Route::post('perawatan/destroyImage/{id}', [CurrativeMaintenanceController::class, 'destroyImage'])->name('perawatan.destroyImage');
        Route::resource('perawatan', CurrativeMaintenanceController::class, ['except' => ['index', 'store']]);

        Route::post('koordinasi/deleteMany', [CoordinationController::class, 'destroyMany'])->name('koordinasi.deleteMany');
        Route::post('koordinasi/destroyImage/{id}', [CoordinationController::class, 'destroyImage'])->name('koordinasi.destroyImage');
        Route::resource('koordinasi', CoordinationController::class, ['except' => ['index', 'store', 'create']]);
    });
});
