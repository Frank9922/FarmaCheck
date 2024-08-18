    <?php

    use App\Http\Controllers\ApiController;
    use App\Http\Controllers\AuthController;
use App\Http\Controllers\FarmaController;
use App\Http\Controllers\IaGoogleController;
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

    Route::middleware(['auth:sanctum'])->group(function (){

        Route::get('/user', [AuthController::class, 'user']);
        Route::get('/logout', [AuthController::class, 'logout']);
        Route::get('/farmacos', [ApiController::class, 'farmacos']);

        Route::middleware(['check.trial'])->group(function () {
            Route::get('/comparar-farmacos/{farmaco1}/{farmaco2}', [ApiController::class, 'check']);
            // Route::get('/google', [IaGoogleController::class, 'getText']); Proximamente...
        });
        

    });


    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/createFarma', [FarmaController::class,'store']);


