<?php

namespace App\Http\Controllers;

use App\Models\Address as Model;
use Illuminate\Http\Request;

class Address extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('addresses.index', [
            'addresses' => Model::all()
        ]);
    }
}