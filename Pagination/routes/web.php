<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client;

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

Route::get('/', [Client::class, 'index']);

Route::get('/javascript', [Client::class, 'indexJs']);
Route::get('/data', [Client::class, 'data']);