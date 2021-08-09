<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Category;
use App\Http\Controllers\Product;
use App\Http\Controllers\Address;
use App\Http\Controllers\Client;
use App\Http\Controllers\People;
use App\Models\Address as Addressm;
use App\Models\Person as Personm;

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
    return view('registry.index');
});

Route::get('/departments', function () {
    return view('departments.index');
});

Route::resource('products', Product::class);
Route::resource('categories', Category::class);
Route::resource('clients', Client::class);
Route::resource('people', People::class);
Route::resource('addresses', Address::class);

Route::get('/person-address', function () {

    $person = new Personm();
    $person->name = 'John Locke';
    $person->email = 'jc@gmail.com';
    $person->save();

    $address = new Addressm();
    $address->street = 'Aftermatch';
    $address->district = 'Night';
    $address->city = 'El Paso';
    $address->state = 'Gambia';
    $address->country = 'UK';
    $person->address()->save($address);

});

Route::get('/person-json', function () {

    $person = Personm::with(['address'])->get();

    return $person->toJson();

});

Route::get('/address-json', function () {

    $address = Addressm::with(['person'])->get();

    return $address->toJson();

});