<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getChake', [\App\Http\Controllers\Api\ChakesController::class, 'index']);
Route::get('/getusers', [\App\Http\Controllers\UsersController::class, 'getUsers']);
Route::post('/newUser', [\App\Http\Controllers\UsersController::class, 'store']);
Route::get('/getuserDetails/{id}', [\App\Http\Controllers\UsersController::class, 'show']);
Route::post('/updateUser/{id}', [\App\Http\Controllers\UsersController::class, 'update']);
Route::post('/newEmployee', [\App\Http\Controllers\comoanyemployeeController::class, 'store']);


