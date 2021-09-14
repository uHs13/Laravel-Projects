<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category as Model;
use Illuminate\Support\Facades\DB;

class Category extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('category.index',[
            'categories' => DB::table('categories')
            ->whereNull('deleted_at')
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
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {

        $data = $request->validated();

        $category = new Model();

        $category->name = $data['name'];

        $category->save();

        return redirect()->route('categories.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('category.update', [
            'category' => Model::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {

        $data = $request->validated();
        
        $category = Model::find($id);

        if (isset($category)) {
            $category->name = $data['name'];
        }

        $category->save();

        return redirect()->route('categories.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $category = Model::find($id);

        if (isset($category)) {

            $category->delete();

        }

        return redirect()->route('categories.index');

    }
}
