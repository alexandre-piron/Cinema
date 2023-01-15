<?php

use App\Models\Cinema;
use App\Models\Broadcast;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\BroadcastController;

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
    return view('welcome');
});

Route::middleware(['auth', 'isAdmin'])->group(function(){

    Route::get('/home', [CinemaController::class, 'show'])->name('home');
    //Cinéma
    //Route::get('/Cinema/{cinema}', [CinemaController::class,'show'])->name('cinema.show');
    Route::get('/Cinema/edit/{cinema}', [CinemaController::class, 'edit'])->name('cinema.edit');
    Route::patch('/Cinema/update/{cinema}', [CinemaController::class, 'update'])->name('cinema.update');

    //Room
    Route::get('/Room/{room}', [RoomController::class,'show'])->name('room.show');
    Route::get('/Room/edit/{room}', [RoomController::class,'edit'])->name('room.edit');
    Route::patch('/Room/{room}', [RoomController::class, 'update'])->name('room.update');
    Route::get('/Room/create/{cinema}', [RoomController::class, 'create'])->name('room.create');
    Route::post('/Room/store', [RoomController::class, 'store'])->name('room.store');
    Route::get('/Room/destroy/{room}', [RoomController::class, 'destroy'])->name('room.destroy');

    //Sell
    Route::get('/Sell/create/{cinema}', [SellController::class, 'create'])->name('sell.create');
    Route::post('/Sell', [SellController::class, 'store'])->name('sell.store');
    Route::get('/Sell/destroy/{sell}', [SellController::class, 'destroy'])->name('sell.destroy');

    //Food
    Route::get('/Food', [FoodController::class,'show'])->name('food.show');
    Route::get('/Food/edit/{food}/cinema/{cinema}', [FoodController::class,'edit'])->name('food.edit');
    Route::get('/Food/create/{cinema}', [FoodController::class,'create'])->name('food.create');
    Route::patch('/Food/{food}', [FoodController::class, 'update'])->name('food.update');
    Route::post('Food/store/{cinema}', [FoodController::class, 'store'])->name('food.store');

    //Broadcasts
    Route::get('Broadcasts/create/{room}', [BroadcastController::class, 'create'])->name('broadcasts.create');
    Route::get('Broadcasts/edit/{diffusion}', [BroadcastController::class, 'edit'])->name('broadcasts.edit');
    Route::post('Broadcasts/store', [BroadcastController::class, 'store'])->name('broadcasts.store');
    Route::get('Broadcasts/destroy/{diffusion}', [BroadcastController::class, 'destroy'])->name('broadcasts.destroy');
    Route::patch('/Broadcasts/{diffusion}', [BroadcastController::class, 'update'])->name('broadcasts.update');
});




require __DIR__.'/auth.php';
