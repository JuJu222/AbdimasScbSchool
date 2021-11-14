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

Route::get('/koordinasi', function () {
    return view('koordinasi', [
        'title' => 'jadwal_koordinasi'
    ]);
});