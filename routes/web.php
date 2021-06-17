<?php

use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\InputAspirasiController;
use App\Models\InputAspirasi;
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
    return view('index');
});

# User
Route::get('/aspirasi/input', [InputAspirasiController::class, "create"])->name("aspirasi_input");
Route::post('/aspirasi/input', [InputAspirasiController::class, "store"]);
Route::get('/aspirasi/view', [InputAspirasiController::class, "index"])->name('aspirasi_index');

Route::get('/aspirasi/view/{id}', [InputAspirasiController::class, "view"]);
Route::post('/aspirasi/view/{id}', [AspirasiController::class, "store"]);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function (){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/dashboard/input_aspirasi', [InputAspirasiController::class, "admin"])
    ->name("admin_input_aspirasi");

    Route::get('/dashboard/input_aspirasi/view/{id}', [InputAspirasiController::class, "edit"] );
    Route::post('/dashboard/input_aspirasi/view/{id}', [AspirasiController::class, "store_admin"] );

    Route::get('/dashboard/input_aspirasi/delete/{id}', [InputAspirasiController::class, "delete"] );

    # Aspirasi
    Route::get('/dashboard/aspirasi/delete/{id}', [AspirasiController::class, "delete"] );
    

});


