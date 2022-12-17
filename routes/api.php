<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\OrderController;



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
Route::name('api.')->group(function () {

    
    Route::apiresource("/orders", OrderController::class);
    Route::post("/register", [RegisterController::class, 'store']);
    Route::post("/login", [RegisterController::class, 'login']);
    Route::post("/logout", [RegisterController::class, 'logout']);
    Route::apiresource('/users', UserController::class);
 
});

