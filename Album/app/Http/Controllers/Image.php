<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Image as Model;

class Image extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('album.index', [
            'images' => DB::table('images')
            ->select('id', 'description', 'path')
            ->where('deleted_at', null)
            ->paginate(3)
        ]);
    }

    public function create()
    {
        return view('album.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $path = $request->file('file')
        ->store('images', 'public');

        $model = new Model();
        $model->description = $request->input('description');
        $model->path = $path;
        $model->save();

        $request->session()->flush();

        $request->session()->flash(
            'success', 
            'Picture successfully saved'
        );

        return redirect('/add');

    }

    public function download($id)
    {

        $model = Model::find($id, ['path']);

        if ($model) {

            $file = Storage::disk('public')
            ->getDriver()
            ->getAdapter()
            ->applyPathPrefix($model->path);

            return response()->download($file);

        }

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
            Storage::disk('public')->delete($model->path);
            $model->delete();
        }

        session()->flush();

        session()->flash(
            'success', 
            'Picture successfully deleted'
        );

        return redirect('/');
    }
}