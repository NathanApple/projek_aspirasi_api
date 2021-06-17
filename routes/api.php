<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\UserController;
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


Route::get('test', function(){
    return response("test");    
});

# Login
Route::post('register', [UserController::class, "register"]);
Route::post('login', [UserController::class, "login"]);


Route::middleware('jwt.verify')->get('user', [UserController::class, "getAuthenticatedUser"]);
Route::middleware('jwt.verify')->get("aspirasi/show", [ApiController::class, "show"]);

Route::post("aspirasi/create", [ApiController::class, "create"]);
Route::post("aspirasi/update", [ApiController::class, "update"]);
Route::post("aspirasi/delete", [ApiController::class, "delete"]);


Route::get('/aspirasi/input', [InputAspirasiController::class, "create"]);