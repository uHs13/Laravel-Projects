<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item as Model;

class Item extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('items.index', [
            'items' => Model::orderBy('id', 'desc')
            ->paginate(5)
        ]);
    }
}