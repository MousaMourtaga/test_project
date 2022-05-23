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
    return view('welcome');
});
Route::get('/Homechake', function () {
    return view('Home.chake');
});
Route::get('/ucas', function () {
    dd('welcome ucas');
});

Route::get('/chake', [\App\Http\Controllers\UsersController::class, 'index']);
Route::get('/contry', [\App\Http\Controllers\UsersController::class, 'create']);
Route::get('/edit/{id}', [\App\Http\Controllers\UsersController::class, 'edit']);
