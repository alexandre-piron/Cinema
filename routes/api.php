<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CinemaController;
use App\Http\Controllers\API\MovieController;
use App\Http\Controllers\API\Auth\UserAuthController;
use App\Http\Resources\Api\v1\UserResource;

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

//Route::get('/cinema',[CinemaController::class,'index'])->name('cinema.index');
Route::post('/cinema',[CinemaController::class,'store']);
Route::get('/movie', [MovieController::class, 'index'])->name('movie.index');

//Route::post('/register', [UserAuthController::class, 'register'])->name('user.register');

Route::middleware('auth:api')->group(function(){
    Route::get('/', function (Request $request) {
        $user = new UserResource($request->user());
        return response()->json(['success' => true, 'msg' => 'success', 'user' => $user], 200);
    });

    Route::get('/cinema',[CinemaController::class,'index'])->name('cinema.index');
});


