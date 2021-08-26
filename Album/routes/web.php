<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Image;

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

Route::get('/', [Image::class, 'index']);
Route::get('/add', [Image::class, 'create']);
Route::post('/add', [Image::class, 'store']);