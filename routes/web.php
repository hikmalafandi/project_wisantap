<?php

use App\Http\Controllers\destinasiController;
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
    return view('home');
});

Route::get('/destinasi', function () {
    return view('content.destinasi');
});
Route::get('/login', function () {
    return view('content.login');
});
Route::get('/register', function () {
    return view('content.register');
});



Route::get('/destinasi', [destinasiController::class, 'index']);
Route::get('/detail/{id}', [destinasiController::class, 'show']);
Route::post('/upload', [destinasiController::class, 'store']);
Route::delete('/hapus/{id}', [destinasiController::class, 'destroy']);