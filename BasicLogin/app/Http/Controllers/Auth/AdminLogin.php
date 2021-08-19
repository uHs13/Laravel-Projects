<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\AdminLoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminLogin extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function index()
    {
        return view('admin.login');
    }

    public function login(AdminLoginRequest $request)
    {

        $data = $request->validated();

        $permission = Auth::guard('admin')->attempt($data);

        return ($permission)
        ? redirect()->intended(route('admin.index'))
        : redirect()->back()->withInputs(
            $request->only('email', 'remember')
        );

    }
}