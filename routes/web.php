<?php

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

Route::get('/maintenance', function () {
    return view('maintenance', [
        'title' => 'maintenance'
    ]);
});

Route::get('/laporan', function () {
    return view('laporan', [
        'title' => 'laporan'
    ]);
});

Route::get('/koordinasi', function () {
    return view('koordinasi', [
        'title' => 'jadwal_koordinasi'
    ]);
});