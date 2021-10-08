<?php

namespace App\Http\Controllers;

use App\Models\Project as Model;
use Illuminate\Http\Request;

class Project extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('projects.index', [
            'projects' => Model::orderBy('id', 'desc')
            ->paginate('3')
        ]);
    }
}
