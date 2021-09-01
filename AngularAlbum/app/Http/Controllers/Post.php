<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Post as Model;

class Post extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Model::select(
            'id',
            'name',
            'description',
            'path',
            'likes'
        )
        ->where('deleted_at', null)
        ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Json
     */
    public function store(Request $request)
    {

        $path = $request->file('file')
        ->store('pictures', 'public');

        $model = new Model();
        $model->name = $request->input('name');
        $model->description = $request->input('description');
        $model->path = $path;
        $model->likes = 0;
        $model->save();

        return response($model, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Model::find($id);

        if ($model) {

            Storage::disk('public')
            ->delete($model->path);

            $model->delete();

            return response($model, 200);

        }

        return json_encode([
            'status' => 'error'
        ]);

    }

    /**
     * Increase the like amount from specified resource
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function like($id)
    {

        $model = Model::find($id);

        if ($model) {

            $model->likes++;

            $model->save();

            return response($model, 200);

        }

        return json_encode([
            'status' => 'error'
        ]);

    }
}