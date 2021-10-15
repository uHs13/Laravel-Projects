<?php

namespace App\Http\Controllers;

use App\Models\Department as Model;
use Illuminate\Http\Request;

class Department extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Model::select('id', 'name', 'description')
        ->get()
        ->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Model();
        $model->name = $request->input('name');
        $model->description = $request->input('description');
        $model->save();

        return json_encode([
            'status' => 'success'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(
        Request $request,
        Department $department
    ) {
        $model = Model::find($request->input('id'));
        $model->name = $request->input('name');
        $model->description = $request->input('description');
        $model->save();

        return json_encode([
            'status' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $model = Model::find($id);

        if ($model) {

            $model->delete();

            return json_encode([
                'status' => 'success'
            ]);

        } else {

            return json_encode([
                'status' => 'error'
            ]);

        }
    }
}