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
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    Route::resource('programs', App\Http\Controllers\API\ProgramController::class);
    // API route for logout user
    //Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
});

Route::resource('blogs', App\Http\Controllers\API\BlogController::class);
Route::get('blogs/search/{title}', [App\Http\Controllers\API\BlogController::class,'search']);
Route::put('blogs/update/{id}', [App\Http\Controllers\API\BlogController::class,'update']);
Route::resource('categories', App\Http\Controllers\API\CategoryController::class);
Route::resource('positions', App\Http\Controllers\API\PositionController::class);
