<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CinemaController;
use App\Http\Controllers\API\MovieController;

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

Route::get('/cinema',[CinemaController::class,'index'])->name('cinema.index');
Route::post('/cinema',[CinemaController::class,'store']);
Route::get('/movie', [MovieController::class, 'index'])->name('movie.index');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


