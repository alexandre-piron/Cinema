<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CinemaController;

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
    Route::get('/dashboard', [\App\Http\Controllers\Auth\DashboardController::class,'show'])->name('dashboard');
    Route::get('/Salle', [\App\Http\Controllers\Auth\DashboardController::class,'show'])->name('salle.show');
    Route::get('/Food', [\App\Http\Controllers\Auth\DashboardController::class,'show'])->name('food.show');
    Route::get('/Salle', [\App\Http\Controllers\Auth\DashboardController::class,'show'])->name('salle.show');

    //Cinéma
    Route::get('/Cinema/{cinema}', [CinemaController::class,'show'])->name('cinema.show');

    //Room
    Route::get('/Room/{room}', [RoomController::class,'show'])->name('room.show');
});




require __DIR__.'/auth.php';
