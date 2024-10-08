<?php

use App\Http\Controllers\Api\AccessTokenController;
use App\Http\Controllers\Api\OrderDeliveryController;
use App\Http\Controllers\Api\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// type of data which returned in api is ['json' , 'xml']
// restful apis return json data

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return Auth::guard('sanctum')->user();
});

Route::apiResource('products', ProductsController::class);

// Route::get('products', [ProductsController::class,'index']);

Route::post('auth/access-token', [AccessTokenController::class, 'store'])
    ->middleware('guest:sanctum');

Route::delete('auth/access-token/{token?}', [AccessTokenController::class, 'destroy'])
    ->middleware('auth:sanctum');

    Route::get('show_orderDelivery/{id}',[OrderDeliveryController::class,'show']);
Route::put('orderDelivery/{orderDelivery}',[OrderDeliveryController::class,'update']);