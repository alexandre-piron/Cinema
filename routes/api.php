<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Resources\Api\v1\UserResource;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\FoodController;
use App\Http\Controllers\API\PlayController;
use App\Http\Controllers\API\RateController;
use App\Http\Controllers\API\SeatController;
use App\Http\Controllers\API\SellController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\API\MovieController;
use App\Http\Controllers\API\CinemaController;
use App\Http\Controllers\API\CastingController;
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
Route::get('/Movie/{movie}', [MovieController::class,'show']);
Route::get('/Movie', [MovieController::class,'index']);
Route::get('/Book/{book}', [BookController::class,'show']);
Route::get('/Book', [BookController::class,'index']);
Route::get('/Seat/{seat}', [SeatController::class,'show']);
Route::get('/Seat', [SeatController::class,'index']);
Route::get('/Food/{food}', [FoodController::class,'show']);
Route::get('/Food', [FoodController::class,'index']);
Route::get('/Casting/{casting}', [CastingController::class,'show']);
Route::get('/Casting', [CastingController::class,'index']);
Route::get('/Play/{play}', [PlayController::class,'show']);
Route::get('/Play', [PlayController::class,'index']);
Route::get('/Rate/{rate}', [RateController::class,'show']);
Route::get('/Rate', [RateController::class,'index']);
Route::get('/Sell/{sell}', [SellController::class,'show']);
Route::get('/Sell', [SellController::class,'index']);


//Route::post('/register', [UserAuthController::class, 'register'])->name('user.register');

Route::middleware('auth:api')->group(function(){
    Route::get('/', function (Request $request) {
        $user = new UserResource($request->user());
        return response()->json(['success' => true, 'msg' => 'success', 'user' => $user], 200);
    });

    Route::get('/Cinema',[CinemaController::class,'index']);

    Route::post('/Cinema/store',[CinemaController::class,'store']);

    Route::post('/Broadcast/store',[BroadcastController::class,'store']);
    Route::patch('/Broadcast/update/{broadcast}',[BroadcastController::class,'update']);
    Route::get('/Broadcast/destroy/{broadcast}',[BroadcastController::class,'destroy']);

    //Room
    
    Route::post('/Room/store', [RoomController::class, 'store']);
    Route::patch('/Room/{room}', [RoomController::class, 'update']);
    Route::get('/Room/destroy/{room}', [RoomController::class, 'destroy']);

    Route::post('/Movie/store', [MovieController::class, 'store']);
    Route::patch('/Movie/{movie}', [MovieController::class, 'update']);
    Route::get('/Movie/destroy/{movie}', [MovieController::class, 'destroy']);

    Route::post('/Book/store', [BookController::class, 'store']);
    Route::patch('/Book/{book}', [BookController::class, 'update']);
    Route::get('/Book/destroy/{book}', [BookController::class, 'destroy']);

    Route::post('/Seat/store', [SeatController::class, 'store']);
    Route::patch('/Seat/{seat}', [SeatController::class, 'update']);
    Route::get('/Seat/destroy/{seat}', [SeatController::class, 'destroy']);

    Route::post('/Food/store', [FoodController::class, 'store']);
    Route::patch('/Food/{food}', [FoodController::class, 'update']);
    Route::get('/Food/destroy/{food}', [FoodController::class, 'destroy']);

    Route::post('/Casting/store', [CastingController::class, 'store']);
    Route::patch('/Casting/{casting}', [CastingController::class, 'update']);
    Route::get('/Casting/destroy/{casting}', [CastingController::class, 'destroy']);

    Route::post('/Play/store', [PlayController::class, 'store']);
    Route::patch('/Play/{play}', [PlayController::class, 'update']);
    Route::get('/Play/destroy/{play}', [PlayController::class, 'destroy']);

    Route::post('/Rate/store', [RateController::class, 'store']);
    Route::patch('/Rate/{rate}', [RateController::class, 'update']);
    Route::get('/Rate/destroy/{rate}', [RateController::class, 'destroy']);

    Route::post('/Sell/store', [SellController::class, 'store']);
    Route::patch('/Sell/{sell}', [SellController::class, 'update']);
    Route::get('/Sell/destroy/{sell}', [SellController::class, 'destroy']);

    //Favorites
    Route::get('/favorite',[FavoriteController::class,'index']); //afficher les cinemas favoris
    Route::post('/favorite',[FavoriteController::class,'store']); //ajouter un cinema dans les favoris
    Route::delete('/favorite/{favorite}',[FavoriteController::class,'destroy']); //supprimer un cinema des favoris
});


