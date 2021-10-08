<?php

namespace App\Http\Controllers;

use App\Models\Developer as Model;
use Illuminate\Http\Request;

class Developer extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('developers.index', [
            'developers' => Model::orderBy('id', 'desc')
            ->paginate(3)
        ]);
    }
}
