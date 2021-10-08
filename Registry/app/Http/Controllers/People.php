<?php

namespace App\Http\Controllers;

use App\Models\Person as Model;
use Illuminate\Http\Request;

class People extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('people.index', [
            'people' => Model::all()
        ]);
    }
}
