<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Web\AuthController as WebAuthController;
use App\Http\Controllers\Web\SanatoriumController;
use App\Http\Controllers\Web\MainController;
use App\Http\Controllers\Web\SaleController;
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


//WEB
Route::name('web.')->group(function (){
    Route::get('/',[MainController::class,'index'])->name('main.page');
    Route::get('cooperate',[MainController::class,'cooperate'])->name('cooperate');

    Route::prefix('auth')->name('auth.')->group(function (){
        Route::get('login',[WebAuthController::class,'login'])->name('login');
        Route::post('check',[WebAuthController::class,'check'])->name('check');
        Route::post('auth',[WebAuthController::class,'auth'])->name('auth');
        Route::get('logout',[WebAuthController::class,'logout'])->name('logout');
    });

    Route::prefix('sale')->name('sale.')->group(function (){
        Route::get('/',[SaleController::class,'index'])->name('index');
        Route::get('{sale}',[SaleController::class,'show'])->name('show');
    });

    Route::prefix('sanatorium')->name('sanatorium.')->group(function (){
        Route::get('/',[SanatoriumController::class,'index'])->name('index');
        Route::get('show/{sanatorium}',[SanatoriumController::class,'show'])->name('show');
        Route::get('booking',[SanatoriumController::class,'bookingPage'])->name('bookingPage')->middleware('auth:web');
        Route::post('booking',[SanatoriumController::class,'booking'])->name('booking')->middleware('auth:web');
    });

    Route::middleware('auth:web')->group(function (){
        Route::get('history',[SanatoriumController::class,'history'])->name('history');
        Route::get('notification',[MainController::class,'notification'])->name('notification');
        Route::get('contact',[MainController::class,'contact'])->name('contact');
        Route::get('dock',[MainController::class,'dock'])->name('dock');

    });


});
//ADMIN PANEL
Route::prefix('admin')->group(function (){
    Route::get('login', [AuthController::class, 'loginPage'])->name('view-login');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::get('logout',  [AuthController::class, 'logout'])->name('logout');

    Route::group(['middleware' => 'adminAuth'], function () {
        Route::get('/main', [AdminController::class, 'main'])->name('main');
    });

});
