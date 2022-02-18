<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SanatoriumController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('auth', [AuthController::class, 'auth']);
Route::post('verify', [AuthController::class, 'verify']);
Route::get('city',[CityController::class,'index']);
Route::get('contact',[UserController::class,'contact']);
Route::get('notification',[UserController::class,'notification']);

Route::get('user/show/{user}',[UserController::class,'show']);

Route::prefix('sanatorium')->group(function (){
    Route::get('/', [SanatoriumController::class, 'index']);
    Route::get('show/{sanatorium}', [SanatoriumController::class, 'show']);
    //Route::post('available/sanatoriums', [SanatoriumController::class, 'getAvailableSanatorium']);      //check

});

Route::middleware('auth:sanctum')->group(function (){
    Route::post('profile', [AuthController::class, 'profile']);
    Route::post('logout', [AuthController::class, 'logout']);

    Route::post('book/room', [SanatoriumController::class, 'booking']);
    Route::get('history/offers', [UserController::class, 'getOffer']);

    Route::post('payment', [UserController::class, 'payment']);
    Route::post('search-cities', [UserController::class, 'searchCity']);
});
