<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IaGoogleController;
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
Route::post('/create', [AuthController::class, 'create']);
Route::get('/google', [IaGoogleController::class, 'getText']);

Route::middleware(['auth:sanctum'])->group(function (){

    Route::get('/user', [AuthController::class, 'user']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/farmacos', [ApiController::class, 'farmacos']);

    Route::middleware(['check.trial'])->group(function () {
        Route::get('/comparar-farmacos/{farmaco1}/{farmaco2}', [ApiController::class, 'check']);
    });

});


Route::post('/login', [AuthController::class, 'login']);


