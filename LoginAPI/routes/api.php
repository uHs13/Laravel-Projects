<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Product;
use App\Http\Controllers\Auth;

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

Route::prefix('auth')->group(function () {
    Route::post('registry', [Auth::class, 'store']);
    Route::get('registry/activate/{id}/{token}', [Auth::class, 'activate']);
    Route::post('login', [Auth::class, 'login']);
    Route::middleware('auth:api')->group(function () {
        Route::post('logout', [Auth::class, 'logout']);
    });
});

Route::get('products', [Product::class, 'index'])
->middleware('auth:api');