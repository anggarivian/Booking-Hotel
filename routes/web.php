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
    return view('landingpage');
});

Auth::routes();

Route::get('/landingpage', [App\Http\Controllers\HomeController::class, 'index'])->name('landingpage');

Auth::routes();

Route::get('/landingpage/detail', function() {
    return view('detail');
})->name('detail');

Route::get('/home', function() {
    return view('home');
})->name('home');

Route::get('/home/reservation', function() {
    return view('reservation');
})->name('reservation')->middleware('auth');

Route::get('/home/transaction', function() {
    return view('transaction');
})->name('transaction')->middleware('auth');

Route::get('/home/room', function() {
    return view('room');
})->name('room')->middleware('auth');

Route::get('/home/report', function() {
    return view('report');
})->name('report')->middleware('auth');