<?php

use App\Models\Developer as Developerm;
use App\Models\Project as Projectm;
use App\Models\Storage as Storagem;
use App\Models\Address as Addressm;
use App\Models\Person as Personm;
use App\Models\Item as Itemm;
use App\Http\Controllers\Developer;
use App\Http\Controllers\Category;
use App\Http\Controllers\Product;
use App\Http\Controllers\Address;
use App\Http\Controllers\Storage;
use App\Http\Controllers\Project;
use App\Http\Controllers\Client;
use App\Http\Controllers\People;
use App\Http\Controllers\Item;
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
Route::resource('items', Item::class);
Route::resource('storages', Storage::class);
Route::resource('developers', Developer::class);
Route::resource('projects', Project::class);

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

Route::get('/new-item/{name}', function (string $name) {

    $storage = random_int(1, 5);
    $stock = random_int(1, 999999);

    $storage = Storagem::find($storage);

    $item = new Itemm();
    $item->name = $name;
    $item->stock = $stock;
    $item->storage()->associate($storage);
    $item->save();

    return redirect()->route('items.index');

})->where('name', '[A-Za-z]+');

Route::get(
    '/project/new-developer/{projid}/{devid}',
    function (int $projid, int $devid) {

        $project = Projectm::find($projid);

        if (isset($project)) {

            $project->developers()->attach($devid);

        }

        return redirect()->route('projects.index');

    }
)->where('projid', '[1-4]')->where('devid', '[1-3]');

Route::get(
    '/project/rm-developer/{projid}/{devid}',
    function (int $projid, int $devid) {

        $project = Projectm::find($projid);

        if (isset($project)) {

            $project->developers()->detach($devid);

        }

        return redirect()->route('projects.index');

    }
)->where('projid', '[1-4]')->where('devid', '[1-3]');