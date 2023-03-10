<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MobileProductController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::get('products/{categoryId}',[MobileProductController::class, 'index']);
    Route::get('product/{productId}',[MobileProductController::class, 'product']);
    Route::post('bookings', [MobileProductController::class, 'storeBooking']);
    Route::get('authenticate', [UserController::class, 'authenticate']);
});

Route::post('/login',[UserController::class,'index']);
Route::post('/signup',[UserController::class,'store']);