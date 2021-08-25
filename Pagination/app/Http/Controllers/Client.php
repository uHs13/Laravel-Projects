<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Client as Model;

class Client extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index', [
            'clients' => DB::table('clients')
            ->paginate(5)
        ]);
    }

    public function indexJs()
    {
        return view('indexjs');
    }

    public function data()
    {
        return DB::table('clients')
        ->paginate(5);
    }
}