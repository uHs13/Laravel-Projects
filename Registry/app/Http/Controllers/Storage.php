<?php

namespace App\Http\Controllers;

use App\Models\Storage as Model;
use Illuminate\Http\Request;

class Storage extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('storages.index', [
            'storages' => Model::orderBy('id', 'desc')
            ->paginate(3)
        ]);
    }
}