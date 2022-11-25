<?php

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
    return view('welcome');
});

Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/dashboard', [\App\Http\Controllers\Auth\DashboardController::class,'show'])-> name('dashboard');

    Route::get('/dashboard/{admin}', function () {
        return view('dashboard');
    })-> name('dashboard.admin') 
      -> where('admin', '[0-9]+');
});


require __DIR__.'/auth.php';
