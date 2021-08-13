<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login as LoginRequest;

class Login extends Controller
{
    public function login(LoginRequest $request)
    {

        $data = $request->validated();

        $login = $request->input('login');
        $password = $request->input('password');

        if (
            $login == 'user'
            &&
            $password == '123'
        ) {

            $request->session()->put('login', [
                'user' => $login
            ]);

            return redirect()->route('users.index');

        } else {

          $request->session()->flush();

          $request->session()->flash(
            'error', 
            'Invalid login or wrong password'
          );

          return redirect('/');

      }

  }
}