<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstrumentController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\CartController;
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

Auth::routes();

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', [InstrumentController::class,'home']);

Route::get('/catalogue', function () {
    return redirect('/catalogue/1');
});

Route::get('/catalogue/{id}', [InstrumentController::class, 'instruments']);

Route::get('/catalogue/{id}/instruments/{index}', [InstrumentController::class,'instrument_info']);

Route::get('/catalogue/{id}/latest/{index}', [InstrumentController::class,'instrument_info_home']);

Route::get('/shopping_cart', [CartController::class,'index']);

Route::post('/shopping_cart', [CartController::class,'store']);

Route::get('/shopping_cart/increase/{id}', [CartController::class,'increase']);

Route::get('/shopping_cart/decrease/{id}', [CartController::class,'decrease']);

Route::get('/shopping_cart/remove/{id}', [CartController::class,'remove']);

Route::get('/shopping_cart/clear', [CartController::class,'clear']);

Route::get('/shopping_cart/checkout', [CartController::class,'checkout']);

Route::post('/shopping_cart/checkout', [CartController::class,'validateCheckout']);
