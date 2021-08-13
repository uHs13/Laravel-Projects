<?php

use App\Http\Middleware\User as UserMiddleware;
use App\Http\Controllers\Login;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

    return view('login.index');

});

Route::get('/third', function () {

    return json_encode(['json' => 'data'], JSON_PRETTY_PRINT);

})->where('name', '[a-zA-Z]+')->middleware("user3:Xzibit");

Route::post('/login', [Login::class, 'login'])->name('login');

Route::resource('users', User::class);

Route::get('/logout', function (Request $request) {

    $request->session()->flush();

    return redirect('/');

})->name('logout');