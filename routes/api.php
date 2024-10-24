<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FarmaController;
use App\Http\Controllers\IaController;
use App\Http\Services\ApiResponse;  
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

    Route::get('/test', function() {

        return ApiResponse::success(['message' => 'Test successful']);
        
    });

    Route::post('/create', [AuthController::class, 'create']);

    Route::put('users/change-password/{token}', [AuthController::class, 'changePassword']);

    Route::post('users/send-reset', [AuthController::class, 'sendReset']);
    
    Route::middleware(['auth:sanctum'])->group(function (){

        Route::get('/user', [AuthController::class, 'user']);
        Route::get('/logout', [AuthController::class, 'logout']);
        Route::get('/farmacos', [ApiController::class, 'farmacos']);
        Route::get('/farmaco/{name}', [ApiController::class, 'farmaco']);

        Route::middleware(['check.trial'])->group(function () {
            Route::get('/comparar-farmacos/{farmaco1}/{farmaco2}', [ApiController::class, 'check']);
            Route::get('/ia/{farmaco1}/{farmaco2}', [IaController::class, 'getText']);

            
        });
        

    });


    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/loginAdmin', [AuthController::class   , 'loginAdmin']);


    Route::post('/createFarma', [FarmaController::class,'store']);


