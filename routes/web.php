<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;
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
    return ['Laravel' => app()->version()];
});

Route::get('/altaFarm',[indexController::class,"index"]);
Route::post('/altaFarm',function (){
   $msg= request('farmaco');
   return $msg;
});
require __DIR__.'/auth.php';
