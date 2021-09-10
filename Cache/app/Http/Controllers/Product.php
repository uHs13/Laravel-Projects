<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\Product as Model;

class Product extends Controller
{
    public function index()
    {

        $products = Cache::remember('productslist', 5, function () {

            return Model::with('categories')
            ->select('id', 'name')
            ->where('deleted_at', null)
            ->paginate(5);

        });

        return view('products.index', [
            'products' => $products
        ]);

    }
}