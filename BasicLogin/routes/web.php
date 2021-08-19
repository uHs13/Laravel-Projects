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

Auth::routes();

Route::get('/home', [
    App\Http\Controllers\HomeController::class,
    'index'
])->name('home');

Route::get('/products', [
    App\Http\Controllers\Product::class,
    'index'
])->name('products');

Route::get('/info', [
    App\Http\Controllers\Info::class,
    'index'
])->name('info');

Route::get('/admin/login', [
    App\Http\Controllers\Auth\AdminLogin::class,
    'index'
])->name('admin.login');

Route::post('/admin/login', [
    App\Http\Controllers\Auth\AdminLogin::class,
    'login'
])->name('admin.login.post');

Route::get('/admin', [
    App\Http\Controllers\Admin::class,
    'index'
])->name('admin.index');