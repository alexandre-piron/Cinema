<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Resources\Api\v1\UserResource;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\API\MovieController;
use App\Http\Controllers\API\CinemaController;
use App\Http\Controllers\API\BroadcastController;
use App\Http\Controllers\API\Auth\UserAuthController;

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

//Route::get('/cinema',[CinemaController::class,'index'])->name('cinema.index')
Route::get('/Movie', [MovieController::class, 'index']);
Route::get('/Room/{room}', [RoomController::class,'show']);
Route::get('/Room', [RoomController::class,'index']);
Route::get('/Broadcast', [BroadcastController::class,'index']);
Route::get('/Broadcast/{broadcast}', [BroadcastController::class,'show']);


//Route::post('/register', [UserAuthController::class, 'register'])->name('user.register');

Route::middleware('auth:api')->group(function(){
    Route::get('/', function (Request $request) {
        $user = new UserResource($request->user());
        return response()->json(['success' => true, 'msg' => 'success', 'user' => $user], 200);
    });

    Route::get('/Cinema',[CinemaController::class,'index']);
    Route::get('/Cinema/edit/{cinema}', [CinemaController::class, 'edit']);

    Route::post('/Cinema/store',[CinemaController::class,'store']);

    Route::post('/Broadcast/store',[BroadcastController::class,'store']);
    Route::patch('/Broadcast/update/{broadcast}',[BroadcastController::class,'update']);
    Route::get('/Broadcast/destroy/{broadcast}',[BroadcastController::class,'destroy']);

    //Room
    
    Route::post('/Room/store', [RoomController::class, 'store']);
    Route::get('/Room/edit/{room}', [RoomController::class,'edit']);
    Route::patch('/Room/{room}', [RoomController::class, 'update']);
    Route::get('/Room/create/{room}', [RoomController::class, 'create']);
    
    Route::get('/Room/destroy/{room}', [RoomController::class, 'destroy']);

    //Favorites
    Route::get('/favorite',[FavoriteController::class,'index']); //afficher les cinemas favoris
    Route::post('/favorite',[FavoriteController::class,'store']); //ajouter un cinema dans les favoris
    Route::delete('/favorite/{favorite}',[FavoriteController::class,'destroy']); //supprimer un cinema des favoris
});


