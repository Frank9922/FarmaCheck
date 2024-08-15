<?php

use App\Http\Controllers\FarmaCompatibilidad;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;
use App\Http\Services\ApiResponse;
use App\Models\FarmacoCompatibilidad;

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
    return ApiResponse::success(['Laravel' => app()->version()]);
});

// Route::get('/altaFarm',[indexController::class,"index"]);
// // Route::post('/altaFarm',function (){
// //    $msg= request('farmaco');
// //    return $msg;
// // });
// Route::post('/altaFarm',[indexController::class,"store"]);
// require __DIR__.'/auth.php';


// Route::get('/compatibilidad', [FarmaCompatibilidad::class, 'index']);
// Route::get('/check', [FarmaCompatibilidad::class, 'checkindex']);

// Route::post('/compatibilidad', [FarmaCompatibilidad::class, 'store']);
// Route::post('/check', [FarmaCompatibilidad::class, 'compatibility']);
