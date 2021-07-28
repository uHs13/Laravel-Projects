<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product as Model;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class Product extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index', [
            'products' => DB::table('products')
            ->orderby('id', 'desc')
            ->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        $data = $request->validated();

        $product = new Model();
        $product->name = $data['name'];
        $product->stock = $data['stock'];
        $product->price = $data['price'];
        $product->category_id = $data['category'];
        $product->save();

        return redirect()->route('products.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('products.update', [
            'categories' => Category::all(),
            'product' => Model::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {

        $data = $request->validated();

        $product = Model::find($id);
        $product->name = $data['name'];
        $product->stock = $data['stock'];
        $product->price = $data['price'];
        $product->category_id = $data['category'];
        $product->save();

        return redirect()->route('products.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $product = Model::find($id);

        if ($product) {
            $product->delete();
        }

        return redirect()->route('products.index');

    }
}
